<?php 

class InventoryItem{


    private $id; 
    private $itemName;
    private $quantityInStock;
    private $pricePerPortion;
    private $measurePerPortion;

    //getter 
    function getID(){
        return $this->id;
    }
    function getItemName(){
        return $this->itemName;
    }
    function getQuantityInStock(){
        return $this->quantityInStock;
    }
    function getPricePerPortion(){
        return $this->pricePerPortion;
    }
    function getMeasurePerPortion(){
        return $this->measurePerPortion;
    }

    //setter 
    function setID($id){
        $this->id = $id;
    }
    function setItemName($itemName){
        $this->itemName = $itemName;
    }
    function setQuantityInStock($quantityInStock){
        $this->quantityInStock = $quantityInStock;
    }
    function setPricePerPortion($pricePerPortion){
        $this->pricePerPortion = $pricePerPortion;
    }
    function setMeasurePerPortion($measurePerPortion){
        $this->measurePerPortion = $measurePerPortion;
    }







}





?>