<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloWorldController;
use App\Http\Controllers\NextController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\InputHearthController;
use App\Http\Controllers\HearthRegisterController;
use App\Http\Controllers\SignUpController;
// use App\Http\Controllers\HomeController;

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


Route::get('/hello', function () {
    return view('hello');
} );


Route::get('/', function () {
    return view('welcome');
});

// ページ遷移元の追加(2022/10/03 その1)
Route::get('/move',[HelloWorldController::class, 'move']);

// ページ遷移先の追加(2022/10/03 その2)
Route::post('/next',[NextController::class, 'index']);

// DBの表示
Route::get('/check',[HelloWorldController::class, 'check']);

//quoteの表示
Route::get('/quote',[QuoteController::class, 'index']);

Route::resource('/add',PostController::class);

// todoアプリ
Route::resource('todos',TodoController::class);



// 健康状態管理アプリ

Route::get('hlogin',[LoginController::class, 'index'])->name('hlogin'); 
Route::post('main',[LoginController::class, 'logincheck']);
Route::group(['middleware' => 'auth:web'], function () { 
    Route::get('mainindex',[LoginController::class, 'after_index']);
    Route::resource('hearth',HearthRegisterController::class);
    Route::resource('/add',PostController::class);
    Route::get('viewhearth',[InputHearthController::class, 'viewindex']);
    Route::get('logout',[LoginController::class, 'logout']);
});
Route::resource('signup',SignUpController::class);