<?php

use App\Http\Controllers\TaskController;
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

Route::controller(TaskController::class)
    ->prefix('tasks/')
    ->name('tasks.')
    ->group(function () {
        // /tasks/*, route('tasks.*')
        Route::get('', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit', 'edit')->name('edit');
        Route::put('update', 'update')->name('update');
        Route::delete('destroy', 'destroy')->name('destroy');
});
