<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

use App\Models\Todo;
use App\Http\Requests\StoreTodoRequest;

class TodoController extends Controller
{
    private const VIEW_DIR = "Todos/";

    public function index(): Response
    {
        $todos = Todo::all();
        return Inertia::render(self::VIEW_DIR . 'Index', compact('todos'));
    }

    public function create(): Response
    {
        return Inertia::render(self::VIEW_DIR . 'Create');
    }

    public function store(StoreTodoRequest $request): RedirectResponse
    {
        // dd($request);
        Todo::create($request->all());

        return to_route('todos.index')->with('message', '追加しました');
    }

    public function edit(): Response
    {
        return Inertia::render(self::VIEW_DIR . 'Edit', ['message' => 'message from edit method']);
    }

    public function update(): RedirectResponse
    {
        return redirect()->route('todos.store');
    }

    public function destroy(Todo $todo): RedirectResponse
    {
        $result = $todo->delete();
        $message = $result ? '削除しました' : '削除できませんでした。もう一度お試しください';
        return to_route('todos.index')->with('message', $message);
    }
    // public function search(string $query): Response
    // {
    //     $todos = Todo::where('title', 'like', '%'.$query.'%')->get();

    //     return Inertia::render(self::VIEW_DIR . 'Index', compact('todos'));
    // }
}
