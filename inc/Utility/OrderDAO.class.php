<?php 

class OrderDAO
{

    private static $orderDb;
    private static $orderItemDb;

    static function init()
    {
        self::$orderDb = new PDOAgent("Order");
        self::$orderItemDb = new PDOAgent("OrderItem");
    }

    static function createOrder(Order $order)
    {
        $sql = "INSERT INTO orders (totalPrice, imageURL, mealName, mealInstructions, userID,date,currentTime) VALUES (:totalPrice, :imageURL, :mealName, :mealInstructions, :userID,:date,:time)";

        self::$orderDb->query($sql);
        self::$orderDb->bind(":totalPrice", $order->getTotalPrice());
        self::$orderDb->bind(":imageURL", $order->getImageURL());
        self::$orderDb->bind(":mealName", $order->getMealName());
        self::$orderDb->bind(":mealInstructions", $order->getMealInstructions());
        self::$orderDb->bind(":userID", $order->getUserID());
        self::$orderDb->bind(":date", $order->getDate());
        self::$orderDb->bind(":time", $order->getTime());
        self::$orderDb->execute();
        return self::$orderDb->lastInsertedId();
    }

    // get all orders 
    static function getOrderByUserID($userID){
        $sql = "SELECT * FROM orders WHERE userID=:userID";
        self::$orderDb->query($sql);
        self::$orderDb->bind(":userID",$userID);
        self::$orderDb->execute();
        return self::$orderDb->getSetResult();
    }


    static function createOrderItem(OrderItem $orderItem)
    {
        $sql = "INSERT INTO orderitem (orderID, inventoryID, amount) VALUES (:orderID, :inventoryID, :amount)";

        self::$orderItemDb->query($sql);
        self::$orderItemDb->bind(":orderID", $orderItem->getOrderID());
        self::$orderItemDb->bind(":inventoryID", $orderItem->getInventoryID());
        self::$orderItemDb->bind(":amount", $orderItem->getAmount());
        self::$orderItemDb->execute();
        return self::$orderItemDb->lastInsertedId();
    }
    
    static function getOrderItems($orderID)
    {
        $sql = "SELECT * FROM orderitem WHERE orderID=:orderID";
        self::$orderItemDb->query($sql);
        self::$orderItemDb->bind(":orderID",$orderID);
        self::$orderItemDb->execute();
        return self::$orderItemDb->getSetResult();
    }

    static function editOrders($orderID,$total){
        date_default_timezone_set("America/Los_Angeles");
        $sql = "UPDATE orders  SET totalPrice=:totalPrice, date=:date, currentTime=:currentTime WHERE id=:id";
        self::$orderDb->query($sql);
        self::$orderDb->bind(":id",$orderID);
        self::$orderDb->bind(":totalPrice",$total);
        self::$orderDb->bind(":date",date("Y/m/d"));
        self::$orderDb->bind(":currentTime",date("H:i"));
        self::$orderDb->execute();


        // create a method to return 
        return self::$orderItemDb->lastInsertedId();
    }

    static function editOrderItems($orderId,$inventoryID,$eachAmount){

        date_default_timezone_set("America/Los_Angeles");
        $sql = "UPDATE orderitem SET amount=:eachAmount WHERE orderID=:orderID AND inventoryID=:inventoryID";
        self::$orderItemDb->query($sql);
        self::$orderItemDb->bind(":eachAmount",$eachAmount);
        self::$orderItemDb->bind(":orderID",$orderId);
        self::$orderItemDb->bind(":inventoryID",$inventoryID);
        self::$orderItemDb->execute();
        // return self::$orderItemDb->getSetResult();
    }

    static function deleteOrderWithAllOrderItems($orderID){
        $sql = "DELETE FROM orders WHERE id=:orderID";
        self::$orderDb->query($sql);
        self::$orderDb->bind(":orderID",$orderID);
        self::$orderDb->execute();

        $sql2 = "DELETE FROM orderitem WHERE orderID=:orderitemID";
        self::$orderItemDb->query($sql2);
        self::$orderItemDb->bind(":orderitemID",$orderID);
        self::$orderItemDb->execute();
    }
}

?>