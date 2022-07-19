<?php

/*
	id INT AUTO_INCREMENT PRIMARY KEY,	
	email VARCHAR(50),
    username VARCHAR(50),
	password VARCHAR(250)	
*/

class User
{

    //Properties
    private $id;
    private $email;
    private $username;
    private $password;

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

    //Setters
    function setEmail($value)
    {
        $this->email = $value;
    }

    function setPassword($value)
    {
        // encrypt the password
        $this->password = password_hash($value, PASSWORD_DEFAULT);
    }

    function setUsername($value)
    {
        $this->username = $value;
    }

    //Verify the password
    function verifyPassword(string $passwordToVerify)
    {
        return password_verify($passwordToVerify, $this->password);
    }
}
