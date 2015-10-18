<?php
namespace Guestbook\Entity;

class Entry
{
    protected $id;

    protected $name;

    protected $email;

    protected $website;

    protected $message;
    
    public function exchangeArray($data)
    {
        $this->id       = (!empty($data['id'])) ? $data['id'] : null;
        $this->name     = (!empty($data['name'])) ? $data['name'] : null;
        $this->email    = (!empty($data['email'])) ? $data['email'] : null;
        $this->website  = (!empty($data['website'])) ? $data['website'] : null;
        $this->message  = (!empty($data['message'])) ? $data['message'] : null;
    }
    
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setWebsite($website)
    {
        $this->website = $website;
        return $this;
    }

    public function getWebsite()
    {
        return $this->website;
    }

    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    public function getMessage()
    {
        return $this->message;
    }
}