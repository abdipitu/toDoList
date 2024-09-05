<?php

use App\Http\Controllers\HistoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
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
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::post('/title', [TaskController::class, 'storeTitle'])->name('tasks.title');
Route::patch('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');



Route::get('/history', [HistoryController::class, 'index'])->name('history');
Route::get('/destroy/{id}', [TaskController::class, 'destroye'])->name('destroy');

require __DIR__.'/auth.php';
