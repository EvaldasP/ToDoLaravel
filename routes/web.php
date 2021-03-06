<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::get('/home', [TaskController::class, 'index'])->name('tasks');
Route::get('/', [TaskController::class, 'index'])->name('tasks');
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks');
Route::post('/tasks', [TaskController::class, 'store']);
Route::delete('/tasks{id}', [TaskController::class, 'destroy'])->name('task.destroy');

Route::post('/tasks{id}', [TaskController::class, 'complete'])->name('task.complete');
Route::get('/tasks{id}', [TaskController::class, 'show'])->name('task.show');
Route::put('/tasks{id}', [TaskController::class, 'update'])->name('task.update');
