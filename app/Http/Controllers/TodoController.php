<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Inertia\Response;

use App\Models\Todo;
use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Http\Helpers\SessionHelper;

class TodoController extends Controller
{
    private const VIEW_DIR = "Todos/";

    public function index(): Response
    {
        $todos = Todo::all();
        return inertia(self::VIEW_DIR . 'Index', compact('todos'));
    }

    public function create(): Response
    {
        return inertia(self::VIEW_DIR . 'Create');
    }

    public function store(Todo $todo, StoreTodoRequest $request, SessionHelper $session_helper): RedirectResponse
    {
        $result = $todo->fill($request->all())->save();
        $level = $result ? 'success' : 'error';
        $flash_msg = $session_helper->getFlashMsg($level, '登録');

        return to_route('todos.index')->with($flash_msg);
    }

    public function edit(Todo $todo): Response
    {
        return inertia(self::VIEW_DIR . 'Edit', compact('todo'));
    }

    public function update(Todo $todo, UpdateTodoRequest $request, SessionHelper $session_helper): RedirectResponse
    {
        $result = $todo->fill($request->all())->save();
        $level = $result ? 'success' : 'error';
        $flash_msg = $session_helper->getFlashMsg($level, '更新');

        return to_route('todos.index')->with($flash_msg);
    }

    public function destroy(Todo $todo, SessionHelper $session_helper): RedirectResponse
    {
        $result = $todo->delete();
        $level = $result ? 'success' : 'error';
        $flash_msg = $session_helper->getFlashMsg($level, '削除');

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
