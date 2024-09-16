<?php

namespace Drupal\insert_block\Plugin\Filter;

use Drupal\Core\Url;
use Drupal\Core\Form\FormStateInterface;
use Drupal\filter\Plugin\FilterBase;
use Drupal\filter\FilterProcessResult;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class InsertBlockFilter.
 *
 * Insert blocks into the content.
 *
 * @package Drupal\insert_block\Plugin\Filter
 *
 * @Filter(
 *   id = "filter_insert_block",
 *   title = @Translation("Insert blocks"),
 *   description = @Translation("Inserts the contents of a block into a node using [block:block-entity-id] tags."),
 *   type = Drupal\filter\Plugin\FilterInterface::TYPE_TRANSFORM_IRREVERSIBLE,
 *   settings = {
 *     "check_roles" = TRUE
 *   }
 * )
 */
class InsertBlockFilter extends FilterBase implements ContainerFactoryPluginInterface {

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * Renderer instance.
   *
   * @var \Drupal\Core\Render\Renderer
   */
  protected $renderer;

  /**
   * The current user.
   *
   * @var \Drupal\Core\Session\AccountInterface
   */
  protected $currentUser;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $pluginId, $pluginDefinition) {
    $instance = new static(
      $configuration,
      $pluginId,
      $pluginDefinition
    );
    $instance->entityTypeManager = $container->get('entity_type.manager');
    $instance->renderer = $container->get('renderer');
    $instance->currentUser = $container->get('current_user');
    return $instance;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    $form['check_roles'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Check roles permissions.'),
      '#default_value' => $this->settings['check_roles'],
      '#description' => $this->t('If user does not have permissions to view block it will be hidden.'),
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function process($text, $langcode) {

    $result = new FilterProcessResult($text);

    if (preg_match_all("/\[block:([^\]]+)+\]/", $text, $match)) {
      $raw_tags = $repl = [];
      foreach ($match[1] as $key => $value) {
        $raw_tags[] = $match[0][$key];
        if (strpos($value, '=') !== FALSE) {
          $block_id_split = explode('=', $value);
          $block_id = $block_id_split[1];
        }
        else {
          $block_id = $value;
        }

        // Render plugin block.
        if ($block = $this->entityTypeManager->getStorage('block')->load($block_id)) {
          $type = 'block';
          // Check visibility.
          if (!$this->checkVisibility($block->getVisibility())) {
            continue;
          }
        }
        // Render content blocks.
        elseif ($block = $this->entityTypeManager->getStorage('block_content')->load($block_id)) {
          $type = 'block_content';
        }
        if (!isset($type)) {
          continue;
        }

        $block_view = $this->entityTypeManager->getViewBuilder($type)->view($block);

        if (!empty($block_view)) {
          $repl[] = $this->renderer->render($block_view);
          $result->addCacheTags($block_view['#cache']['tags'])->addCacheContexts($block_view['#cache']['contexts']);
        }
      }
      if (!empty($repl)) {
        $text = str_replace($raw_tags, $repl, $text);
      }
    }
    $result->setProcessedText($text);

    return $result;

  }

  /**
   * Check block visibility by role.
   *
   * @param array $visibility_settings
   *   Visibility settings array.
   *
   * @return bool
   *   TRUE if user is allowed to view the block, FALSE otherwise.
   */
  protected function checkVisibility(array $visibility_settings): bool {
    // Check role restrictions.
    if ($this->settings['check_roles'] && !empty($visibility_settings['user_role'])) {
      $block_roles = array_values($visibility_settings['user_role']['roles']);
      $user_roles = $this->currentUser->getRoles();
      if (!empty(array_intersect($block_roles, $user_roles))) {
        return TRUE;
      }
      else {
        return FALSE;
      }
    }
    return TRUE;
  }

  /**
   * {@inheritdoc}
   */
  public function tips($long = FALSE) {
    if ($long) {
      return $this->t('<a id="filter-insert_block"></a>You may use [block:<em>block_entity_id</em>] tags to display the contents of block. To discover block entity id, visit admin/structure/block and hover over a block\'s configure link and look in your browser\'s status bar. The last "word" you see is the block ID.');
    }
    else {
      $tips_url = Url::fromRoute("filter.tips_all", [], ['fragment' => 'filter-insert_block']);
      return $this->t('You may use <a href="@insert_block_help">[block:<em>block_entity_id</em>] tags</a> to display the contents of block.',
        ["@insert_block_help" => $tips_url->toString()]);
    }
  }

}
