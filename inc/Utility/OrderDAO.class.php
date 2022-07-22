<?php 

class OrderDAO
{

    private static $db;

    static function init()
    {
        self::$db = new PDOAgent("order");
        self::$db = new PDOAgent("OrderItem");
    }

    static function createOrder(Order $order)
    {
        $sql = "INSERT INTO orders (totalPrice, imageURL, mealName, mealInstructions, userID) VALUES (:totalPrice, :imageURL, :mealName, :mealInstructions, :userID)";

        self::$db->query($sql);
        self::$db->bind(":totalPrice", $order->getTotalPrice());
        self::$db->bind(":imageURL", $order->getImageURL());
        self::$db->bind(":mealName", $order->getMealName());
        self::$db->bind(":mealInstructions", $order->getMealInstructions());
        self::$db->bind(":userID", $order->getUserID());
        self::$db->execute();
        return self::$db->lastInsertedId();
    }

    // get all orders 
    static function getOrders($userID){
        $sql = "SELECT * FROM orders WHERE userID=:userID";
        self::$db->query($sql);
        self::$db->bind(":userID",$userID);
        self::$db->execute();
        return self::$db->getSetResult();
    }


    static function createOrderItem(OrderItem $orderItem)
    {
        $sql = "INSERT INTO orderitem (orderID, inventoryID, amount) VALUES (:orderID, :inventoryID, :amount)";

        self::$db->query($sql);
        self::$db->bind(":orderID", $orderItem->getOrderID());
        self::$db->bind(":inventoryID", $orderItem->getInventoryID());
        self::$db->bind(":amount", $orderItem->getAmount());
        self::$db->execute();
        return self::$db->lastInsertedId();
    }
    
    static function getOrderItems($orderID)
    {
        $sql = "SELECT * FROM orderitem WHERE orderID=:orderID";
        self::$db->query($sql);
        self::$db->bind(":orderID",$orderID);
        self::$db->execute();
        return self::$db->getSetResult();
    }
}

?>