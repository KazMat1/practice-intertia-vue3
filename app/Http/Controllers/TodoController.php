<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Inertia\Response;

use App\Models\Todo;
use App\Http\Requests\StoreTodoRequest;

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

    public function store(Todo $todo, StoreTodoRequest $request): RedirectResponse
    {
        $result = $todo->fill($request->all())->save();
        if ($result) {
            $status = 'success';
            $message = '登録が完了しました';
        } else {
            $status = 'error';
            $message = '登録に失敗しました。もう一度お試しください';
        }
        $flash_message = ['status' => $status, 'message' => $message];

        return to_route('todos.index')->with($flash_message);
    }

    public function edit(): Response
    {
        return inertia(self::VIEW_DIR . 'Edit', ['message' => 'message from edit method']);
    }

    public function update(): RedirectResponse
    {
        return redirect()->route('todos.store');
    }

    public function destroy(Todo $todo): RedirectResponse
    {
        $result = $todo->delete();
        if ($result) {
            $status = 'success';
            $message = '削除が完了しました';
        } else {
            $status = 'error';
            $message = '削除に失敗しました。もう一度お試しください';
        }
        $flash_message = ['status' => $status, 'message' => $message];

        return to_route('todos.index')->with($flash_message);
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
