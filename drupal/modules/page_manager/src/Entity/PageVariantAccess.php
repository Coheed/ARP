<?php

namespace Drupal\page_manager\Entity;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Condition\ConditionAccessResolverTrait;
use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityHandlerInterface;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Plugin\Context\ContextHandlerInterface;
use Drupal\Core\Plugin\ContextAwarePluginInterface;
use Drupal\Core\Session\AccountInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Defines the access control handler for the page variant entity type.
 */
class PageVariantAccess extends EntityAccessControlHandler implements EntityHandlerInterface {

  use ConditionAccessResolverTrait;

  /**
   * The context handler.
   *
   * @var \Drupal\Core\Plugin\Context\ContextHandlerInterface
   */
  protected $contextHandler;

  /**
   * Constructs an access control handler instance.
   *
   * @param \Drupal\Core\Entity\EntityTypeInterface $entity_type
   *   The entity type definition.
   * @param \Drupal\Core\Plugin\Context\ContextHandlerInterface $context_handler
   *   The context handler.
   */
  public function __construct(EntityTypeInterface $entity_type, ContextHandlerInterface $context_handler) {
    parent::__construct($entity_type);
    $this->contextHandler = $context_handler;
  }

  /**
   * {@inheritdoc}
   */
  public static function createInstance(ContainerInterface $container, EntityTypeInterface $entity_type) {
    return new static(
      $entity_type,
      $container->get('context.handler')
    );
  }

  /**
   * Wraps the context handler.
   *
   * @return \Drupal\Core\Plugin\Context\ContextHandlerInterface
   *   The context handler.
   */
  protected function contextHandler() {
    return $this->contextHandler;
  }

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\page_manager\PageVariantInterface $entity */
    if ($operation === 'view') {
      $contexts = $entity->getContexts();
      $conditions = $entity->getSelectionConditions();
      foreach ($conditions as $condition) {
        if ($condition instanceof ContextAwarePluginInterface) {
          $this->contextHandler()->applyContextMapping($condition, $contexts);
        }
      }
      return AccessResult::allowedIf($this->resolveConditions($conditions, $entity->getSelectionLogic()));
    }
    return parent::checkAccess($entity, $operation, $account);
  }

}
