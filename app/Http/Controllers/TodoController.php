<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

use App\Models\Todo;

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
        return Inertia::render(self::VIEW_DIR . 'Create', ['message' => 'message from create method']);
    }

    public function store(): RedirectResponse
    {
        return redirect()->route('todos.create');
    }

    public function edit(): Response
    {
        return Inertia::render(self::VIEW_DIR . 'Edit', ['message' => 'message from edit method']);
    }

    public function update(): RedirectResponse
    {
        return redirect()->route('todos.store');
    }

    public function destroy(): RedirectResponse
    {
        return redirect()->route('todos.index');
    }
}
