<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\UserController;

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
    return view('home');
});

Route::get('/country', [CountryController::class, 'index'])->name('country');
Route::get('/country/add', [CountryController::class, 'add']);
Route::post('/country/insert', [CountryController::class, 'insert']);
Route::get('/country/edit/{id}', [CountryController::class, 'edit']);
Route::post('/country/update/{id}', [CountryController::class, 'update']);
Route::get('/country/delete/{id}', [CountryController::class, 'destroy']);

Route::get('/users', [UserController::class, 'index'])->name('users');;
Route::get('/users/add', [UserController::class, 'add']);
Route::post('/users/insert', [UserController::class, 'insert']);
Route::get('/users/edit/{id}', [UserController::class, 'edit']);
Route::post('/users/update/{id}', [UserController::class, 'update']);
Route::get('/users/delete/{id}', [UserController::class, 'destroy']);