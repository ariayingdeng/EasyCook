<?php

/*
	id INT AUTO_INCREMENT PRIMARY KEY,	
	email VARCHAR(50),
    username VARCHAR(50),
	password VARCHAR(250),
    phoneNumber VARCHAR(10),
    address VARCHAR(200)
*/

class User
{

    //Properties
    private $id;
    private $email;
    private $username;
    private $password;
    private $phoneNumber;
    private $address;

    //Getters
    function getId()
    {
        return $this->id;
    }

    function getEmail()
    {
        return $this->email;
    }

    function getUsername()
    {
        return $this->username;
    }

    function getPassword()
    {
        return $this->password;
    }

    function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    function getAddress()
    {
        return $this->address;
    }

    //Setters
    function setEmail($value)
    {
        $this->email = $value;
    }

    function setUsername($value)
    {
        $this->username = $value;
    }

    function setPassword($value)
    {
        // encrypt the password
        $this->password = password_hash($value, PASSWORD_DEFAULT);
    }

    function setPhoneNumber($value)
    {
        $this->phoneNumber = $value;
    }

    function setAddress($value)
    {
        $this->address = $value;
    }

    //Verify the password
    function verifyPassword(string $passwordToVerify)
    {
        return password_verify($passwordToVerify, $this->password);
    }
}

?>