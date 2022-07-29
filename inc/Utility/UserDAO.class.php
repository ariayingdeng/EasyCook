<?php

class UserDAO
{

    // to store the PDO Agent
    private static $db;

    // to start the PDO Agent
    static function init()
    {
        self::$db = new PDOAgent("User");
    }

    // to create user
    static function createUser(User $user)
    {

        $sql = "INSERT INTO user (email, username, password, phoneNumber, address) VALUES (:email, :username, :password, :phoneNumber, :address)";

        self::$db->query($sql);
        self::$db->bind(":email", $user->getEmail());
        self::$db->bind(":username", $user->getUsername());
        self::$db->bind(":password", $user->getPassword());
        self::$db->bind(":phoneNumber", $user->getPhoneNumber());
        self::$db->bind(":address", $user->getAddress());

        self::$db->execute();

        return self::$db->lastInsertedId();
    }

    // to get user detail
    static function getUser(string $email)
    {
        $sql = "SELECT * FROM user WHERE email = :email";
        self::$db->query($sql);
        self::$db->bind(":email", $email);
        self::$db->execute();
        return self::$db->getSingleResult();
    }

    // update the current user profile
    static function updateUser(User $user)
    {
        $sql = "UPDATE user SET username=:username, password=:password, phoneNumber=:phoneNumber, address=:address WHERE email=:email";

        self::$db->query($sql);
        self::$db->bind(":email", $user->getEmail());
        self::$db->bind(":username", $user->getUsername());
        self::$db->bind(":password", $user->getPassword());
        self::$db->bind(":phoneNumber", $user->getPhoneNumber());
        self::$db->bind(":address", $user->getAddress());

        self::$db->execute();

        return self::$db->rowCount();
    }

    

}
