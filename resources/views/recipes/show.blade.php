@extends('layouts.app')

@section('title', $recipe->name)

@section('content')

<div class="container mt-4">

    <h1>{{ $recipe->name }}</h1>

    <table class="table table-bordered">

        <tr>
            <th>ID</th>
            <td>{{ $recipe->id }}</td>
        </tr>

        <tr>
            <th>Name</th>
            <td>{{ $recipe->name }}</td>
        </tr>

        <tr>
            <th>Cuisine</th>
            <td>{{ $recipe->cuisine->name }}</td>
        </tr>

        <tr>
            <th>Time</th>
            <td>{{ $recipe->time }} minutes</td>
        </tr>

    </table>

    <a href="{{ route('recipes.edit', $recipe) }}" class="btn btn-primary">Edit</a>

    <a href="{{ route('recipes.destroy', $recipe) }}" class="btn btn-danger">Delete</a>

    <a href="{{ route('recipes.index') }}" class="btn btn-secondary">Back to Recipes</a>

</div>

@endsection