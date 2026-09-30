<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index(Request $request)
    {
        $recipes  = $this->recipes();
        $category = $request->query('category', 'all');
        $cuisine  = $request->query('cuisine', 'all');

        if ($category !== 'all') {
            $recipes = array_filter($recipes, fn ($r) => $r['category'] === $category);
        }

        if ($cuisine !== 'all') {
            $recipes = array_filter($recipes, fn ($r) => $r['cuisine'] === $cuisine);
        }

        // Featured button sends ?featured=popular. Placeholder rule: quick recipes.
        // Replace with your own logic if you have one.
        if ($request->filled('featured')) {
            $recipes = array_filter($recipes, fn ($r) => $r['time'] <= 30);
        }

        return view('recipes.index', [
            'recipes'  => $recipes,
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
        // C1-C4: validation runs first. If a rule fails, Laravel redirects back
        // with errors and old input, and nothing below this runs (C5).
        $validated = $request->validate([
            'name'       => 'required|max:50',
            'category'   => 'required|in:Main Course,Dessert,Appetizer',   // C3
            'cuisine'    => 'required|in:Filipino,Italian,Thai',           // C3
            'time'       => 'required|integer|min:1|max:300',              // C4
            'difficulty' => 'required|in:Easy,Medium,Hard',
            'servings'   => 'required|integer|min:1|max:20',
        ]);

        $recipes = $this->recipes();

        $id = empty($recipes) ? 1 : max(array_keys($recipes)) + 1;

        $recipes[$id] = [
            'id'         => $id,
            'name'       => $validated['name'],
            'category'   => $validated['category'],
            'cuisine'    => $validated['cuisine'],
            'time'       => (int) $validated['time'],
            'difficulty' => $validated['difficulty'],
            'servings'   => (int) $validated['servings'],
        ];

        $this->saveRecipes($recipes);

        // E1 + E2 + E4: redirect to a route name with a one-time flash message
        return redirect()
            ->route('recipes.index')
            ->with('success', 'Recipe added successfully');
    }

    public function show($id)
    {
        $recipes = $this->recipes();

        abort_unless(isset($recipes[$id]), 404);

        return view('recipes.show', ['recipe' => $recipes[$id]]);
    }

    // A2 + A4
    private function recipes()
    {
        return json_decode(file_get_contents(storage_path('app/recipes.json')), true);
    }

    // A3 + A4
    private function saveRecipes(array $recipes)
    {
        file_put_contents(
            storage_path('app/recipes.json'),
            json_encode($recipes, JSON_PRETTY_PRINT)
        );
    }
}