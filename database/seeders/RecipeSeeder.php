<?php

namespace Database\Seeders;

use App\Models\Recipe;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
   public function run(): void
    {
        Recipe::create(['name' => 'Chicken Adobo', 'category' => 'Main Course', 'cuisine' => 'Filipino', 'time' => 60, 'difficulty' => 'Easy', 'servings' => 4, 'notes' => null]);
        Recipe::create(['name' => 'Leche Flan', 'category' => 'Dessert', 'cuisine' => 'Filipino', 'time' => 90, 'difficulty' => 'Medium', 'servings' => 8, 'notes' => null]);
        Recipe::create(['name' => 'Spaghetti Carbonara', 'category' => 'Main Course', 'cuisine' => 'Italian', 'time' => 30, 'difficulty' => 'Medium', 'servings' => 4, 'notes' => null]);
        Recipe::create(['name' => 'Tiramisu', 'category' => 'Dessert', 'cuisine' => 'Italian', 'time' => 40, 'difficulty' => 'Hard', 'servings' => 6, 'notes' => null]);
        Recipe::create(['name' => 'Pad Thai', 'category' => 'Main Course', 'cuisine' => 'Thai', 'time' => 35, 'difficulty' => 'Medium', 'servings' => 2, 'notes' => null]);
    }
}