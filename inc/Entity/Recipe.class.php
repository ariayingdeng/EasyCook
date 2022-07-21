<?php

class Recipe
{
    // Attributes
    private $mealId;
    private $mealName;
    private $mealInstructions;
    private $imageURL;
    private $category;
    private $tagStr;

    // Getters
    function getMealId()
    {
        return $this->mealId;
    }

    function getMealName()
    {
        return $this->mealName;
    }

    function getMealInstructions()
    {
        return $this->mealInstructions;
    }

    function getImageURL()
    {
        return $this->imageURL;
    }

    function getCategory()
    {
        return $this->category;
    }

    function getTagStr()
    {
        return $this->tagStr;
    }


    // Setters
    function setMealId($value)
    {
        $this->mealId = $value;
    }

    function setMealName($value)
    {
        $this->mealName = $value;
    }

    function setMealInstructions($value)
    {
        $this->mealInstructions = $value;
    }

    function setImageURL($value)
    {
        $this->imageURL = $value;
    }

    function setCategory($value)
    {
        $this->category = $value;
    }

    function setTags($value)
    {
        $this->tagStr = $value;
    }
}

?>
