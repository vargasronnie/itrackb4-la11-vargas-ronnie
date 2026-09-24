<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource with two query string filters
     * Part A: Two Filters
     * Part B: Links That Remember
     */
    public function index(Request $request)
    {
        // A1: Request object injected with correct use statement
        // A2: Two values read from query string with sensible defaults
        $category = $request->query('category', 'all');
        $cuisine = $request->query('cuisine', 'all');

        // Get all recipes
        $all = $this->recipes();

        // A3: Each filter works on its own
        // First filter by category
        if ($category === 'all') {
            $recipes = $all;
        } else {
            $recipes = [];
            foreach ($all as $id => $recipe) {
                if (strtolower($recipe['category']) === strtolower($category)) {
                    $recipes[$id] = $recipe;
                }
            }
        }

        // A4: Both filters work together, narrowing the list further
        if ($cuisine !== 'all') {
            $filtered = [];
            foreach ($recipes as $id => $recipe) {
                if (strtolower($recipe['cuisine']) === strtolower($cuisine)) {
                    $filtered[$id] = $recipe;
                }
            }
            $recipes = $filtered;
        }

        // A5: With neither filter, the full list appears
        // A6: No new route is added — all URLs use the existing index route
        return view('recipes.index', [
            'recipes'  => $recipes,
            'category' => $category,
            'cuisine'  => $cuisine,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('recipes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Incomplete - to be implemented in Week 7
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $all = $this->recipes();
        
        if (!isset($all[$id])) {
            return response('Recipe not found', 404);
        }

        $recipe = $all[$id];

        return view('recipes.show', [
            'recipe' => $recipe,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Incomplete - to be implemented
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Incomplete - to be implemented in Week 10
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Incomplete - to be implemented
    }

    /**
     * Sample recipes data
     */
    private function recipes()
    {
        return [
            1 => [
                'id'       => 1,
                'name'     => 'Spaghetti Carbonara',
                'category' => 'Main Course',
                'cuisine'  => 'Italian',
                'time'     => '20 mins',
                'servings' => '4',
                'difficulty' => 'Medium',
            ],
            2 => [
                'id'       => 2,
                'name'     => 'Adobo',
                'category' => 'Main Course',
                'cuisine'  => 'Filipino',
                'time'     => '45 mins',
                'servings' => '6',
                'difficulty' => 'Easy',
            ],
            3 => [
                'id'       => 3,
                'name'     => 'Chocolate Cake',
                'category' => 'Dessert',
                'cuisine'  => 'Italian',
                'time'     => '60 mins',
                'servings' => '8',
                'difficulty' => 'Medium',
            ],
            4 => [
                'id'       => 4,
                'name'     => 'Pad Thai',
                'category' => 'Main Course',
                'cuisine'  => 'Thai',
                'time'     => '30 mins',
                'servings' => '4',
                'difficulty' => 'Medium',
            ],
            5 => [
                'id'       => 5,
                'name'     => 'Tiramisu',
                'category' => 'Dessert',
                'cuisine'  => 'Italian',
                'time'     => '15 mins',
                'servings' => '6',
                'difficulty' => 'Easy',
            ],
            6 => [
                'id'       => 6,
                'name'     => 'Fried Lumpia',
                'category' => 'Appetizer',
                'cuisine'  => 'Filipino',
                'time'     => '25 mins',
                'servings' => '12',
                'difficulty' => 'Medium',
            ],
            7 => [
                'id'       => 7,
                'name'     => 'Bruschetta',
                'category' => 'Appetizer',
                'cuisine'  => 'Italian',
                'time'     => '15 mins',
                'servings' => '6',
                'difficulty' => 'Easy',
            ],
            8 => [
                'id'       => 8,
                'name'     => 'Green Papaya Salad',
                'category' => 'Appetizer',
                'cuisine'  => 'Thai',
                'time'     => '20 mins',
                'servings' => '4',
                'difficulty' => 'Medium',
            ],
            9 => [
                'id'       => 9,
                'name'     => 'Mango Float',
                'category' => 'Dessert',
                'cuisine'  => 'Filipino',
                'time'     => '20 mins',
                'servings' => '10',
                'difficulty' => 'Easy',
            ],
            10 => [
                'id'       => 10,
                'name'     => 'Tom Yum Soup',
                'category' => 'Main Course',
                'cuisine'  => 'Thai',
                'time'     => '35 mins',
                'servings' => '4',
                'difficulty' => 'Medium',
            ],
        ];
    }
}