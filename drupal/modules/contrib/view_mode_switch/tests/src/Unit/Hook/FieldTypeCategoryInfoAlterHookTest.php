<?php

namespace Drupal\Tests\view_mode_switch\Unit\Hook;

use Drupal\Core\Field\FieldTypeCategoryManagerInterface;
use Drupal\Tests\UnitTestCase;
use Drupal\view_mode_switch\Hook\FieldTypeCategoryInfoAlterHook;

/**
 * Tests the 'hook_field_type_category_info_alter' hook implementation class.
 *
 * @coversDefaultClass \Drupal\view_mode_switch\Hook\FieldTypeCategoryInfoAlterHook
 * @group view_mode_switch
 */
class FieldTypeCategoryInfoAlterHookTest extends UnitTestCase {

  /**
   * Tests altering the field type category information.
   *
   * @covers ::fieldTypeCategoryInfoAlter
   */
  public function testFieldTypeCategoryInfoAlter(): void {
    $categories = [];

    // Prepare class mock.
    $class = $this->createClassMock();

    $class->fieldTypeCategoryInfoAlter($categories);

    $this->assertEquals([
      FieldTypeCategoryManagerInterface::FALLBACK_CATEGORY => [
        'libraries' => [
          'view_mode_switch/field-type-icon',
        ],
      ],
    ], $categories);
  }

  /**
   * Creates and returns a test class mock.
   *
   * @param array $only_methods
   *   An array of names for methods to be configurable.
   *
   * @return \Drupal\view_mode_switch\Hook\FieldTypeCategoryInfoAlterHook|\PHPUnit\Framework\MockObject\MockObject
   *   The mocked class.
   */
  protected function createClassMock(array $only_methods = []) {
    return $this->getMockBuilder(FieldTypeCategoryInfoAlterHook::class)
      ->disableOriginalConstructor()
      ->onlyMethods($only_methods)
      ->getMock();
  }

}
