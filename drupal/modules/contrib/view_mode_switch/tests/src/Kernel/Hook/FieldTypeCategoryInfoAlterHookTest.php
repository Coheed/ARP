<?php

namespace Drupal\Tests\view_mode_switch\Kernel\Hook;

use Drupal\Core\Field\FieldTypeCategoryManagerInterface;
use Drupal\KernelTests\KernelTestBase;

/**
 * Tests the 'hook_field_type_category_info_alter' hook implementation class.
 *
 * @coversDefaultClass \Drupal\view_mode_switch\Hook\FieldTypeCategoryInfoAlterHook
 * @group view_mode_switch
 */
class FieldTypeCategoryInfoAlterHookTest extends KernelTestBase {

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'field_ui',
    'view_mode_switch',
  ];

  /**
   * The field type category manager.
   *
   * @var \Drupal\Core\Field\FieldTypeCategoryManagerInterface
   */
  protected $fieldTypeCategoryManager;

  /**
   * {@inheritdoc}
   */
  public function setUp(): void {
    parent::setUp();

    $this->fieldTypeCategoryManager = $this->container->get('plugin.manager.field.field_type_category');
    $this->assertInstanceOf(FieldTypeCategoryManagerInterface::class, $this->fieldTypeCategoryManager);
  }

  /**
   * Tests library information altered by view_mode_switch module.
   *
   * @covers ::libraryInfoAlter
   *
   * @see \view_mode_switch_library_info_alter()
   */
  public function testFieldTypeCategoryInfoAlter(): void {
    $definition = $this->fieldTypeCategoryManager->getDefinition(FieldTypeCategoryManagerInterface::FALLBACK_CATEGORY);

    $this->assertIsArray($definition);
    $this->assertArrayHasKey('libraries', $definition);
    $this->assertContains('view_mode_switch/field-type-icon', $definition['libraries']);
  }

}
