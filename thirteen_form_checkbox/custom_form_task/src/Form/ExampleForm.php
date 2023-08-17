<?php

namespace Drupal\custom_form_task\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a Custom form task form.
 */
class ExampleForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'custom_form_task_example';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['#attached']['library'][] = "custom_form_task/config_lib";

    $form['first_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('First Name'),
      '#required' => TRUE,
    ];

    $form['no_last_name'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('No Last Name'),
      '#required' => TRUE,
      '#attributes' => ['id' => 'no-last-name'],
    ];

    $form['last_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Last Name'),
      '#required' => TRUE,

      // '#states'   => [
      // 'visible' => [
      // ':input[name="no_last_name"]' => ['checked' => false],
      // ],
      // ]
    ];
    $form['actions'] = [
      '#type' => 'actions',
    ];
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Send'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->messenger()->addStatus($this->t('The first name has been sent.'));
    $form_state->setRedirect('<front>');
  }

}
