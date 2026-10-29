@extends('layouts.app')

@section('title', 'Add Recipe')

@section('content')

<div class="container mt-4">

    <h1>Add Recipe</h1>

    <form action="{{ route('recipes.store') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>

            <input
                type="text"
                name="name"
                id="name"
                value="{{ old('name') }}"
                class="form-control @error('name') is-invalid @enderror"
            >

            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="cuisine_id" class="form-label">Cuisine</label>

            <select
                name="cuisine_id"
                id="cuisine_id"
                class="form-select @error('cuisine_id') is-invalid @enderror"
            >
                <option value="">Select Cuisine</option>

                @foreach ($cuisines as $cuisine)
                    <option value="{{ $cuisine->id }}"
                        @selected(old('cuisine_id') == $cuisine->id)
                    >{{ $cuisine->name }}</option>
                @endforeach
            </select>

            @error('cuisine_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="time" class="form-label">Time (minutes)</label>

            <input
                type="number"
                name="time"
                id="time"
                value="{{ old('time') }}"
                class="form-control @error('time') is-invalid @enderror"
            >

            @error('time')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">+ Add Recipe</button>

        <a href="{{ route('recipes.index') }}" class="btn btn-secondary">Cancel</a>

    </form>

    <div class="text-center mt-5 mb-3">
        <p>Prepared by: <strong>Ronnie Vargas</strong></p>
    </div>

</div>

@endsection