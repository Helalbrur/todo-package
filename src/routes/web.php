<?php

use Illuminate\Support\Facades\Route;
use Sait\Todo\Http\Controllers\TodoController;

Route::middleware(['web'])->group(function () {
    Route::resource('todo', TodoController::class)->names([
        'index' => 'todo.index',
        'create' => 'todo.create',
        'store' => 'todo.store',
        'edit' => 'todo.edit',
        'update' => 'todo.update',
        'destroy' => 'todo.destroy'
    ]);
});