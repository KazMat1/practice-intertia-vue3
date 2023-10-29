<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Inertia\Response;

use App\Models\Todo;
use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Http\Services\SessionService;

class TodoController extends Controller
{
    private const VIEW_DIR = "Todos/";
    private $session_service;

    public function __construct(SessionService $session_service) {
        $this->session_service = $session_service;
    }

    public function index(): Response
    {
        $todos = Todo::all();
        return inertia(self::VIEW_DIR . 'Index', compact('todos'));
    }

    public function create(): Response
    {
        return inertia(self::VIEW_DIR . 'Create');
    }

    public function store(Todo $todo, StoreTodoRequest $request): RedirectResponse
    {
        $result = $todo->fill($request->all())->save();
        $level = $result ? 'success' : 'error';
        $flash_msg = $this->session_service->getFlashMsg($level, '登録');

        return to_route('todos.index')->with($flash_msg);
    }

    public function edit(Todo $todo): Response
    {
        return inertia(self::VIEW_DIR . 'Edit', compact('todo'));
    }

    public function update(Todo $todo, UpdateTodoRequest $request): RedirectResponse
    {
        $result = $todo->fill($request->all())->save();
        $level = $result ? 'success' : 'error';
        $flash_msg = $this->session_service->getFlashMsg($level, '更新');

        return to_route('todos.index')->with($flash_msg);
    }

    public function destroy(Todo $todo): RedirectResponse
    {
        $result = $todo->delete();
        $level = $result ? 'success' : 'error';
        $flash_msg = $this->session_service->getFlashMsg($level, '削除');

        return to_route('todos.index')->with($flash_msg);
    }

    public function search(string $query = ''): Response
    {
        if(!$query) {
            $this->index();
        }
        $todos = Todo::where('title', 'like', '%' . $query . '%')->get();

        return inertia(self::VIEW_DIR . 'Index', compact('todos'));
    }
}
