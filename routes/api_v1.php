<?php

use App\Library\Master;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', function() {
    return Master::successResponse('Welcome to '.config('app.name').' API v1');
});

Route::group(['prefix' => 'todos'], function() {
    Route::post('/', [TodoController::class, 'createTodo']);
    Route::put('/{id}', [TodoController::class, 'updateTodo']);
    Route::delete('/{id}', [TodoController::class, 'deleteTodo']);
    Route::get('/{id}', [TodoController::class, 'getTodo']);
    Route::get('/', [TodoController::class, 'getTodos']);
});
