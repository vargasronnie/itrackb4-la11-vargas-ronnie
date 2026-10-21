<?php

namespace Database\Seeders;

use App\Models\Cuisine;
use App\Models\Recipe;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    public function run(): void
    {
        $filipino = Cuisine::create(['name' => 'Filipino']);
        $italian  = Cuisine::create(['name' => 'Italian']);
        $thai     = Cuisine::create(['name' => 'Thai']);

        Recipe::create(['name' => 'Chicken Adobo', 'category' => 'Main Course', 'cuisine_id' => $filipino->id, 'time' => 60, 'difficulty' => 'Easy', 'servings' => 4, 'notes' => null]);
        Recipe::create(['name' => 'Leche Flan', 'category' => 'Dessert', 'cuisine_id' => $filipino->id, 'time' => 90, 'difficulty' => 'Medium', 'servings' => 8, 'notes' => null]);
        Recipe::create(['name' => 'Spaghetti Carbonara', 'category' => 'Main Course', 'cuisine_id' => $italian->id, 'time' => 30, 'difficulty' => 'Medium', 'servings' => 4, 'notes' => null]);
        Recipe::create(['name' => 'Tiramisu', 'category' => 'Dessert', 'cuisine_id' => $italian->id, 'time' => 40, 'difficulty' => 'Hard', 'servings' => 6, 'notes' => null]);
        Recipe::create(['name' => 'Pad Thai', 'category' => 'Main Course', 'cuisine_id' => $thai->id, 'time' => 35, 'difficulty' => 'Medium', 'servings' => 2, 'notes' => null]);
    }
}