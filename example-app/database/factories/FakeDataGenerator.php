<?php

namespace Database\Factories;

define("CTG_SD", "Database\Seeders\CategorySeeder");
define("ING_SD", "Database\Seeders\IngredientSeeder");
define("TAG_SD", "Database\Seeders\TagSeeder");
define("MEL_SD", "Database\Seeders\MealSeeder");
define("LNG_SD", "Database\Seeders\LanguageSeeder");

class FakeDataGenerator{

    public static function generateData()
    {
        self::callAllSeeders();
    }

    private static function callAllSeeders()
    {
        //self::callSeeder(CTG_SD);
        //self::callSeeder(ING_SD);
        //self::callSeeder(TAG_SD);
        //self::callSeeder(MEL_SD);
        //self::callSeeder(LNG_SD);
    }

    private static function callSeeder($class)
    {
        $seeder = new $class;
        $seeder->run();
    }

}