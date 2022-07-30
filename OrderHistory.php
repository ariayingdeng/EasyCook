<?php
require_once("inc/config.inc.php");

require_once("inc/Entity/Recipe.class.php");
require_once("inc/Entity/User.class.php");
require_once("inc/Entity/Page.class.php");
require_once("inc/Entity/Order.class.php");
require_once("inc/Entity/InventoryItem.class.php");
require_once("inc/Entity/OrderItem.class.php");

require_once("inc/Utility/LoginManager.class.php");
require_once("inc/Utility/RecipeService.class.php");
require_once("inc/Utility/PDOAgent.class.php");
require_once("inc/Utility/UserDAO.class.php");
require_once("inc/Utility/RecipeDAO.class.php");
require_once("inc/Utility/OrderDAO.class.php");
require_once("inc/Utility/Validate.class.php");


// firstly verify user
if (LoginManager::verifyLogin()==false){
    header("Location:Login.php");
 }


OrderDAO::init();
UserDAO::init();   


//if post = delete
if (isset($_POST['delete'])){
    OrderDAO::deleteOrderWithAllOrderItems($_POST['deleteID']);
}

$currentUser = UserDAO::getUser($_SESSION['loggedemail']);
$orderListFromThisUser = OrderDAO::getOrderByUserID($currentUser->getId());

Page::showHeader();
Page::showOrderHistory(array_reverse($orderListFromThisUser));
Page::showFooter();

?>