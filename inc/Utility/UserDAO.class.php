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

        $sql = "INSERT INTO user (email, username, password) VALUES (:email, :username, :password)";

        self::$db->query($sql);
        self::$db->bind(":email", $user->getEmail());
        self::$db->bind(":username", $user->getUsername());
        self::$db->bind(":password", $user->getPassword());

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
        $sql = "UPDATE user SET email=:email, username=:username, password=:password WHERE id=:id";

        self::$db->query($sql);
        self::$db->bind(":id", $user->getId());
        self::$db->bind(":email", $user->getEmail());
        self::$db->bind(":username", $user->getUsername());
        self::$db->bind(":password", $user->getPassword());

        self::$db->execute();

        return self::$db->rowCount();
    }

}
