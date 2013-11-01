<?php

class Application_Model_Author
{

    protected $_id;
    protected $_firstName;
    protected $_middleName;
    protected $_lastName;
    protected $_popularName;
    protected $_email;
    protected $_address;
 
    public function __construct(array $options = null)
    {
        if (is_array($options)) {
            $this->setOptions($options);
        }
    }
 
    public function __set($name, $value)
    {
        $method = 'set' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid Author property');
        }
        $this->$method($value);
    }
 
    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid Author property');
        }
        return $this->$method();
    }
 
    public function setOptions(array $options)
    {
        $methods = get_class_methods($this);
        foreach ($options as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (in_array($method, $methods)) {
                $this->$method($value);
            }
        }
        return $this;
    }
 
    public function setId($id)
    {
        $this->_id = (int) $id;
        return $this;
    }
 
    public function getId()
    {
        return $this->_id;
    }

    public function setFirstName($firstName)
    {
        $this->_firstName = (string) $firstName;
        return $this;
    }

    public function getFirstName()
    {
        return $this->_firstName;
    }

    public function setMiddleName($middleName)
    {
        $this->_middleName = (string) $middleName;
        return $this;
    }

    public function getMiddleName()
    {
        return $this->_middleName;
    }

    public function setLastName($lastName)
    {
        $this->_lastName = (string) $lastName;
        return $this;
    }

    public function getLastName()
    {
        return $this->_lastName;
    }

    public function setPopularName($popularName)
    {
        $this->_popularName = (string) $popularName;
        return $this;
    }

    public function getPopularName()
    {
        return $this->_popularName;
    }
 
    public function setEmail($email)
    {
        $this->_email = (string) $email;
        return $this;
    }
 
    public function getEmail()
    {
        return $this->_email;
    }
 
    public function setAddress($address)
    {
        $this->_address = $address;
        return $this;
    }
 
    public function getAddress()
    {
        return $this->_address;
    }

}

