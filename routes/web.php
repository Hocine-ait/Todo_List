<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/todos', [TodoController::class, 'index'])->name('todo.index');
// Route::get('/todos/create', [TodoController::class, 'create']);
// Route::get('/todos/{todo}/edit', [TodoController::class, 'edit']);
// Route::post('/todos/create', [TodoController::class, 'store']);
// Route::patch('/todos/{todo}/update', [TodoController::class, 'update'])->name('todo.update');
// Route::delete('/todos/{todo}/delete', [TodoController::class, 'delete'])->name('todo.delete');

// Route::middleware('auth')->group(function(){
    Route::resource('/todo', TodoController::class); //->middleware('auth')
    Route::put('/todos/{todo}/confirmed', [TodoController::class, 'confirmed'])->name('todo.confirmed');
    Route::delete('/todos/{todo}/inconfirmed', [TodoController::class, 'inconfirmed'])->name('todo.inconfirmed');
// });


Route::get('/', function () {
    // return env('APP_NAME');
    return View::make('welcome');
});

Route::get('/user', [UserController::class, 'index']);

Route::post('/upload', [UserController::class, 'uploadAvatar']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
