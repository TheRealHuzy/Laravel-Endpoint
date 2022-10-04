<?php

namespace Database\Factories;

require_once ('../vendor/autoload.php');
use \Statickidz\GoogleTranslate;

class GoogleTranslateAPI{

    public static function translate($source, $target, $text){
        $translate = new GoogleTranslate();
        return $translate->translate($source, $target, $text);
    }
}