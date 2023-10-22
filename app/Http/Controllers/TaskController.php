<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class TaskController extends Controller
{
    private const VIEW_DIR = "Task/";

    public function index(): Response
    {
        return Inertia::render(self::VIEW_DIR . 'Index', ['message' => 'message from index method']);
    }

    public function create(): Response
    {
        return Inertia::render(self::VIEW_DIR . 'Create', ['message' => 'message from create method']);
    }

    public function store(): RedirectResponse
    {
        return redirect()->route('tasks.create');
    }

    public function edit(): Response
    {
        return Inertia::render(self::VIEW_DIR . 'Edit', ['message' => 'message from edit method']);
    }

    public function update(): RedirectResponse
    {
        return redirect()->route('tasks.store');
    }

    public function destroy(): RedirectResponse
    {
        return redirect()->route('tasks.index');
    }
}
