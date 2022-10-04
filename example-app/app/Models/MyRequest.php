<?php

namespace App\Models;
use Database\Seeders\DatabaseCommunicationGet as DBCG;

class MyRequest 
{
    public $language, $perPage, $page;
    public $category, $tags, $ingredients;
    public $includeCategory, $includeTags, $includeIngredients;

    public function __constructor($language, $perPage, $page, $category, $tags, $ingredients,
        $includeCategory, $includeTags, $includeIngredients)
    {
        $this->language = $language;
        $this->perPage = $perPage;
        $this->page = $page;
        $this->category = $category;
        $this->tags = $tags;
        $this->ingredients = $ingredients;
        $this->includeCategory = $includeCategory;
        $this->includeTags = $includeTags;
        $this->includeIngredients = $includeIngredients;
    }

    public function getResponse()
    {
        return DBCG::getRequestBasedData($this);
    }
}