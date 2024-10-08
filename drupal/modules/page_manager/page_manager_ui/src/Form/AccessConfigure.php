<?php

namespace Drupal\page_manager_ui\Form;

use Drupal\ctools\Form\ConditionConfigure;

/**
 * Access Configuration Forms.
 */
class AccessConfigure extends ConditionConfigure {

  /**
   * {@inheritdoc}
   */
  protected function getParentRouteInfo($cached_values) {
    /** @var \Drupal\page_manager\PageInterface $page */
    $page = $cached_values['page'];

    $route_name = $page->isNew() ? 'entity.page.add_step_form' : 'entity.page.edit_form';
    return [$route_name,
      [
        'machine_name' => $this->machine_name,
        'step' => 'access',
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  protected function getConditions($cached_values) {
    /** @var \Drupal\page_manager\PageInterface $page */
    $page = $cached_values['page'];
    return $page->get('access_conditions');
  }

  /**
   * {@inheritdoc}
   */
  protected function setConditions($cached_values, $conditions) {
    /** @var \Drupal\page_manager\PageInterface $page */
    $page = $cached_values['page'];
    $page->set('access_conditions', $conditions);
    $cached_values['page'] = $page;
    return $cached_values;
  }

  /**
   * {@inheritdoc}
   */
  protected function getContexts($cached_values) {
    /** @var \Drupal\page_manager\PageInterface $page */
    $page = $cached_values['page'];
    return $page->getContexts();
  }

}
