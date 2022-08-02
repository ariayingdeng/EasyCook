<?php

// require the files
require_once("inc/config.inc.php");
require_once("inc/Entity/User.class.php");
require_once("inc/Entity/Page.class.php");
require_once("inc/Utility/LoginManager.class.php");
require_once("inc/Utility/PDOAgent.class.php");
require_once("inc/Utility/UserDAO.class.php");
require_once("inc/Utility/Validate.class.php");

UserDAO::init();

// check Login post and validate the credentials
if (!empty($_POST) && $_POST["submit"] == "Login") {
    $user = UserDAO::getUser($_POST['email']);
    if ($user && $user->verifyPassword($_POST['password'])) {
        session_start();
        $_SESSION['loggedemail'] = $user->getEmail();
    } else {
        Page::$message = "Wrong credentials for login.";
    }

}

// verify login session and display home page or login page accordingly
if (LoginManager::verifyLogin()) {
    $loggedUser = UserDAO::getUser($_SESSION['loggedemail']);
    header('Location: TeamNumber07.php');
    exit;
} else {
    Page::showHeader();
    Page::showLogin();
}

Page::showFooter();

?>