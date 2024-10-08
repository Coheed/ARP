<?php

namespace Drupal\Tests\page_manager\Functional;

use Drupal\block\Entity\Block;
use Drupal\page_manager\Entity\Page;
use Drupal\page_manager\Entity\PageVariant;
use Drupal\Tests\BrowserTestBase;

/**
 * Tests a page manager page as front page.
 *
 * @group page_manager
 */
class FrontPageTest extends BrowserTestBase {

  use PageTestHelperTrait;

  /**
   * {@inheritdoc}
   */
  protected $defaultTheme = 'stark';

  /**
   * Modules to enable.
   *
   * @var array
   */
  protected static $modules = ['page_manager', 'block'];

  /**
   * Tests the front page title.
   */
  public function testFrontPageTitle() {
    // Use a block page for frontpage.
    $page = Page::create([
      'label' => 'My frontpage',
      'id' => 'myfront',
      'path' => '/myfront',
    ]);
    $page->save();
    /** @var \Drupal\page_manager\PageVariantInterface $page_variant */
    $page_variant = PageVariant::create([
      'variant' => 'block_display',
      'id' => 'block_page',
      'label' => 'Block page',
      'page' => 'myfront',
    ]);
    $page_variant->save();

    $this->config('system.site')->set('page.front', '/myfront')->save();

    $block = Block::create([
      'id' => $this->randomMachineName(),
      'plugin' => 'system_powered_by_block',
    ]);
    $block->save();
    $page_variant->getVariantPlugin()->setConfiguration([
      'page_title' => '',
      'blocks' => [
        $block->uuid() => [
          'region' => 'top',
          'weight' => 0,
          'id' => $block->id(),
          'uuid' => $block->uuid(),
          'context_mapping' => [],
        ],
      ],
    ]);

    $this->triggerRouterRebuild();

    // The title should default to "Home" on the front page.
    $this->drupalGet('');
    $this->assertSession()->titleEquals('Home | Drupal');
  }

}
