<?php

namespace App\Http\Controllers;

use App\Models\Cuisine;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecipeController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->query('category', 'all');
        $cuisine  = $request->query('cuisine', 'all');

        DB::enableQueryLog(); // TEMPORARY: remove after screenshot 7

        $query = Recipe::query(); // screenshot 6 state: no with() yet

        if ($category !== 'all') {
            $query->where('category', $category);
        }

        if ($cuisine !== 'all') {
            $query->where('cuisine_id', $cuisine);
        }

        // Featured button sends ?featured=popular. Placeholder rule: quick recipes.
        if ($request->filled('featured')) {
            $query->where('time', '<=', 30);
        }

        return view('recipes.index', [
            'recipes'  => $query->get(),
            'cuisines' => Cuisine::all(),
            'category' => $category,
            'cuisine'  => $cuisine,
        ]);
    }

    public function create()
    {
        return view('recipes.create', [
            'cuisines' => Cuisine::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'       => 'required|max:50',
            'category'   => 'required|in:Main Course,Dessert,Appetizer',
            'cuisine_id' => 'required|exists:cuisines,id',
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