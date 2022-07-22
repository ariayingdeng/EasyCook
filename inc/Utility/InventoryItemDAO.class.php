<?php 

class InventoryItemDAO{

    private static $db;
    
    static function init(){
        self::$db = new PDOAgent("InventoryItem");
    } 
    
    static function getInventoryItemByName($itemName){
        $sql = "SELECT * FROM inventoryitem WHERE itemName=:itemName"; 
        self::$db->query($sql);
        self::$db->bind(":itemName",(string)$itemName);
        self::$db->execute();
        return self::$db->getSingleResult();
    }
}


?>