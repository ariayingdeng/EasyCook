<?php

// This class OrderItem is for keeping track of ingredients of a order
class OrderItem
{
    private $id;
    private $orderID;
    private $inventoryID;
    private $amount;

    // Getters
    function getId()
    {
        return $this->id;
    }
    function getOrderID()
    {
        return $this->orderID;
    }
    function getInventoryID()
    {
        return $this->inventoryID;
    }
    function getAmount()
    {
        return $this->amount;
    }

    // Setters
    function setId($id)
    {
        $this->id = $id;
    }
    function setOrderID($orderID)
    {
        $this->orderID = $orderID;
    }

    function setInventoryID($inventoryID)
    {
        $this->inventoryID = $inventoryID;
    }

    function setAmount($amount)
    {
        $this->amount = $amount;
    }
}

?>
