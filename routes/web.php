<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;




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

// Route::get('/', function () {
//     return view('welcome');
// });


//アカウント登録画面表示
Route::get('/account/register',[App\Http\Controllers\AccountController::class,'showRegister'])->name('register');

//アカウント登録処理実行
Route::post('/account/register',[App\Http\Controllers\AccountController::class,'registerUser']);

//ログイン画面表示
Route::get('/',[App\Http\Controllers\AccountController::class,'showLogin'])->middleware('guest')->name('login');

//ログイン処理実行
Route::post('/',[App\Http\Controllers\AccountController::class,'login']);

//ログアウト処理
Route::get('/logout/{id}',[App\Http\Controllers\AccountController::class,'logout'])->name('logout');

//ログインしているユーザーのみ許可
Route::group(['middleware' => 'auth'],function(){
    //HOME画面表示
    Route::get('/home',[App\Http\Controllers\HomeController::class,'showHome']);
});

//ログインしている管理者のみ許可
Route::group(['middleware' => ['auth','can:管理者']],function(){
    //TODO:商品管理画表示 

    //TODO:ユーザー管理画表示 

});


