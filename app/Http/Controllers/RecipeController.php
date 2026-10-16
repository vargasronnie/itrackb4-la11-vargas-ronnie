<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->query('category', 'all');
        $cuisine  = $request->query('cuisine', 'all');

        $query = Recipe::query();

        if ($category !== 'all') {
            $query->where('category', $category);
        }

        if ($cuisine !== 'all') {
            $query->where('cuisine', $cuisine);
        }

        // Featured button sends ?featured=popular. Placeholder rule: quick recipes.
        if ($request->filled('featured')) {
            $query->where('time', '<=', 30);
        }

        return view('recipes.index', [
            'recipes'  => $query->get(),
            'category' => $category,
            'cuisine'  => $cuisine,
        ]);
    }

    public function create()
    {
        return view('recipes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'       => 'required|max:50',
            'category'   => 'required|in:Main Course,Dessert,Appetizer',
            'cuisine'    => 'required|in:Filipino,Italian,Thai',
            'time'       => 'required|integer|min:1|max:300',
            'difficulty' => 'required|in:Easy,Medium,Hard',
            'servings'   => 'required|integer|min:1|max:20',
        ]);

        Recipe::create($validated);

        return redirect()
            ->route('recipes.index')
            ->with('success', 'Recipe added successfully');
    }

    public function show($id)
    {
        $recipe = Recipe::findOrFail($id);

        return view('recipes.show', ['recipe' => $recipe]);
    }
}