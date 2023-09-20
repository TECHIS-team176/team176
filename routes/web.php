<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/user', [App\Http\Controllers\UserController::class, 'index']);
Route::get('/user/edit', [App\Http\Controllers\UserController::class, 'edit']);
Route::post('/user/update', [App\Http\Controllers\UserController::class, 'update']);

Route::get('/search', [App\Http\Controllers\SearchController::class, 'index']);
Route::get('/search/detail/{id}', [App\Http\Controllers\SearchController::class, 'detail']);
