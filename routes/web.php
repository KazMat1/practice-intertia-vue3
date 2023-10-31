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
    return to_route('todos.index');
})->name('top');

Route::controller(TodoController::class)
    ->prefix('todos/')
    ->name('todos.')
    ->group(function () {
        // /todos/*, route('todos.*')
        Route::get('', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('search', 'search')->where('query', '.*')->name('search');
        Route::get('edit/{todo}', 'edit')->name('edit');
        Route::put('update/{todo}', 'update')->name('update');
        Route::delete('destroy/{todo}', 'destroy')->name('destroy');
});
