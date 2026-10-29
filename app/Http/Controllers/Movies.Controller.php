<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    private function getAllMovies()
    {
        $path = storage_path('app/movies.json');

        if (!file_exists($path)) {
            return [];
        }

        $json = file_get_contents($path);

        return json_decode($json, true) ?? [];
    }

    private function saveMovies($movies)
    {
        $path = storage_path('app/movies.json');

        file_put_contents(
            $path,
            json_encode($movies, JSON_PRETTY_PRINT)
        );
    }

    public function index(Request $request)
    {
        $genre = $request->query('genre', '');
        $search = $request->query('search', '');

        $movies = $this->getAllMovies();

        if ($genre !== '') {
            $movies = array_filter($movies, function ($movie) use ($genre) {
                return strcasecmp($movie['genre'], $genre) === 0;
            });
        }

        if ($search !== '') {
            $movies = array_filter($movies, function ($movie) use ($search) {
                return stripos($movie['title'], $search) !== false;
            });
        }

        return view('movies.index', [
            'movies' => $movies,
            'genre' => $genre,
            'search' => $search
        ]);
    }

    public function create()
    {
        return view('movies.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:100',
            'director' => 'required|max:100',
            'genre' => 'required|in:Sci-Fi,Action,Crime',
            'year' => 'required|numeric|min:1900|max:2026',
        ]);

        $movies = $this->getAllMovies();

        $newId = empty($movies)
            ? 1
            : max(array_column($movies, 'id')) + 1;

        $movies[$newId] = [
            'id' => $newId,
            'title' => $validated['title'],
            'director' => $validated['director'],
            'genre' => $validated['genre'],
            'year' => $validated['year'],
        ];

        $this->saveMovies($movies);

        return redirect()
            ->route('movies.index')
            ->with('success', 'Movie added successfully!');
    }

    public function show($id)
    {
        $movies = $this->getAllMovies();

        if (!isset($movies[$id])) {
            abort(404);
        }

        $movie = $movies[$id];

        return view('movies.show', compact('movie'));
    }

    public function featured()
    {
        $movies = $this->getAllMovies();

        $featured = array_filter($movies, function ($movie) {
            return $movie['year'] >= 2020;
        });

        return view('movies.index', [
            'movies' => $featured,
            'genre' => '',
            'search' => ''
        ]);
    }
}