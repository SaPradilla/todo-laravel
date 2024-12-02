<?php

use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/', function () {
        return view('app');
    })->name('app');

    Route::group(['prefix'=> 'todo'], function(){
        Route::get('/', App\Livewire\Todo\TodoList::class)->name('todo');
    });

});
