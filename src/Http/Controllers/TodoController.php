<?php

namespace Sait\Todo\Http\Controllers;
use Illuminate\Routing\Controller; // Add this line
use Sait\Todo\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('todo::index', compact('todos'));
    }

    public function create()
    {
        return view('todo::create');
    }

    public function store(Request $request)
    {
        Todo::create($request->validate([
            'title' => 'required',
            'description' => 'nullable'
        ]));

        return redirect()->route('todo.index');
    }

    public function edit(Todo $todo)
    {
        return view('todo::edit', compact('todo'));
    }

    public function update(Request $request, Todo $todo)
    {
        $todo->update($request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'completed' => 'boolean'
        ]));

        return redirect()->route('todo.index');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->route('todo.index');
    }
}