<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Faker\Generator as FakerG;
use DB;
use Database\Seeders\DatabaseCommunicationGet as DBCG;
use Database\Factories\RandomValueGenerator as RVG;

class MealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numOfMealRecords = 50;

        //self::insertMealItems($numOfMealRecords);

        $meals = DBCG::getLatestMealsIds($numOfMealRecords);
        self::insertMealTags($numOfMealRecords, $meals);
        self::insertMealIngredient($numOfMealRecords, $meals);
    }

    private function insertMealItems($numOfMealRecords)
    {
        $faker = Faker::create('App\Meal');

        $possibleCategoryIds = DBCG::getCategoryIds();
        if (count($possibleCategoryIds) == 0){ //alert does not work nor does throw exception
            alert("No categories defined in database! Meals cannot be linked to a category so they were not created!");
            return;
        }

        for($i = 0; $i < $numOfMealRecords; $i++){
            if(RVG::randomTrueFalse()){
                $id = RVG::getRandomElement($possibleCategoryIds);
                self::insertMealsWithCategory($faker, $id);
            } else {
                self::insertMeals($faker);
            }
        }
    }

    private function insertMealsWithCategory(FakerG $faker, $id)
    {
        DB::table('meal')->insert([
            'title' => $faker->catchPhrase(),
            'description' => implode(" " , $faker->sentences(3)),
            'idCategory' => $id,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }

    private function insertMeals(FakerG $faker)
    {
        DB::table('meal')->insert([
            'title' => $faker->catchPhrase(),
            'description' => implode(" " , $faker->sentences(3)),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }

    private function insertMealTags($numOfMealRecords, $meals)
    {
        $tagsDefault = DBCG::getTagIds();

        foreach($meals as $meal){   //there is no pop for element based on value
            $tags = $tagsDefault->shuffle();
            $elems = RVG::getRandomElementInRange(1,4);
            for(;$elems>0;$elems--){
                DB::table('tags')->insert([
                    'idMeal' => $meal,
                    'idTag' => $tags->pop()
                ]);
            }
        }
    }

    private function insertMealIngredient($numOfMealRecords, $meals)
    {
        $ingredientsDefault = DBCG::getIngredientIds();

        foreach($meals as $meal){
            $ingredients = $ingredientsDefault->shuffle();
            $elems = RVG::getRandomElementInRange(3,6);
            for(;$elems>0;$elems--){
                DB::table('ingredients')->insert([
                    'idMeal' => $meal,
                    'idIngredient' => $ingredients->pop()
                ]);
            }
        }
    }
}
