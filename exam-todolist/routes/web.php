<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\TodoController;


Route::get('/', [TodoController::class, 'index'])->name('home');


Route::get('todos/create', [TodoController::class, 'create'])->name('todos.create');

Route::post('todos/store', [TodoController::class, 'store'])->name('todos.store');

Route::get('todos/{item}/edit', [TodoController::class, 'edit'])->name('todos.edit');
Route::post('todos/{item}/update', [TodoController::class, 'update'])->name('todos.update');

Route::post('todos/{item}/status', [TodoController::class, 'status'])->name('todos.status');
Route::get('todos/{item}/delete', [TodoController::class, 'delete'])->name('todos.delete');