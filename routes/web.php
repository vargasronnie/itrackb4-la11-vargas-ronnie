<?php

use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;

// Keep this ABOVE the resource, or /recipes/featured is treated as a recipe id
Route::get('/recipes/featured', [RecipeController::class, 'featured'])->name('recipes.featured');

// B1: create and store registered
Route::resource('recipes', RecipeController::class)
    ->only(['index', 'create', 'store', 'show']);