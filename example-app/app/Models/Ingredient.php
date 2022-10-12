<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $fillable = [
        'title',
        'slug'
    ];

    protected $table = 'ingredient';

    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
        'pivot'
    ];

    public function languages()
    {
        return $this->belongsToMany(Language::class, 'ingredientTranslation', 'idIngredient', 'idLanguage');
    }
}