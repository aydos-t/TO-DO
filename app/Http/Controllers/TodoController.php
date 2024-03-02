<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('todos.index', ['todos' => $todos]);
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(TodoRequest $request)
    {
        Todo::create([
            'title' => $request->title,
            'description' => $request->description,
            'is_completed' => 0
        ]);

        $request->session()->flash('alert-success', 'СПИСОК ЗАДАЧ СОЗДАНА УСПЕШНО!');
        return to_route('todos.index');
    }

    public function show($id)
    {
        $todo = Todo ::find($id);
            if (! $todo) {
                request()->session()->flash('error', 'Не получается вывести подробные данные данной задачи.');
                return to_route('todos.index') -> withErrors([
                    'error' => 'Не получается вывести подробные данные данной задачи.'
                ]);
            }
            return view('todos.show', ['todo' => $todo]);
    }
}
