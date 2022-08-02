<?php

// This class Recipe is to store the information of Recipes from the API
class Recipe
{
    // Attributes
    private $mealId;
    private $mealName;
    private $mealInstructions;
    private $imageURL;
    private $category;
    private $tagStr;
    private $youtubeLink;

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

    function getYoutubeLink()
    {
        return $this->youtubeLink;
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
        $this->mealInstructions = nl2br($value);
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

    function setYoutubeLink($value)
    {
        $this->youtubeLink = str_replace("watch?v=", "embed/", $value);
    }
}

?>
