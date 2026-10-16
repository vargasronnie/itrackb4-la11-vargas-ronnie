<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = [
        'title',
        'category',
        'cooking_time',
        'is_vegetarian',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'is_vegetarian' => 'boolean',
            'cooking_time' => 'integer',
        ];
    }
}