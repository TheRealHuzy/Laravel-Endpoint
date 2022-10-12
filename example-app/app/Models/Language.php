<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = [
        'name',
        'slug'
    ];

    protected $table = 'language';

    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
        'pivot'
    ];

    protected $primaryKey = 'slug';
}
