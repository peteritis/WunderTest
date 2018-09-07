<?php

namespace Drupal\parts_helper\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Messenger\MessengerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\parts_helper\PartsService;

class PartsForm extends FormBase {

    protected $messenger;
    protected $PartsService;

    public function __construct(MessengerInterface $messenger, PartsService $sender){
        $this->messenger = $messenger;
        $this->PartsService = $sender;
    }

    public static function create(ContainerInterface $container){
        return new static (
            $container->get('messenger'),
            $container->get('parts_helper.service')
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
        $usr_name = $form_state->getValue('name');
        $usr_surname = $form_state->getValue('surname');
        $usr_email = $form_state->getValue('email');
        // drupal_set_message("Thank you for your submission.");
        $this->messenger->addMessage('Thank you!');
        $this->messenger->addMessage($this->PartsService->PartsFormSubmitMessage($usr_name, $usr_surname, $usr_email));
    }

}

