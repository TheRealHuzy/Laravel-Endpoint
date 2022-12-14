<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'title',
        'slug'
    ];

    protected $table = 'tag';

    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
        'pivot'
    ];

    public function languages()
    {
        return $this->belongsToMany(Language::class, 'tagTranslation', 'idTag', 'idLanguage');
    }
}