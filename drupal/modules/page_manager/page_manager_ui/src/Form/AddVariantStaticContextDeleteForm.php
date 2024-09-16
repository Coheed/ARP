<?php

namespace Drupal\page_manager_ui\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Drupal\ctools\Form\ContextDelete;

/**
 * Delete form for adding static contexts.
 */
class AddVariantStaticContextDeleteForm extends ContextDelete {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'page_manager_static_context_delete_form';
  }

  /**
   * {@inheritdoc}
   */
  public function getQuestion() {
    $cached_values = $this->getTempstore();
    /** @var \Drupal\page_manager\PageInterface $page */
    $page_variant = $this->getPageVariant($cached_values);
    return $this->t('Are you sure you want to delete the static context %label?', ['%label' => $page_variant->getStaticContext($this->context_id)['label']]);
  }

  /**
   * {@inheritdoc}
   */
  public function getCancelUrl() {
    $cached_values = $this->getTempstore();
    $page_variant = $this->getPageVariant($cached_values);
    return new Url('entity.page_variant.add_step_form', [
      'page' => $page_variant->getPage()->id(),
      'machine_name' => $this->machine_name,
      'step' => 'contexts',
    ]);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $cached_values = $this->getTempstore();
    /** @var \Drupal\page_manager\PageVariantInterface $page_variant */
    $page_variant = $this->getPageVariant($cached_values);
    $this->messenger()->addMessage($this->t('The static context %label has been removed.', ['%label' => $page_variant->getStaticContext($this->context_id)['label']]));
    $page_variant->removeStaticContext($this->context_id);
    $this->setTempstore($cached_values);
    parent::submitForm($form, $form_state);
  }

  /**
   * Get the page variant.
   *
   * @param array $cached_values
   *   The cached values from the wizard.
   *
   * @return \Drupal\page_manager\PageVariantInterface
   *   The Page Variant.
   */
  protected function getPageVariant(array $cached_values) {
    return $cached_values['page_variant'];
  }

}
