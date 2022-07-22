<?php

// require all the files
require_once("inc/config.inc.php");
require_once("inc/Entity/User.class.php");
require_once("inc/Entity/Page.class.php");
require_once("inc/Utility/LoginManager.class.php");
require_once("inc/Utility/PDOAgent.class.php");
require_once("inc/Utility/UserDAO.class.php");
require_once("inc/Utility/Validate.class.php");

UserDAO::init();

if (!empty($_POST) && $_POST["submit"] == "Register") {
    if (Validate::validateRegister()) {
        $newUser = new User();
        $newUser->setEmail(trim($_POST["email"]));
        $newUser->setUsername(trim($_POST["username"]));
        $newUser->setPhoneNumber(trim($_POST["phonenumber"]));
        $newUser->setAddress(trim($_POST["address"]));
        $newUser->setPassword($_POST["password"]);
    
        UserDAO::createUser($newUser);
    
        header('Location: Login.php');
    } else {
        Page::$notifications = Validate::$messages;
    }
}
Page::showHeader();
Page::showRegistration();
Page::showFooter();

?>