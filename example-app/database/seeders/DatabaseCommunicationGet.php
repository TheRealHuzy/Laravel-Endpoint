<?php

namespace Database\Seeders;

use DB;
use App\Models\MyRequest;
use App\Models\MyResponse;

class DatabaseCommunicationGet{

    public static function getCategoryIds(){
        return DB::table('category')->pluck('id');
    }

    public static function getLatestMealsIds($numOfRecords){
        return DB::table('meal')->latest()->take($numOfRecords)->pluck('id');
    }

    public static function getTagIds(){
        return DB::table('tag')->pluck('id');
    }
    
    public static function getIngredientIds(){
        return DB::table('ingredient')->pluck('id');
    }

    public static function checkDatabseForLanguages()
    {
        if (count(DB::table('language')->get())) return true;
        else return false;
    }

    public static function getLanguages4Translate(){
        return DB::table('language')->pluck('slug');
    }

    public static function getCategories4Translate(){
        return DB::table('category')->select('title','id')->get();
    }

    public static function getTags4Translate(){
        return DB::table('tag')->select('title','id')->get();
    }

    public static function getIngredients4Translate(){
        return DB::table('ingredient')->select('title','id')->get();
    }

    public static function getMeals4Translate(){
        return DB::table('meal')->select('title', 'description', 'id')->get();
    }

    public static function getRequestBasedData($request)
    {
        //must be more delicate way that this
        $response = DB::table('meal')
            ->join('category', 'meal.idCategory', '=', 'category.id')
            ->join('tags', 'meal.id', '=', 'tags.idMeal')
            ->join('tag', 'tags.idTag', '=', 'tag.id')
            ->join('ingredients', 'meal.id', '=', 'ingredients.idMeal')
            ->join('ingredient', 'ingredients.idIngredient', '=', 'ingredient.id')
            ->select('meal.id', 'meal.title', 'meal.description',
                'category.title AS category', 'tag.title AS tag', 'ingredient.title AS ingredient')
            ->get();
        dd($response); 
        return self::filterRequestResponse($response);
    }

    private static function filterRequestResponse($response)
    {
        $i = 0;
        $filteredList[] = new MyResponse;

        foreach ($response as $elem){
            
            if ($i != 0 && $response[$i-1]->id == $elem->id){
                if ($response[$i-1]->tag == $elem->tag) $r->tags = $elem->tag;
                else $r->ingredients = $elem->ingredients;

                $i++;
                continue;
            } else {

            }

            $r = new MyResponse;
            $r->id = $elem->id;
            $r->title = $elem->title;
            $r->description = $elem->description;
            $r->category = $elem->category;
            $r->tags = $elem->tag;
            $r->ingredients = $elem->ingredient;

            $i++;

        }
    }
}