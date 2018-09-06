<?php

namespace Drupal\parts_helper\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Messenger\MessengerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class PartsForm extends FormBase {

    protected $messenger;

    public function __construct(MessengerInterface $messenger){
        $this->messenger = $messenger;
    }

    public static function create(ContainerInterface $container){
        return new static (
            $container->get('messenger')
        );
    }

    public function getFormId(){
        return "parts_form";
    }

    public function buildForm(array $form, FormStateInterface $form_state){

        $form['name'] = [
            '#type' => 'textfield',
            '#title' => 'Name',
            '#required' => 'TRUE',
        ];

        $form['surname'] = [
            '#type' => 'textfield',
            '#title' => 'Surname',
            '#required' => 'TRUE',
        ];

        $form['email'] = [
            '#type' => 'email',
            '#title' => 'Email',
            '#required' => 'TRUE',
        ];

        $form['comment'] = [
            '#type' => 'textarea',
            '#title' => 'Comment',
        ];

        $form['storage_facility'] = [
            '#type' => 'radios',
            '#options' => ['GC' => $this->t('Gulbene'), 'RI' => $this->t('Riga'), 'VM' => $this->t('Valmiera')],
        ];

        $form['upload'] = [
            '#type' => 'file',
            '#multiple' => 'FALSE',
        ];

        $form['submit'] = [
            '#type' => 'submit',
            '#value' => 'Submit',
        ];

        return $form;
    }

    public function validateForm(array &$form, FormStateInterface $form_state){

        if (preg_match('~[0-9]~', $form_state->getValue('name'))){
            $form_state->setErrorByName('name', $this->t('Name cannot contain numbers!'));
        }

        if (preg_match('~[0-9]~', $form_state->getValue('surname'))){
            $form_state->setErrorByName('surname', $this->t('Surname cannot contain numbers!'));
        }

    }

    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        // drupal_set_message("Thank you for your submission.");
        $this->messenger->addMessage('Thank you!');
    }

}

