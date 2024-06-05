<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Http\Requests\StoreTodoRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateTodoRequest;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $todoList = Todo::all();
        return view("todos.index", ["todoLists" => $todoList]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newTodo = $request->validate([
            "name" => "required|max:255|string",
            "completed" => "string",

        ]);
        $newTodo['completed'] = $request->completed ?? 0;
        Todo::create($newTodo);
        return redirect()->route('todos.index')->with("message", "Todo List create successful");
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        return view('todos.edit', ['todo' => $todo]);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {
        $updateTodo = $request->validate([
            "name" => "required|max:255|string",
            "completed" => "string",

        ]);
        $todo->update($updateTodo);
        return redirect()->route('todos.index')->with("message", "Todo List create successful");
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->route('todos.index')->with("message", "user delete successfully");
        //
    }
}
