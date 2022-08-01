<?php

class RecipeService
{
    private static $recipesURL = "https://www.themealdb.com/api/json/v1/1/filter.php?a=Canadian";
    private static $recipeURLPre = "https://www.themealdb.com/api/json/v1/1/search.php?s=";

    static function saveRecipes()
    {
        if (RecipeDAO::getRowCount() < 1) {
            $data = file_get_contents(self::$recipesURL);
            $recipesRaw = json_decode($data);
            foreach ($recipesRaw->meals as $recipeRaw) {
                $mealName = $recipeRaw->strMeal;
                if ($mealName != 'Rappie Pie') {
                    $recipe = self::getRecipeObject($mealName);

                    RecipeDAO::saveRecipe($recipe);
                }
            }
        }
    }

    public static function getRecipe($mealName)
    {
        $recipeURL = self::$recipeURLPre . $mealName;
        $data = file_get_contents($recipeURL);
        $recipe = json_decode($data);
        return $recipe;
    }

    static function getRecipeObject($mealName) {
        $recipeJson = self::getRecipe($mealName);
        $recipeDetails = $recipeJson->meals[0];
        $recipe = new Recipe();
        $recipe->setMealId($recipeDetails->idMeal);
        $recipe->setMealName($recipeDetails->strMeal);
        $recipe->setMealInstructions($recipeDetails->strInstructions);
        $recipe->setImageURL($recipeDetails->strMealThumb);
        $recipe->setCategory($recipeDetails->strCategory);
        $recipe->setTags($recipeDetails->strTags);
        $recipe->setYoutubeLink($recipeDetails->strYoutube);
        return $recipe;
    }

    
}

?>