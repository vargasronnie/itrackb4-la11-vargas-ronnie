@extends('layouts.app')

@section('title', $recipe['name'] . ' - Details')

@section('content')
<div class="container mt-4">
    <h1>Recipe Flex</h1>
    <p>Prepared by: Ronnie Vargas</p>

    <div class="mb-4">
        <a href="{{ route('recipes.index') }}" class="btn btn-primary">All Recipes</a>
        <a href="{{ route('recipes.index', ['featured' => 'popular']) }}" class="btn btn-outline-primary">Featured Recipe</a>
    </div>

    <h2>Recipe Details</h2>

    <div class="card" style="max-width: 400px;">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">Title: {{ $recipe['name'] }}</h5>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Category: {{ $recipe['category'] }}</li>
            <li class="list-group-item">Cuisine: {{ $recipe['cuisine'] }}</li>
            <li class="list-group-item">Time: {{ $recipe['time'] }}</li>
            <li class="list-group-item">Servings: {{ $recipe['servings'] }}</li>
            <li class="list-group-item">Difficulty: {{ $recipe['difficulty'] }}</li>
        </ul>
    </div>
</div>
@endsection