<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/employees', [App\Http\Controllers\EmployeeController::class, 'index'])->name('employee');
Route::get('/employees/add', [App\Http\Controllers\EmployeeController::class, 'add'])->name('employee.add');
Route::post('/employees/store', [App\Http\Controllers\EmployeeController::class, 'store'])->name('employee.store');

Route::get('/managers/search', [App\Http\Controllers\EmployeeController::class, 'searchM'])
    ->name('managers.search');

Route::get('/positions/search', [App\Http\Controllers\EmployeeController::class, 'searchP'])
    ->name('positions.search');

Route::get('/employees/edit/{id}', [App\Http\Controllers\EmployeeController::class, 'edit'])->name('employee.edit');
Route::post('/employees/update/{id}', [App\Http\Controllers\EmployeeController::class, 'update'])->name('employee.update');
Route::get('/employees/delete/{id}', [App\Http\Controllers\EmployeeController::class, 'delete'])->name('employee.delete');

// Positions

Route::get('/positions/add', [App\Http\Controllers\PositionController::class, 'add'])->name('position.add');
Route::post('/positions/store', [App\Http\Controllers\PositionController::class, 'store'])->name('position.store');

Route::get('/positions/edit/{id}', [App\Http\Controllers\PositionController::class, 'edit'])->name('position.edit');
Route::post('/positions/update/{id}', [App\Http\Controllers\PositionController::class, 'update'])->name('position.update');
Route::get('/positions/delete/{id}', [App\Http\Controllers\PositionController::class, 'delete'])->name('position.delete');