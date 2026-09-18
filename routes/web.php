<?php

use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/recipes/featured', [RecipeController::class, 'featured'])
    ->name('recipes.featured');
    
Route::get('/recipes/filter/{category?}', [RecipeController::class, 'filter'])
    ->name('recipes.filter');

Route::resource('recipes', RecipeController::class)
    ->only(['index', 'show']);

