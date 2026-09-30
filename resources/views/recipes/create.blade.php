@extends('layouts.app')

@section('title', 'Add Recipe')

@section('content')
<div class="container mt-4">
    <h1>Recipe Flex</h1>
    <p>Prepared by: Ronnie Vargas</p>

    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Add Recipe</h3>

            <form method="POST" action="{{ route('recipes.store') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select name="category" class="form-select">
                        <option value="">Select category</option>
                        @foreach (['Main Course', 'Dessert', 'Appetizer'] as $c)
                            <option value="{{ $c }}" @selected(old('category') == $c)>{{ $c }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Cuisine</label>
                    <select name="cuisine" class="form-select">
                        <option value="">Select cuisine</option>
                        @foreach (['Filipino', 'Italian', 'Thai'] as $c)
                            <option value="{{ $c }}" @selected(old('cuisine') == $c)>{{ $c }}</option>
                        @endforeach
                    </select>
                    @error('cuisine')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Time (minutes)</label>
                    <input type="number" name="time" class="form-control" value="{{ old('time') }}">
                    @error('time')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Difficulty</label>
                    <select name="difficulty" class="form-select">
                        <option value="">Select difficulty</option>
                        @foreach (['Easy', 'Medium', 'Hard'] as $d)
                            <option value="{{ $d }}" @selected(old('difficulty') == $d)>{{ $d }}</option>
                        @endforeach
                    </select>
                    @error('difficulty')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Servings</label>
                    <input type="number" name="servings" class="form-control" value="{{ old('servings') }}">
                    @error('servings')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('recipes.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection