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
Route::get('/logout',[App\Http\Controllers\AccountController::class,'logout'])->name('logout');

//ログインしているユーザーのみ許可
Route::group(['middleware' => 'auth'],function(){
    //HOME画面表示
    Route::get('/home',[App\Http\Controllers\HomeController::class,'showHome']);

    //商品一覧画面表示
    Route::get('/search', [App\Http\Controllers\SearchController::class, 'index']);
    Route::get('/search/detail/{id}', [App\Http\Controllers\SearchController::class, 'detail']);
});

//ログインしている管理者のみ許可
Route::group(['middleware' => ['auth','can:管理者']],function(){
    //商品管理画表示
    Route::get('/item', [App\Http\Controllers\ItemController::class, 'index']);
    Route::get('/item/create', [App\Http\Controllers\ItemController::class, 'create']);
    Route::post('/item/store', [App\Http\Controllers\ItemController::class, 'store']);
    Route::get('/item/edit/{id}', [App\Http\Controllers\ItemController::class, 'edit']);
    Route::post('/item/update/{id}', [App\Http\Controllers\ItemController::class, 'update']);
    Route::post('/item/destroy/{id}', [App\Http\Controllers\ItemController::class, 'destroy']);
    
    //ユーザー管理画表示 
    Route::get('/user', [App\Http\Controllers\UserController::class, 'index']);
    Route::get('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit']);
    Route::post('/user/update', [App\Http\Controllers\UserController::class, 'update']);

});


