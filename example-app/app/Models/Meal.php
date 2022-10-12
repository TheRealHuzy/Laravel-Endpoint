<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    protected $fillable = [
        'title',
        'description'
    ];

    protected $table = 'meal';

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tags', 'idMeal', 'idTag');
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'ingredients', 'idMeal', 'idIngredient');
    }

    public function languages()
    {
        return $this->belongsToMany(Language::class, 'mealTranslation', 'idMeal', 'idLanguage');
    }
/*
    public function category()
    {
        return $this->belongsTo(Category::class, 'category', 'idCategory', 'id');
    }*/
}