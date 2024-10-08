<?php

namespace Drupal\page_manager\Entity;

use Drupal\Component\Plugin\Exception\ContextException;
use Drupal\Component\Plugin\Exception\MissingValueContextException;
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
 * Defines the access control handler for the page entity type.
 */
class PageAccess extends EntityAccessControlHandler implements EntityHandlerInterface {

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
    /** @var \Drupal\page_manager\PageInterface $entity */
    if ($operation == 'view') {
      if (!$entity->status()) {
        return AccessResult::forbidden()->addCacheableDependency($entity);
      }
      $missing_value = FALSE;
      $missing_context = FALSE;
      $contexts = $entity->getContexts();
      $conditions = $entity->getAccessConditions();
      foreach ($conditions as $condition) {
        if ($condition instanceof ContextAwarePluginInterface) {
          try {
            $this->contextHandler->applyContextMapping($condition, $contexts);
          }
          catch (MissingValueContextException $e) {
            $missing_value = TRUE;
          }
          catch (ContextException $e) {
            $missing_context = TRUE;
          }
        }
      }

      if ($missing_context) {
        // If any context is missing then we might be missing cacheable
        // metadata, and don't know based on what conditions the block is
        // accessible or not. Make sure the result cannot be cached.
        $access = AccessResult::forbidden()->setCacheMaxAge(0);
      }
      elseif ($missing_value) {
        // The contexts exist but have no value. Deny access without
        // disabling caching. For example the node type condition will have a
        // missing context on any non-node route like the frontpage.
        $access = AccessResult::forbidden();
      }
      else {
        $access = AccessResult::allowedIf($this->resolveConditions($conditions, $entity->getAccessLogic()));
      }
      return $access;
    }
    return parent::checkAccess($entity, $operation, $account);
  }

}
