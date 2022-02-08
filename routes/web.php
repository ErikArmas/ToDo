<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\todosController; 

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

Route::get('/', function () {
    return view('todo.index');
})->name('todos');

Route::get('/todos',[todosController::class,'index'])->name('todos');

Route::post('/todos',[todosController::class,'store'])->name('todos');

Route::get('/todos/{id}',[todosController::class,'show'])->name('todos-show');
Route::patch('/todos/{id}',[todosController::class,'update'])->name('todos-update');
Route::delete('/todos/{id}',[todosController::class,'destroy'])->name('todos-destroy');
