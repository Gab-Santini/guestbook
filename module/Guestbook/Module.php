<?php
namespace Guestbook;

use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;


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
                'guestbook_entry_service' => 'Guestbook\Service\Entry',
				'guestbook_entry_filter' => 'Guestbook\Form\EntryFilter',
            	'guestbook_entity_entry' => 'Guestbook\Entity\Entry',
            ),
            'factories' => array(
                'guestbook_entry_mapper' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype($sm->get('guestbook_entity_entry'));
                    $mapper =  new Entity\EntryTable('guestbook_entry', $dbAdapter, null, $resultSetPrototype);
                    return $mapper;
                },    
                
                'guestbook_entry_form' => function ($sm) {
                    $form = new Form\Entry();
                    $form->setInputFilter($sm->get('guestbook_entry_filter'));
                    return $form;
                },
                
            ),
        );
    }
}
