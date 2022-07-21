<?php 

class InventoryItemDAO{

    private static $db;
    
    static function init(){
        self::$db = new PDOAgent("InventoryItem");
    } 
    
    static function getInventoryItem($id){
        $sql = "SELECT * FROM inventoryitem WHERE id=:id"; 
        self::$db->query($sql);
        self::$db->bind(":id",$id);
        self::$db->execute();
        return self::$db->getSingleResult();
    }
}


?>