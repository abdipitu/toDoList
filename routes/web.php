<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', [TaskController::class, 'index'])->name('dashboard')->middleware(['auth', 'verified']);
Route::get('/home', [TaskController::class, 'home'])->name('home');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::post('/title', [TaskController::class, 'storeTitle'])->name('tasks.title');
Route::patch('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');



Route::get('/history', [HistoryController::class, 'index'])->name('history');
Route::get('/destroy/{id}', [TaskController::class, 'destroye'])->name('destroy');



Route::get('/today', [TodoController::class, 'index'])->name('today');
Route::get('/project/{id}', [TodoController::class, 'detailproject'])->name('detailproject');
Route::post('/todos', [TodoController::class, 'store'])->name('todos.store');
Route::patch('/todos/{todo}', [TodoController::class, 'update'])->name('todos.update');

require __DIR__.'/auth.php';
