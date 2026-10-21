@extends('layouts.app')

@section('title', 'Recipe List')

@section('content')
<div class="container mt-4">
    <h1>Recipe Flex</h1>
    <p>Prepared by: Ronnie Vargas</p>

    <div class="mb-4">
        <a href="{{ route('recipes.index') }}"
           class="btn {{ request()->query('category') === null && request()->query('cuisine') === null && request()->query('featured') === null ? 'btn-primary' : 'btn-outline-primary' }}">
            All Recipes
        </a>
        <a href="{{ route('recipes.index', ['featured' => 'popular']) }}"
           class="btn {{ request()->query('featured') !== null ? 'btn-primary' : 'btn-outline-primary' }}">
            Featured Recipe
        </a>
    </div>

    {{-- B6: Add Recipe button, beside the heading (not in the navbar) --}}
    <div class="d-flex justify-content-between align-items-center">
        <h2>My Recipe List</h2>
        <a href="{{ route('recipes.create') }}" class="btn btn-primary">+Add Recipe</a>
    </div>

    <p>
        @if ($category !== 'all' && $cuisine !== 'all')
            Showing {{ $category }} recipes | cuisine #{{ $cuisine }}
        @elseif ($category !== 'all')
            Showing {{ $category }} recipes
        @elseif ($cuisine !== 'all')
            Showing cuisine #{{ $cuisine }}
        @else
            Show all recipes
        @endif
    </p>

    <div class="card card-body mb-4">
        <p class="mb-2">
            <strong>Filter by Category:</strong>
            <a href="{{ route('recipes.index', ['cuisine' => $cuisine]) }}" class="text-decoration-none">All</a> |
            <a href="{{ route('recipes.index', ['category' => 'Main Course', 'cuisine' => $cuisine]) }}" class="text-decoration-none">Main Course</a> |
            <a href="{{ route('recipes.index', ['category' => 'Dessert', 'cuisine' => $cuisine]) }}" class="text-decoration-none">Dessert</a> |
            <a href="{{ route('recipes.index', ['category' => 'Appetizer', 'cuisine' => $cuisine]) }}" class="text-decoration-none">Appetizer</a>
        </p>

        <p class="mb-3">
            <strong>Filter by Cuisine:</strong>
            <a href="{{ route('recipes.index', ['category' => $category]) }}" class="text-decoration-none">All</a> |
            <a href="{{ route('recipes.index', ['category' => $category, 'cuisine' => 1]) }}" class="text-decoration-none">Filipino</a> |
            <a href="{{ route('recipes.index', ['category' => $category, 'cuisine' => 2]) }}" class="text-decoration-none">Italian</a> |
            <a href="{{ route('recipes.index', ['category' => $category, 'cuisine' => 3]) }}" class="text-decoration-none">Thai</a>
        </p>

        <div>
            <a href="{{ route('recipes.index') }}" class="btn btn-danger">Clear All Filters</a>
        </div>
    </div>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Category</th>
                <th>Cuisine</th>
                <th>Time</th>
                <th>Difficulty</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($recipes as $recipe)
                <tr>
                    <td>{{ $recipe['id'] }}</td>
                    <td>
                        <a href="{{ route('recipes.show', $recipe['id']) }}" class="btn btn-outline-primary">
                            {{ $recipe['name'] }}
                        </a>
                    </td>
                    <td>{{ $recipe['category'] }}</td>
                    <td>{{ $recipe->cuisine->name }}</td>
                    <td>{{ $recipe['time'] }}</td>
                    <td>{{ $recipe['difficulty'] }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">No recipes found matching your filters.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- TEMPORARY: remove after screenshot 7 --}}
    <p>Queries: {{ count(\Illuminate\Support\Facades\DB::getQueryLog()) }}</p>
</div>
@endsection