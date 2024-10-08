<?php

namespace Drupal\page_manager_ui\Form;

use Drupal\Core\Display\VariantManager;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * A Page's General Config Form.
 */
class PageGeneralForm extends FormBase {

  /**
   * The variant manager.
   *
   * @var \Drupal\Core\Display\VariantManager
   */
  protected $variantManager;

  /**
   * The page entity storage handler.
   *
   * @var \Drupal\Core\Entity\EntityStorageInterface
   */
  protected $pageStorage;

  /**
   * Constructs a new PageGeneralForm.
   *
   * @param \Drupal\Core\Display\VariantManager $variant_manager
   *   The variant manager.
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.
   */
  public function __construct(VariantManager $variant_manager, EntityTypeManagerInterface $entity_type_manager) {
    $this->variantManager = $variant_manager;
    $this->pageStorage = $entity_type_manager->getStorage('page');
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('plugin.manager.display_variant'),
      $container->get('entity_type.manager')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'page_manager_general_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $cached_values = $form_state->getTemporaryValue('wizard');
    /** @var \Drupal\page_manager\Entity\Page $page */
    $page = $cached_values['page'];

    // Only add the label and machine name fields if the page has already been
    // created or it will end up on the add page form.
    if (!$page->isNew()) {
      $form['label'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Administrative title'),
        '#required' => TRUE,
        '#size' => 32,
        '#default_value' => $cached_values['label'] ?? $page->label(),
        '#maxlength' => 255,
      ];

      $form['id'] = [
        '#type' => 'machine_name',
        '#maxlength' => 128,
        '#machine_name' => [
          'exists' => ['Drupal\page_manager\Entity\Page', 'load'],
          'source' => ['label'],
        ],
        '#description' => $this->t('A unique machine-readable name for this @entity_type. It must only contain lowercase letters, numbers, and underscores.', [
          '@entity_type' => $cached_values['label'] ?? $page->label(),
        ]),
        '#default_value' => $cached_values['id'] ?? $page->id(),
        '#disabled' => TRUE,
      ];
    }

    $form['description'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Administrative description'),
      '#default_value' => $page->getDescription(),
    ];
    $form['path'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Path'),
      '#maxlength' => 255,
      '#default_value' => $page->getPath(),
      '#description' => $this->t('Path to your custom page. Beginning and Ending slashes are automatically removed.'),
      '#required' => TRUE,
      '#element_validate' => [[$this, 'validatePath']],
    ];
    $form['use_admin_theme'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Use admin theme'),
      '#default_value' => $page->usesAdminTheme(),
    ];

    if ($page->isNew()) {
      $variant_plugin_options = [];
      foreach ($this->variantManager->getDefinitions() as $plugin_id => $definition) {
        // The following two variants are provided by Drupal Core. They are not
        // configurable and therefore not compatible with Page Manager but have
        // similar and confusing labels. Skip them so that they are not shown in
        // the UI.
        if (in_array($plugin_id, ['simple_page', 'block_page'])) {
          continue;
        }

        $variant_plugin_options[$plugin_id] = $definition['admin_label'];
      }
      $form['variant_plugin_id'] = [
        '#title' => $this->t('Variant type'),
        '#type' => 'select',
        '#options' => $variant_plugin_options,
        '#default_value' => !empty($cached_values['variant_plugin_id']) ? $cached_values['variant_plugin_id'] : '',
      ];
      $form['wizard_options'] = [
        '#type' => 'checkboxes',
        '#title' => $this->t('Optional features'),
        '#description' => $this->t('Check any optional features you need to be presented with forms for configuring them. If you do not check them here you will still be able to utilize these features once the new page is created. If you are not sure, leave these unchecked.'),
        '#options' => [
          'access' => $this->t('Page access'),
          'contexts' => $this->t('Variant contexts'),
          'selection' => $this->t('Variant selection criteria'),
        ],
        '#default_value' => !empty($cached_values['wizard_options']) ? $cached_values['wizard_options'] : [],
      ];
    }
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $cached_values = $form_state->getTemporaryValue('wizard');
    /** @var \Drupal\page_manager\Entity\Page $page */
    $page = $cached_values['page'];

    // The label must be set to the temporary form state instead of directly
    // on the page entity since the ctools form wizard will override it
    // with the cached values.
    $form_state->setTemporaryValue(['wizard', 'label'], $form_state->getValue('label'));

    $page->set('description', $form_state->getValue('description'));
    $page->set('path', $form_state->getValue('path'));
    $page->set('use_admin_theme', $form_state->getValue('use_admin_theme'));

    if ($page->isNew()) {
      $page->set('id', $form_state->getValue('id'));
      $page->set('label', $form_state->getValue('label'));
      if (empty($cached_values['variant_plugin_id'])) {
        $variant_plugin_id = $cached_values['variant_plugin_id'] = $form_state->getValue('variant_plugin_id');
        /** @var \Drupal\page_manager\PageVariantInterface $page_variant */
        $page_variant = \Drupal::entityTypeManager()
          ->getStorage('page_variant')
          ->create([
            'variant' => $form_state->getValue('variant_plugin_id'),
            'page' => $page->id(),
            'id' => "{$page->id()}-{$variant_plugin_id}-0",
            'label' => $form['variant_plugin_id']['#options'][$variant_plugin_id],
          ]);
        $page_variant->setPageEntity($page);
        $page->addVariant($page_variant);
        $cached_values['page_variant'] = $page_variant;
      }
      if ($cached_values['variant_plugin_id'] != $form_state->getValue('variant_plugin_id') && !empty($cached_values['page_variant'])) {
        $page_variant = $cached_values['page_variant'];
        /** @var \Drupal\page_manager\Entity\PageVariant $page_variant */
        $page_variant->set('variant', $form_state->getValue('variant_plugin_id'));
        $page_variant->set('variant_settings', []);
        $cached_values['variant_plugin_id'] = $form_state->getValue('variant_plugin_id');
      }

      $cached_values['wizard_options'] = $form_state->getValue('wizard_options');
      $form_state->setTemporaryValue('wizard', $cached_values);
    }
  }

  /**
   * {@inheritdoc}
   */
  public function validatePath(&$element, FormStateInterface $form_state) {
    $cached_values = $form_state->getTemporaryValue('wizard');
    /** @var \Drupal\page_manager\Entity\Page $page */
    $page = $cached_values['page'];

    // Ensure the path has a leading slash.
    if ($value = trim($element['#value'], '/')) {
      $value = '/' . $value;
      $form_state->setValueForElement($element, $value);

      // Ensure each path is unique.
      $path_query = $this->pageStorage->getQuery()
        ->accessCheck(FALSE)
        ->condition('path', $value);
      if (!$page->isNew()) {
        $path_query->condition('id', $page->id(), '<>');
      }
      $path = $path_query->execute();
      if ($path) {
        $form_state->setErrorByName('path', $this->t('The page path must be unique.'));
      }
    }
    // Check to make sure the path exists after stripping slashes.
    else {
      $form_state->setErrorByName('path', $this->t("Path is required."));
    }
  }

}
