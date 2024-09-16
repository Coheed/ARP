<?php

namespace Drupal\Tests\simplenews\Functional;

use Drupal\simplenews\Entity\Subscriber;
use Drupal\user\Entity\User;

/**
 * Tests that shared fields are synchronized when using forms.
 *
 * @group simplenews
 */
class SimplenewsSynchronizeFieldsFormTest extends SimplenewsTestBase {

  /**
   * Modules to enable.
   *
   * @var array
   */
  protected static $modules = ['field', 'simplenews'];

  /**
   * User.
   *
   * @var \Drupal\user\UserInterface
   */
  protected $user;

  /**
   * {@inheritdoc}
   */
  protected function setUp(): void {
    parent::setUp();

    // Add a field to both entities.
    $this->addField('string', 'field_shared', 'user');
    $this->addField('string', 'field_shared', 'simplenews_subscriber');

    // Create a user.
    $this->user = $this->drupalCreateUser([
      'administer simplenews subscriptions',
      'administer simplenews settings',
    ]);
    $this->user->setEmail('user@example.com');
    $this->user->set('field_shared', $this->randomMachineName());
    $this->user->save();
  }

  /**
   * Tests that fields are synchronized using the Subscriber form.
   */
  public function testSubscriberFormFieldSync() {
    // Create a subscriber for the user.
    $subscriber = Subscriber::create([
      'mail' => 'user@example.com',
    ]);
    $subscriber->save();
    $this->assertEquals($this->user->id(), $subscriber->getUserId());

    // Edit subscriber field and assert user field is changed accordingly.
    $this->drupalLogin($this->user);
    $this->drupalGet('admin/people/simplenews/edit/' . $subscriber->id());
    $this->assertSession()->fieldExists('field_shared[0][value]');
    $this->assertSession()->responseContains($this->user->field_shared->value);

    $new_value = $this->randomMachineName();
    $this->submitForm(['field_shared[0][value]' => $new_value], 'Save');
    $this->drupalGet('admin/people/simplenews/edit/' . $subscriber->id());
    $this->assertSession()->responseContains($new_value);

    $this->user = User::load($this->user->id());
    $this->assertEquals($new_value, $this->user->field_shared->value);

    // Unset the sync setting and assert field is not synced.
    $this->drupalGet('admin/config/people/simplenews/settings/subscriber');
    $this->submitForm(['simplenews_sync_fields' => FALSE], 'Save configuration');

    $unsynced_value = $this->randomMachineName();
    $this->drupalGet('admin/people/simplenews/edit/' . $subscriber->id());
    $this->submitForm(['field_shared[0][value]' => $unsynced_value], 'Save');
    $this->drupalGet('admin/people/simplenews/edit/' . $subscriber->id());
    $this->assertSession()->responseContains($unsynced_value);

    $this->user = User::load($this->user->id());
    $this->assertEquals($new_value, $this->user->field_shared->value);
    $this->assertNotEquals($unsynced_value, $this->user->field_shared->value);
  }

}
