<?php

namespace App\Http\Core;

use App\Helper\Paginator;
use App\Library\Master;
use App\Models\Todo;

class TodoService
{
    public static function createTodo($request)
    {
        $todo = Todo::create($request->all());
        if($todo) {
            return Master::successResponse('Todo created successfully', $todo, 201);
        }
        return Master::failureResponse('Todo creation failed', null, 400);
    }

    public static function updateTodo($request, $id)
    {
        $todo = Todo::find($id);
        if($todo) {
            $todo->update($request->all());
            return Master::successResponse('Todo updated successfully', $todo);
        }
        return Master::failureResponse('Todo not found', null, 404);
    }

    public static function deleteTodo($id)
    {
        $todo = Todo::find($id);
        if($todo) {
            $todo->delete();
            return Master::successResponse('Todo deleted successfully');
        }
        return Master::failureResponse('Todo not found', null, 404);
    }

    public static function getTodo($id)
    {
        $todo = Todo::find($id);
        if($todo) {
            return Master::successResponse('Todo retrieved successfully', $todo);
        }
        return Master::failureResponse('Todo not found', null, 404);
    }

    public static function getTodos($request)
    {
        $page = $request->page ?? 1;
        $perPage = $request->limit ?? 25;
        $sortBy = $request->sortBy ?? 'created_at';
        $sortOrder = $request->sortOrder ?? 'desc';

        $query = Todo::query();

        if($request->start_date) {
            $query->where('created_at', '>=', $request->start_date);
        }
        if($request->end_date) {
            $query->where('created_at', '<=', $request->end_date);
        }
        
        $todos = Paginator::paginate($query->orderBy($sortBy, $sortOrder), $page, $perPage, [
            'sortBy' => $sortBy,
            'sortOrder' => $sortOrder,
        ]);
        return Master::successResponse('Todos retrieved successfully', $todos);
    }
}
