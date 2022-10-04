<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Faker\Generator as FakerG;
use DB;
use Database\Seeders\DatabaseCommunicationGet as DBCG;
use Database\Factories\GoogleTranslateAPI as GTAPI;

class LanguageSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!DBCG::checkDatabseForLanguages()) return;   //change if languages can be generated
        
        //self::insertLanguages();

        self::translateAll();
    }

    private function insertLanguages(){

        $faker = Faker::create('App\Language');
        $languages = self::getLanguages();
        for($i = 0; $i < 5; $i++){
            self::insertLanguageItems($faker, $languages, $i);
        }
    }

    private function insertLanguageItems(FakerG $faker, $languages, $i){
        DB::table('language')->insert([
            'name' => $languages[$i][0],
            'slug' => $languages[$i][1],
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }

    public function getLanguages()
    {
        return [
            ["spanish", "es"],
            ["french", "fr"],
            ["german", "de"],
            ["swedish", "sv"],
            ["croatian", "hr"]
        ];
    }

    private function translateAll()
    {
        $languages = DBCG::getLanguages4Translate();

        self::transalteCategories($languages);
        self::transalteTags($languages);
        self::transalteIngredients($languages);
        self::transalteMeals($languages);
    }

    //myb somehow create one of these 3
    //?turn everything to one string and call translate api once per item/once?
    private function transalteCategories($languages)
    {
        $categories = DBCG::getCategories4Translate();
        foreach($categories as $category){
            foreach($languages as $language){
                $translation = GTAPI::translate("en", $language, $category->title);
                DB::table('categoryTranslation')->insert([
                    'idCategory' => $category->id,
                    'idLanguage' => $language,
                    'title' => $translation
                ]);
                self::sleepBetweenCalls();
            }
        }
    }

    private function transalteTags($languages)
    {
        $tags = DBCG::getTags4Translate();
        foreach($tags as $tag){
            foreach($languages as $language){
                $translation = GTAPI::translate("en", $language, $tag->title);
                DB::table('tagTranslation')->insert([
                    'idTag' => $tag->id,
                    'idLanguage' => $language,
                    'title' => $translation
                ]);
                self::sleepBetweenCalls();
            }
        }
    }

    private function transalteIngredients($languages)
    {
        $ingredients = DBCG::getIngredients4Translate();
        foreach($ingredients as $ingredient){
            foreach($languages as $language){
                $translation = GTAPI::translate("en", $language, $ingredient->title);
                DB::table('ingredientTranslation')->insert([
                    'idIngredient' => $ingredient->id,
                    'idLanguage' => $language,
                    'title' => $translation
                ]);
                self::sleepBetweenCalls();
            }
        }
    }

    private function transalteMeals($languages)
    {
        $meals = DBCG::getMeals4Translate();
        foreach($meals as $meal){
            foreach($languages as $language){
                $transTitle = GTAPI::translate("en", $language, $meal->title);
                $transDesc = GTAPI::translate("en", $language, $meal->description);
                DB::table('mealTranslation')->insert([
                    'idMeal' => $meal->id,
                    'idLanguage' => $language,
                    'title' => $transTitle,
                    'description' => $transDesc
                ]);
                self::sleepBetweenCalls();
            }
        }
    }

    private function sleepBetweenCalls(){
        usleep( 2 * 1000 );
    }
}
