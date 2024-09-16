<?php

namespace Drupal\view_mode_switch\Hook;

use Drupal\Core\Field\FieldTypeCategoryManagerInterface;

/**
 * Implements hook_field_type_category_info_alter().
 */
class FieldTypeCategoryInfoAlterHook {

  /**
   * Allows modules to alter the field type category information.
   *
   * - Registers a library for the 'general' field type category to add an icon
   *   for the 'view_mode_switch' field type on the 'Add field' screen in
   *   Field UI.
   *
   * @param array &$categories
   *   An associative array of field type categories, keyed by category machine
   *   name.
   *
   * @see \hook_field_type_category_info_alter()
   * @see \view_mode_switch_field_type_category_info_alter()
   */
  public function fieldTypeCategoryInfoAlter(array &$categories): void {
    // The 'view_mode_switch' field type belongs in the 'general' category, so
    // the libraries need to be attached using an alter hook.
    $categories[FieldTypeCategoryManagerInterface::FALLBACK_CATEGORY]['libraries'][] = 'view_mode_switch/field-type-icon';
  }

}
