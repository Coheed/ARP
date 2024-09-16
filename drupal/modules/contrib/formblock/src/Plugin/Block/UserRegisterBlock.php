<?php

namespace Drupal\formblock\Plugin\Block;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Entity\EntityDisplayRepositoryInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Entity\EntityFormBuilderInterface;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\user\UserInterface;

/**
 * Provides a block for the user registration form.
 *
 * @Block(
 *   id = "formblock_user_register",
 *   admin_label = @Translation("User registration form"),
 *   category = @Translation("Forms")
 * )
 *
 * Note that we set module to contact so that blocks will be disabled correctly
 * when the module is disabled.
 */
class UserRegisterBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * The entity manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * The entity form builder.
   *
   * @var \Drupal\Core\Entity\EntityManagerInterface
   */
  protected $entityFormBuilder;

  /**
   * EntityDisplayRepository.
   *
   * @var \Drupal\Core\Entity\EntityDisplayRepositoryInterface
   */
  protected $entityDisplayRepository;

  /**
   * The config factory service.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * Constructs a new UserRegisterBlock plugin.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entityTypeManager
   *   The entity manager.
   * @param \Drupal\Core\Entity\EntityFormBuilderInterface $entityFormBuilder
   *   The entity form builder.
   * @param \Drupal\Core\Entity\EntityDisplayRepositoryInterface $entityDisplayRepository
   *   The entity display repository.
   * @param \Drupal\Core\Config\ConfigFactoryInterface $configFactory
   *   The config factory.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, EntityTypeManagerInterface $entityTypeManager, EntityFormBuilderInterface $entityFormBuilder, EntityDisplayRepositoryInterface $entityDisplayRepository, ConfigFactoryInterface $configFactory) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->entityTypeManager = $entityTypeManager;
    $this->entityFormBuilder = $entityFormBuilder;
    $this->entityDisplayRepository = $entityDisplayRepository;
    $this->configFactory = $configFactory;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('entity_type.manager'),
      $container->get('entity.form_builder'),
      $container->get('entity_display.repository'),
      $container->get('config.factory')
    );
  }

  /**
   * Implements \Drupal\block\BlockBase::build().
   */
  public function build() {
    $build = [];

    $account = $this->entityTypeManager->getStorage('user')->create([]);
    $build['form'] = $this->entityFormBuilder->getForm($account, $this->configuration['form_mode']);

    return $build;
  }

  /**
   * Overrides \Drupal\block\BlockBase::settings().
   */
  public function defaultConfiguration() {
    return [
      'form_mode' => 'register',
    ];
  }

  /**
   * Overrides \Drupal\block\BlockBase::blockForm().
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form['user_registration_settings_note'] = [
      '#markup' => $this->t('<b>NOTE</b>: the display of this form is overriden by the option selected on ' .
        '<a href="/admin/config/people/accounts#edit-admin-role">Account Settings</a>.<br> If you have selected "Administrators Only" ' .
        'this form will only show to Administrators regardless of other options selected on this block'),
    ];
    $form['formblock_user_form_mode'] = [
      '#title' => $this->t('Form mode'),
      '#description' => $this->t('Select the form mode that will be shown in the block.'),
      '#type' => 'select',
      '#required' => TRUE,
      '#options' => $this->getFormModes(),
      '#default_value' => $this->configuration['form_mode'],
    ];

    return $form;
  }

  /**
   * Get an array of user form modes.
   *
   * @return array
   *   An array of form modes keyed by machine name.
   */
  protected function getFormModes() {
    $options = [
        'default' => $this->t('Default'),
    ];

    foreach ($this->entityDisplayRepository->getFormModes('user') as $index => $mode) {
      $options[$index] = $mode['label'];
    }

    return $options;
  }

  /**
   * Overrides \Drupal\block\BlockBase::blockSubmit().
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['form_mode'] = $form_state->getValue('formblock_user_form_mode');
  }

  /**
   * The intention here is to fulfil the block settings and honour the site wide config
   * at /admin/config/people/accounts on who can register new accounts and not to enforce through
   * hard coded decisions.
   *
   * {@inheritdoc}
   */
  public function blockAccess(AccountInterface $account) {
    $evaluate = TRUE;

    if (!in_array('administrator', $account->getRoles()) && $this->configFactory->get('user.settings')->get('register') === UserInterface::REGISTER_ADMINISTRATORS_ONLY) {
      $evaluate = FALSE;
    }

    return AccessResult::allowedIf($evaluate)
      ->addCacheContexts(['user.roles'])
      ->addCacheTags($this->configFactory->get('user.settings')->getCacheTags());
  }

}
