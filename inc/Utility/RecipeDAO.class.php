<?php

class RecipeDAO
{

    // to store the PDO Agent
    private static $db;

    // to start the PDO Agent
    static function init()
    {
        self::$db = new PDOAgent("Recipe");
    }

    // to save recipe
    static function saveRecipe(Recipe $recipe)
    {

        $sql = "INSERT INTO recipes (mealId, mealName, mealInstructions, imageURL, category, tagStr, youtubeLink) VALUES (:mealId, :mealName, :mealInstructions, :imageURL, :category, :tagStr, :youtubeLink)";

        self::$db->query($sql);
        self::$db->bind(":mealId", $recipe->getMealId());
        self::$db->bind(":mealName", $recipe->getMealName());
        self::$db->bind(":mealInstructions", $recipe->getMealInstructions());
        self::$db->bind(":imageURL", $recipe->getImageURL());
        self::$db->bind(":category", $recipe->getCategory());
        self::$db->bind(":tagStr", $recipe->getTagStr());
        self::$db->bind(":youtubeLink", $recipe->getYoutubeLink());

        self::$db->execute();

        return self::$db->lastInsertedId();
    }

    // to get recipe details with mealName
    static function getRecipe(string $mealName)
    {
        $sql = "SELECT * FROM recipes WHERE mealName = :mealName";
        self::$db->query($sql);
        self::$db->bind(":mealName", $mealName);
        self::$db->execute();
        return self::$db->getSingleResult();
    }

    // to get all recipes
    static function getAllRecipes()
    {
        $sql = "SELECT * FROM recipes";
        self::$db->query($sql);
        self::$db->execute();
        return self::$db->getSetResult();
    }

    // to get the number of entities in the recipes table
    static function getRowCount() 
    {
        $sql = "SELECT * FROM recipes";
        self::$db->query($sql);
        self::$db->execute();
        return self::$db->rowCount();
    }
}
