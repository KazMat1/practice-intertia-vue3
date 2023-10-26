<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('hello-world');
})->name('top');

Route::controller(TodoController::class)
    ->prefix('todos/')
    ->name('todos.')
    ->group(function () {
        // /todos/*, route('todos.*')
        Route::get('', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        // Route::get('{query}', 'search')->where('query', '.*')->name('search');
        Route::get('edit', 'edit')->name('edit');
        Route::put('update', 'update')->name('update');
        Route::delete('destroy/{id}', 'destroy')->name('destroy');
});
