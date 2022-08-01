<?php

// require once the files
require_once("inc/config.inc.php");
require_once("inc/Entity/User.class.php");
require_once("inc/Entity/Page.class.php");
require_once("inc/Utility/LoginManager.class.php");
require_once("inc/Utility/PDOAgent.class.php");
require_once("inc/Utility/UserDAO.class.php");
require_once("inc/Utility/Validate.class.php");

//Start the session
session_start();

if (LoginManager::verifyLogin()) {
    UserDAO::init();
    $user = UserDAO::getUser($_SESSION['loggedemail']);
    unset($_SESSION['loggedemail']);
    session_destroy();
    Page::showHeader();
    Page::showLogout($user);
} else {
    header('Location: Login.php');
}

Page::showFooter();

?>
