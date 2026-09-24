@extends('layouts.app')

@section('title', 'Featured Recipe')

@section('content')
    <h2>Featured Recipe</h2>

    <table>
        <tr>
            <th>ID</th>
            <td>{{ $recipe['id'] }}</td>
        </tr>
        <tr>
            <th>Name</th>
            <td>{{ $recipe['name'] }}</td>
        </tr>
        <tr>
            <th>Category</th>
            <td>{{ $recipe['category'] }}</td>
        </tr>
        <tr>
            <th>Difficulty</th>
            <td>{{ $recipe['difficulty'] }}</td>
        </tr>
        <tr>
            <th>Cook Time</th>
            <td>{{ $recipe['cook_time'] }}</td>
        </tr>
    </table>

    <p>
        <a href="{{ route('recipes.index') }}" class="btn btn-secondary btn-sm">Back to List</a>
    </p>
@endsection