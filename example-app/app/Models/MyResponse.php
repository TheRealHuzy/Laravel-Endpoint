<?php

namespace App\Models;
use Database\Seeders\DatabaseCommunicationGet as DBCG;

class MyResponse
{
    public $id, $title, $description, $category;
    public $tags = array(), $ingredients = array();

    public function __constructor($title, $description, $category, $tags, $ingredients)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->category = $category;
        $this->tags = $tags;
        $this->ingredients = $ingredients;
    }
}