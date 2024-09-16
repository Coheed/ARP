<?php

namespace Drupal\simplenews\Mail;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Mail\MailFormatHelper;
use Drupal\Core\Utility\Token;
use Drupal\simplenews\Subscription\SubscriptionManagerInterface;

/**
 * Default mail builder.
 */
class MailBuilder implements MailBuilderInterface {

  /**
   * The token service.
   *
   * @var \Drupal\Core\Utility\Token
   */
  protected $token;

  /**
   * The config factory.
   *
   * @var \Drupal\Core\Config\ImmutableConfig
   */
  protected $config;

  /**
   * The subscription manager.
   *
   * @var \Drupal\simplenews\Subscription\SubscriptionManagerInterface
   */
  protected $subscriptionManager;

  /**
   * Constructs a MailBuilder.
   *
   * @param \Drupal\Core\Utility\Token $token
   *   The token service.
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   The config factory.
   * @param \Drupal\simplenews\Subscription\SubscriptionManagerInterface $subscription_manager
   *   The subscription manager.
   */
  public function __construct(Token $token, ConfigFactoryInterface $config_factory, SubscriptionManagerInterface $subscription_manager) {
    $this->token = $token;
    $this->config = $config_factory->get('simplenews.settings');
    $this->subscriptionManager = $subscription_manager;
  }

  /**
   * {@inheritdoc}
   */
  public function buildNewsletterMail(array &$message, MailInterface $mail) {
    // Get message data from the mail.
    $message['headers'] = $mail->getHeaders($message['headers']);
    $message['subject'] = $mail->getSubject();
    $message['body']['body'] = $mail->getBody();

    if ($mail->getFormat() == 'html') {
      // Set the necessary headers to detect this as an HTML mail. Set both the
      // Content-Type header, and the format (Swiftmailer) and plain (Mime Mail)
      // params.
      $message['headers']['Content-Type'] = 'text/html; charset=UTF-8';
      $message['params']['format'] = 'text/html';
      $message['params']['plain'] = NULL;

      if ($this->config->get('mail.textalt')) {
        // Provide a plain text version, both in params][plaintext (Mime Mail)
        // and plain (Swiftmailer).
        $message['params']['plaintext'] = MailFormatHelper::htmlToText($mail->getPlainBody());
        $message['plain'] = $message['params']['plaintext'];
      }

      // Add attachments, again, both for the attachments key (Mime Mail) and
      // files (Swiftmailer).
      $message['params']['attachments'] = $mail->getAttachments();
      $message['params']['files'] = $message['params']['attachments'];
    }
    else {
      // This is a plain text email, explicitly mark it as such, the default
      // Content-Type header already defaults to that.
      $message['params']['plain'] = TRUE;
      $message['params']['format'] = 'text/plain';
    }

  }

  /**
   * {@inheritdoc}
   */
  public function buildCombinedMail(array &$message, array $params) {
    $context = $params['context'];
    $subscriber = $context['simplenews_subscriber'];
    $langcode = $message['langcode'];

    // Use formatted from address "name" <mail_address>.
    $message['headers']['From'] = $params['from']['formatted'];

    $message['subject'] = $this->config->get('subscription.confirm_combined_subject');
    $message['subject'] = simplenews_token_replace_subject($message['subject'], $context);

    $actual_changes = 0;

    foreach ($subscriber->getChanges() as $newsletter_id => $action) {
      // Count the actual changes.
      $subscribed = $context['simplenews_subscriber']->isSubscribed($newsletter_id);
      if ($action == 'subscribe' && !$subscribed || $action == 'unsubscribe' && $subscribed) {
        $actual_changes++;
      }
    }

    // If there are actual changes, use the combined_body key otherwise use the
    // one without a confirmation link.
    $body_key = $actual_changes ? 'combined_body' : 'combined_body_unchanged';

    $body = $this->config->get('subscription.confirm_' . $body_key);
    $message['body'][] = simplenews_token_replace_body($body, $context);
  }

  /**
   * {@inheritdoc}
   */
  public function buildValidateMail(array &$message, array $params) {
    $context = $params['context'];

    // Use formatted from address "name" <mail_address>.
    $message['headers']['From'] = $params['from']['formatted'];

    $message['subject'] = $this->config->get('subscription.validate_subject');
    $message['subject'] = simplenews_token_replace_subject($message['subject'], $context);

    $body = $this->config->get('subscription.validate_body');
    $message['body'][] = simplenews_token_replace_body($body, $context);
  }

}
