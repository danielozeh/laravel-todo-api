<?php

use App\Library\Master;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/', function() {
    return Master::successResponse('Welcome to '.config('app.name').' API');
});


Route::prefix('v1')->group(base_path('routes/api_v1.php'));
