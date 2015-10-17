<?php
namespace Guestbook\Form;

use Zend\Form\Form;

class Entry extends Form
{
    public function __construct()
    {
        parent::__construct();

        $this->add(array(
            'name' => 'name',
            'options' => array(
                'label' => 'Name',
            ),
            'attributes' => array(
                'type' => 'text'
            ),
        ));

        $this->add(array(
            'name' => 'email',
            'options' => array(
                'label' => 'Email',
            ),
            'attributes' => array(
                'type' => 'email'
            ),
        ));

        $this->add(array(
            'name' => 'website',
            'options' => array(
                'label' => 'Website',
            ),
            'attributes' => array(
                'type' => 'url'
            ),
        ));

        $this->add(array(
            'name' => 'message',
            'options' => array(
                'label' => 'Message',
            ),
            'attributes' => array(
                'type' => 'textarea'
            ),
        ));

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Submit'
            ),
        ));
    }
}
