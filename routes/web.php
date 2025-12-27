<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\TaskManager;

Route::get('/', [TaskManager::class, 'index'])->name('home');


Route::post('/add', [TaskManager::class, 'addtask'])->name('task.add');
Route::delete('/task/delete/{id}', [TaskManager::class, 'delete'])->name('task.delete');
Route::patch('/task/complete/{id}', [TaskManager::class, 'complete'])->name('task.complete');
