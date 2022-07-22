<?php 

class Order{

    private $id; 
    private $totalPrice; 
    private $imageURL; 
    private $mealName; 
    private $mealInstructions; 
    private $userID;

    function setID($id){
        $this->id = $id;
    }
    function setTotalPrice($totalPrice){
        $this->totalPrice = $totalPrice;
    }
    function setImageURL($imageURL){
        $this->imageURL = $imageURL;
    }
    function setMealName($mealName){
        $this->mealName = $mealName;
    }
    function setMealInstructions($mealInstructions){
        $this->mealInstructions = $mealInstructions;
    }
    function setUserID($userID){
        $this->userID = $userID;
    }

    function getID(){
        return $this->id;
    }
    function getTotalPrice(){
        return $this->totalPrice;
    }
    function getImageURL(){
        return $this->imageURL;
    }
    function getMealName(){
        return $this->mealName;
    }
    function getMealInstructions(){
        return $this->mealInstructions;
    }
    function getUserID(){
        return $this->userID;
    }






}

?>