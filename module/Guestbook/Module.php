<?php
namespace Guestbook;

use Zend\Stdlib\Hydrator\ClassMethods;
class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    
    public function getServiceConfig()
    {
        return array(
            'invokables' => array(
                'guestbook_entry_filter' => 'Guestbook\Form\EntryFilter',

            ),
            'factories' => array(
                'guestbook_entry_form' => function ($sm) {
                    $form = new Form\Entry();
                    $form->setHydrator(new ClassMethods());
                    $form->setInputFilter($sm->get('guestbook_entry_filter'));
                    return $form;
                },
            ),
        );
    }
}
