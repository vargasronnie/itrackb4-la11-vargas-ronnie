<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Recipe extends Model
{
    protected $fillable = [
        'name',
        'category',
        'cuisine_id',
        'time',
        'difficulty',
        'servings',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'time' => 'integer',
            'servings' => 'integer',
        ];
    }

    public function cuisine(): BelongsTo
    {
        return $this->belongsTo(Cuisine::class);
    }
}
