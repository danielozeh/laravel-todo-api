<?php

namespace App\Http\Controllers;

use App\Http\Core\TodoService;
use App\Http\Requests\CreateTodo;
use App\Http\Requests\UpdateTodo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function createTodo(CreateTodo $request)
    {
        return TodoService::createTodo($request);
    }

    public function updateTodo(UpdateTodo $request, $id)
    {
        return TodoService::updateTodo($request, $id);
    }

    public function deleteTodo($id)
    {
        return TodoService::deleteTodo($id);
    }

    public function getTodo($id)
    {
        return TodoService::getTodo($id);
    }

    public function getTodos(Request $request)
    {
        return TodoService::getTodos($request);
    }
}
