<?php

namespace App\Http\Controllers;

use App\Models\Cuisine;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index(Request $request)
    {
        $cuisineId = $request->query('cuisine_id');

        $query = Recipe::with('cuisine');

        if ($cuisineId) {
            $query = $query->where('cuisine_id', $cuisineId);
        }

        $recipes = $query->get();

        return view('recipes.index', compact('recipes'));
    }

    public function create()
    {
        $cuisines = Cuisine::all();

        return view('recipes.create', compact('cuisines'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'time' => 'required',
            'cuisine_id' => 'required|exists:cuisines,id',
        ]);

        Recipe::create($validated);

        return redirect()->route('recipes.index');
    }

    public function show(Recipe $recipe)
    {
        return view('recipes.show', compact('recipe'));
    }

    public function edit(Recipe $recipe)
    {
        $cuisines = Cuisine::all();

        return view('recipes.edit', compact('recipe', 'cuisines'));
    }

    public function update(Request $request, Recipe $recipe)
    {
        $validated = $request->validate([
            'name' => 'required',
            'time' => 'required',
            'cuisine_id' => 'required|exists:cuisines,id',
        ]);

        $recipe->update($validated);

        return redirect()->route('recipes.index');
    }

    public function destroy(Recipe $recipe)
    {
        $recipe->delete();

        return redirect()->route('recipes.index');
    }

    public function featured()
    {
        //
    }

    public function filter($cuisine)
    {
        //
    }
}