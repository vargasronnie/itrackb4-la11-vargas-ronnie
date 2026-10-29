<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilterController extends Controller
{
    private function getAllMovies()
    {
        return [
            1 => [
                'id' => 1,
                'title' => 'The House of Us',
                'genre' => 'Romance / Drama',
            ],
            2 => [
                'id' => 2,
                'title' => 'Hello, Love, Again',
                'genre' => 'Romance',
            ],
            3 => [
                'id' => 3,
                'title' => 'Avengers: The Way Home',
                'genre' => 'Action',
            ],
            4 => [
                'id' => 4,
                'title' => 'Barbie',
                'genre' => 'Comedy / Self-help',
            ],
            5 => [
                'id' => 5,
                'title' => 'Four Sisters and a Wedding',
                'genre' => 'Drama',
            ],
            6 => [
                'id' => 6,
                'title' => 'Everything Everywhere All at Once',
                'genre' => 'Sci-Fi',
            ],
            7 => [
                'id' => 7,
                'title' => 'Crazy Rich Asians',
                'genre' => 'Romance',
            ],
        ];
    }

    public function index(Request $request)
    {
        $movies = $this->getAllMovies();

        $genre = $request->query('genre', '');
        $title = $request->query('title', '');

        if ($genre !== '') {
            $movies = array_filter($movies, function ($movie) use ($genre) {
                return stripos($movie['genre'], $genre) !== false;
            });
        }

        if ($title !== '') {
            $movies = array_filter($movies, function ($movie) use ($title) {
                return stripos($movie['title'], $title) !== false;
            });
        }

        return view('movies.index', [
            'movies' => $movies,
            'genre' => $genre,
            'title' => $title,
        ]);
    }

    public function show($id)
    {
        $movies = $this->getAllMovies();

        abort_if(!isset($movies[$id]), 404);

        return view('movies.show', [
            'movie' => $movies[$id],
        ]);
    }
}