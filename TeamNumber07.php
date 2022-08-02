<?php
/*
    File: CSIS 3280 004 Term Project
    Team Number: 07
    Team Members:   
    Ying Deng (300340489)
    Liangku Lin (300335224)
*/

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

// Save recipes from API if data is not stored in the database
RecipeService::saveRecipes();

if (LoginManager::verifyLogin()) {
    // Check and save edit post
    LoginManager::saveEditAccount();
}

Page::showHeader();

// if the user search for specific meals 
if (isset($_POST['search'])) {
    // show results
    $recipes = RecipeDAO::searchMeals($_POST['meal']);
    $msg = count($recipes) . " result(s) for " . $_POST['meal'];
    Page::$message = $msg;

    Page::showHome($recipes);
} else {
    // show all meals
    $recipes = RecipeDAO::getAllRecipes();
    Page::showHome($recipes);
}

Page::showFooter();

?>