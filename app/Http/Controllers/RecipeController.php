<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecipeController extends Controller
{
    private function recipes()
    {
        return [
            1 => ['id' => 1, 'name' => 'Adobo', 'category' => 'Main Dish', 'cook_time' => '45 mins'],
            2 => ['id' => 2, 'name' => 'Sinigang', 'category' => 'Soup', 'cook_time' => '40 mins'],
            3 => ['id' => 3, 'name' => 'Leche Flan', 'category' => 'Dessert', 'cook_time' => '60 mins'],
        ];
    }

    public function index()
    {
        return view('recipes.index', ['recipes' => $this->recipes()]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        $recipes = $this->recipes();

        if (!isset($recipes[$id])) {
            abort(404);
        }

        return view('recipes.show', ['recipe' => $recipes[$id]]);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }

    public function featured()
    {
        $recipes = $this->recipes();

        return view('recipes.show', ['recipe' => $recipes[2]]);
    }
    public function filter($category = null)
{
    $recipes = $this->recipes();

    if ($category) {
        $recipes = array_filter($recipes, fn($r) => $r['category'] === $category);
    }

    return view('recipes.filter', ['recipes' => $recipes, 'category' => $category]);
}
}