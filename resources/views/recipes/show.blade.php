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

    <form action="{{ route('recipes.destroy', $recipe) }}" method="POST"
          onsubmit="return confirm('Delete this record?')"
          style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>

    <a href="{{ route('recipes.index') }}" class="btn btn-secondary">Back to Recipes</a>

</div>

@endsection