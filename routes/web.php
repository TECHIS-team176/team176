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


Route::get('/item', [App\Http\Controllers\ItemController::class, 'index']);
Route::get('/item/create', [App\Http\Controllers\ItemController::class, 'create']);
Route::post('/item/store', [App\Http\Controllers\ItemController::class, 'store']);

Route::get('/item/edit/{id}', [App\Http\Controllers\ItemController::class, 'edit']);
Route::post('/item/update/{id}', [App\Http\Controllers\ItemController::class, 'update']);
Route::post('/item/destroy/{id}', [App\Http\Controllers\ItemController::class, 'destroy']);
