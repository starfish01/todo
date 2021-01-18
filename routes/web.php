<?php

use App\Http\Controllers\TodoController;
use App\Models\Todo;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

// Route::middleware(['auth:sanctum', 'verified'])->resource('todo', TodoController::class);

Route::get('todos', [TodoController::class, 'index'])
    ->name('todos')
    ->middleware(['auth:sanctum', 'verified']);

Route::put('todos/{todo}', [TodoController::class, 'update'])
    ->name('todos.update')
    ->middleware(['auth:sanctum', 'verified']);

Route::post('todos/', [TodoController::class, 'store'])
    ->name('todos.store')
    ->middleware(['auth:sanctum', 'verified']);
