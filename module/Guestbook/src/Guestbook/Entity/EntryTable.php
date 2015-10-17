<?php
namespace Guestbook\Entity;

use Zend\Db\TableGateway\TableGateway;
class EntryTable extends TableGateway
{
    public function add(Entry $entry)
    {
        $data = array(
            'name'      => $entry->getName(),
            'email'     => $entry->getEmail(),
            'website'   => $entry->getWebsite(),
            'message'   => $entry->getMessage(),
        );
    
        $this->insert($data);   
    }
    
    public function findAll()
    {
        $resultSet = $this->select();
        return $resultSet;
    }
}