<?php 
// require once all the files
require_once("inc/config.inc.php");
require_once("inc/Entity/User.class.php");
require_once("inc/Entity/Page.class.php");
require_once("inc/Entity/Recipe.class.php");
require_once("inc/Entity/InventoryItem.class.php");
require_once("inc/Utility/LoginManager.class.php");
require_once("inc/Utility/Validate.class.php");
require_once("inc/Utility/RecipeService.class.php");
require_once("inc/Utility/PDOAgent.class.php");
require_once("inc/Utility/UserDAO.class.php");
require_once("inc/Utility/RecipeDAO.class.php");
require_once("inc/Utility/InventoryItemDAO.class.php");
require_once("inc/Entity/Order.class.php");
require_once("inc/Entity/OrderItem.class.php");
require_once("inc/Utility/OrderDAO.class.php");

// firstly verify user
if (LoginManager::verifyLogin()==false){
    header("Location:Login.php");
 }




RecipeDAO::init();
UserDAO::init();
OrderDAO::init();
InventoryItemDAO::init();


$currentMealName = RecipeService::getRecipe($_GET['mealName']);
$currentMeal = $currentMealName->meals[0];



// push all ingredient(name) into array
$ingredentArray=[];
for ($i=1;$i<21;$i++){
    $string = "strIngredient".(string)$i;
    if ($currentMeal->$string!=""){
       $ingredentArray[$currentMeal->$string]=0;
    }
}


Page::showHeader();
// calculate total 
// render the Page 
$total = 0;
if (isset($_POST['checkout'])){
    foreach($ingredentArray as $ingredient=>$amount){
        $currentItem = InventoryItemDAO::getInventoryItemByName($ingredient);
        $trimIngredent = str_replace(' ', '', $ingredient);
        $priceOFEachIngredents =  $_POST[$trimIngredent]*$currentItem->getPricePerPortion();
        $ingredentArray[$ingredient]= $priceOFEachIngredents;
        $total+= $priceOFEachIngredents ;
    }
    Page::showOrderDetails($ingredentArray,$total);
} else if (isset($_POST['confirm'])){

    //insert data orders table
    $currentUser = UserDAO::getUser($_SESSION['loggedemail']);
    $newOrder = new Order();
    $newOrder->setTotalPrice($_POST['orderTotal']);
    $newOrder->setImageURL($currentMeal->strMeal);
    $newOrder->setMealName($currentMeal->strMealThumb);
    $newOrder->setMealInstructions($currentMeal->strInstructions);
    $newOrder->setUserID($currentUser->getId());
    $lastOrderID = OrderDAO::createOrder($newOrder);

    //Find each ingredient's amount and insert data into Orderitem table
    foreach($ingredentArray as $ingredient=>$amount){
        $currentItem = InventoryItemDAO::getInventoryItemByName($ingredient);
        $trimIngredent = str_replace(' ', '', $ingredient);
        $eachAmount =  $_POST[$trimIngredent];
        
        //create orderItem into database 
        $orderItem = new OrderItem();
        $orderItem->setOrderID($lastOrderID);
        $orderItem->setInventoryID($currentItem->getID());
        $orderItem->setAmount( $eachAmount );
        OrderDAO::createOrderItem($orderItem);
    }
    header("Location:Home.php");
   
} else {
    Page::showOrder($currentMeal,$ingredentArray);
}
Page::showFooter();



?>