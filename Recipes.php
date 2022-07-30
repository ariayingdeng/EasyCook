<?php

// require all the files
require_once("inc/config.inc.php");

require_once("inc/Entity/Recipe.class.php");
require_once("inc/Entity/User.class.php");
require_once("inc/Entity/Page.class.php");
require_once("inc/Entity/Order.class.php");

require_once("inc/Utility/LoginManager.class.php");
require_once("inc/Utility/RecipeService.class.php");
require_once("inc/Utility/PDOAgent.class.php");
require_once("inc/Utility/UserDAO.class.php");
require_once("inc/Utility/OrderDAO.class.php");
require_once("inc/Utility/RecipeDAO.class.php");
require_once("inc/Utility/Validate.class.php");

// init DAOs
UserDAO::init();
RecipeDAO::init();


//Start the session
session_start();

if (LoginManager::verifyLogin()) {
    // Check and save edit post
    LoginManager::saveEditAccount();

    $user = UserDAO::getUser($_SESSION['loggedemail']);

    Page::showHeader();
    $recipes = RecipeDAO::getRecipesByUserID($user->getId());
    Page::showOrderRecipes($recipes);
} else {
    header('Location: Login.php');
}

Page::showFooter();

?>