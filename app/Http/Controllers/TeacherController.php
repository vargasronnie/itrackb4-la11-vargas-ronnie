<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    private function teachers()
    {
        return [
            1 => ['id' => 1, 'name' => 'Prof. Reyes', 'department' => 'CICT', 'subject' => 'Web Programming'],
            2 => ['id' => 2, 'name' => 'Prof. Santos', 'department' => 'CICT', 'subject' => 'Database Systems'],
            3 => ['id' => 3, 'name' => 'Prof. Cruz', 'department' => 'CAS', 'subject' => 'Mathematics'],
        ];
    }

    public function index()
    {
        return view('teachers.index', ['teachers' => $this->teachers()]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        $teachers = $this->teachers();

        if (! isset($teachers[$id])) {
            abort(404);
        }

        return view('teachers.show', ['teacher' => $teachers[$id]]);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
        public function featured()
    {
        $teachers = $this->teachers();

        return view('teachers.show', ['teacher' => $teachers[1]]);
    }
}