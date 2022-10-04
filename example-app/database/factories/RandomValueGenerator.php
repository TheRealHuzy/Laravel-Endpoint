<?php

namespace Database\Factories;

class RandomValueGenerator{

    public static function randomTrueFalse(){
        return (bool)random_int(0, 1);
    }

    public static function getRandomElement($collection){
        return $collection->random();
    }

    public static function getRandomElementInRange($min, $max){
        $collection = collect([]);
        for(; $min<=$max; $min++){
            $collection->push($min);
        }
        return self::getRandomElement($collection);
    }
}