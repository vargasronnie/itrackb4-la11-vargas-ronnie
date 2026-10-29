@extends('layouts.app')

@section('title', 'Recipes')

@section('content')

<div class="container mt-4">

    <h1>Recipes</h1>

    <a href="{{ route('recipes.create') }}" class="btn btn-success mb-3">+ Add Recipe</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Cuisine</th>
                <th>Time (minutes)</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($recipes as $recipe)
                <tr>
                    <td>{{ $recipe->id }}</td>
                    <td>
                        <a href="{{ route('recipes.show', $recipe) }}">{{ $recipe->name }}</a>
                    </td>
                    <td>{{ $recipe->cuisine->name }}</td>
                    <td>{{ $recipe->time }}</td>
                    <td>
                        <a href="{{ route('recipes.edit', $recipe) }}" class="btn btn-primary btn-sm">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="text-center mt-5 mb-3">
        <p>Prepared by: <strong>Ronnie Vargas</strong></p>
    </div>

</div>

@endsection