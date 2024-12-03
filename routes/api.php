<?php

use App\Http\Controllers\Api\TodoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/todo/{id}',[TodoController::class,'index']);
Route::get('/todo', [TodoController::class, 'getTodosQuery']);
Route::post('/todo',[TodoController::class,'store']);
Route::get('/todo/detail/{id}',[TodoController::class,'show']);
Route::put('/todo/{id}',[TodoController::class,'update']);
Route::patch('/todo/status/{id}',[TodoController::class,'changeStatus']);
Route::delete('/todo/{id}',[TodoController::class,'destroy']);