<?php

// require all the files
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
    // UserDAO::init();
    // $user = UserDAO::getUser($_SESSION['loggedemail']);
    Page::showHeader();
    $recipeURL = "https://www.themealdb.com/api/json/v1/1/search.php?f=a";
    $data = file_get_contents($recipeURL);
    $recipes = json_decode($data);
    var_dump($recipes);
} else {
    header('Location: Login.php');
}

Page::showFooter();

?>