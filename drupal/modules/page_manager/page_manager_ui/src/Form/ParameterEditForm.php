<?php

namespace Drupal\page_manager_ui\Form;

use Drupal\Core\Entity\EntityTypeRepositoryInterface;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\TempStore\SharedTempStoreFactory;
use Drupal\Core\TypedData\PrimitiveInterface;
use Drupal\Core\TypedData\TypedDataManagerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a form for editing a parameter.
 */
class ParameterEditForm extends FormBase {

  /**
   * The form key for unsetting a parameter context.
   *
   * @var string
   */
  const NO_CONTEXT_KEY = '__no_context';

  /**
   * The page entity this static context belongs to.
   *
   * @var \Drupal\page_manager\PageInterface
   */
  protected $page;

  /**
   * The entity type repository.
   *
   * @var \Drupal\Core\Entity\EntityTypeRepositoryInterface
   */
  protected $entityTypeRepository;

  /**
   * The typed data manager.
   *
   * @var \Drupal\Core\TypedData\TypedDataManagerInterface
   */
  protected $typedDataManager;

  /**
   * The shared temp store.
   *
   * @var \Drupal\Core\TempStore\SharedTempStoreFactory
   */
  protected $tempstore;

  /**
   * The temp store id.
   *
   * @var string
   */
  //phpcs:ignore
  protected $tempstore_id;

  /**
   * The machine name of the page being edited in tempstore.
   *
   * @var string
   */
  //phpcs:ignore
  protected $machine_name;

  /**
   * Constructs a new ParameterEditForm.
   *
   * @param \Drupal\Core\Entity\EntityTypeRepositoryInterface $entity_type_repository
   *   The entity type repository.
   * @param \Drupal\Core\TypedData\TypedDataManagerInterface $typed_data_manager
   *   The typed data manager.
   * @param \Drupal\Core\TempStore\SharedTempStoreFactory $tempstore
   *   The temporary store.
   */
  public function __construct(EntityTypeRepositoryInterface $entity_type_repository, TypedDataManagerInterface $typed_data_manager, SharedTempStoreFactory $tempstore) {
    $this->entityTypeRepository = $entity_type_repository;
    $this->typedDataManager = $typed_data_manager;
    $this->tempstore = $tempstore;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('entity_type.repository'),
      $container->get('typed_data_manager'),
      $container->get('tempstore.shared')
    );
  }

  /**
   * Gets the temp store values.
   *
   * @return array
   *   The temp store values.
   */
  protected function getTempstore() {
    return $this->tempstore->get($this->tempstore_id)->get($this->machine_name);
  }

  /**
   * Sets cached values into temp store.
   *
   * @param array $cached_values
   *   Cached values.
   */
  protected function setTempstore(array $cached_values) {
    $this->tempstore->get($this->tempstore_id)->set($this->machine_name, $cached_values);
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'page_manager_parameter_edit_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, $name = '', $tempstore_id = NULL, $machine_name = NULL) {
    $this->tempstore_id = $tempstore_id;
    $this->machine_name = $machine_name;
    $cached_values = $this->getTempstore();
    $page = $cached_values['page'];
    $parameter = $page->getParameter($name);

    $form['machine_name'] = [
      '#type' => 'value',
      '#value' => $name,
    ];

    $form['label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#default_value' => !empty($parameter['label']) ? $parameter['label'] : (ucfirst($parameter['machine_name'] ?? '')),
      '#states' => [
        'invisible' => [
          ':input[name="type"]' => ['value' => static::NO_CONTEXT_KEY],
        ],
      ],
    ];

    $form['type'] = [
      '#type' => 'select',
      '#title' => $this->t('Type'),
      '#required' => TRUE,
      '#options' => $this->buildParameterTypeOptions(),
      '#default_value' => $parameter['type'] ?? '',
    ];

    $form['optional'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Optional'),
      '#default_value' => !empty($parameter['optional']),
    ];

    $form['actions'] = ['#type' => 'actions'];
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Update parameter'),
      '#button_type' => 'primary',
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    $cached_values = $this->getTempstore();
    /** @var \Drupal\page_manager\PageInterface $page */
    $page = $cached_values['page'];

    $edited_parameter_name = $form_state->getValue('machine_name');
    $edited_parameter_optional = $form_state->getValue('optional');

    // Checks that no optional parameter is before a required one.
    $required_allowed = TRUE;
    foreach ($page->getParameterNames() as $parameter_name) {
      $parameter = $page->getParameter($parameter_name);
      $parameter_optional = $parameter_name == $edited_parameter_name
        ? $edited_parameter_optional
        : !empty($parameter['optional']);

      if ($parameter_optional) {
        $required_allowed = FALSE;
      }
      elseif (!$required_allowed) {
        $form_state->setErrorByName('optional', $this->t('Optional path parameters not allowed before required parameters.'));
      }
    }

    parent::validateForm($form, $form_state);
  }

  /**
   * Builds an array of options for the parameter type.
   *
   * @return array[]
   *   A multidimensional array. The top level is keyed by group ('Content',
   *   'Configuration', 'Typed Data'). Those values are an array of type labels,
   *   keyed by the machine name.
   */
  protected function buildParameterTypeOptions() {
    $options = [static::NO_CONTEXT_KEY => $this->t('No context selected')];

    // Make a grouped, sorted list of entity type options. Key the inner array
    // to use the typed data format of 'entity:$entity_type_id'.
    foreach ($this->entityTypeRepository->getEntityTypeLabels(TRUE) as $group_label => $grouped_options) {
      foreach ($grouped_options as $key => $label) {
        $options[$group_label]['entity:' . $key] = $label;
      }
    }

    $primitives_label = (string) $this->t('Primitives');
    foreach ($this->typedDataManager->getDefinitions() as $key => $definition) {
      if (is_subclass_of($definition['class'], PrimitiveInterface::class)) {
        $options[$primitives_label][$key] = $definition['label'];
      }
    }
    asort($options[$primitives_label], SORT_NATURAL);

    return $options;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $cache_values = $this->getTempstore();
    /** @var \Drupal\page_manager\PageInterface $page */
    $page = $cache_values['page'];
    $name = $form_state->getValue('machine_name');
    $type = $form_state->getValue('type');
    $optional = $form_state->getValue('optional');
    if ($type === static::NO_CONTEXT_KEY) {
      $page->removeParameter($name);
      $label = NULL;
    }
    else {
      $label = $form_state->getValue('label');
      $page->setParameter($name, $type, $label, $optional);
    }

    $this->setTempstore($cache_values);
    $this->messenger()->addMessage($this->t('The %label parameter has been updated.', ['%label' => $label ?: $name]));
    [$route_name, $route_parameters] = $this->getParentRouteInfo($cache_values);
    $form_state->setRedirect($route_name, $route_parameters);
  }

  /**
   * Returns the parent route to redirect after form submission.
   *
   * @return array
   *   Array containing the route name and its parameters.
   */
  protected function getParentRouteInfo($cached_values) {
    /** @var \Drupal\page_manager\PageInterface $page */
    $page = $cached_values['page'];

    if ($page->isNew()) {
      return ['entity.page.add_step_form', [
        'machine_name' => $this->machine_name,
        'step' => 'parameters',
      ],
      ];
    }
    else {
      return ['entity.page.edit_form', [
        'machine_name' => $this->machine_name,
        'step' => 'parameters',
      ],
      ];
    }
  }

}
