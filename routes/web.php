<?php

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
    // →welcomeのTOPページを表示する
});

// /testページに行ったときにルーティングする箇所
Route::get('/test',function(){
    return view('layouts.test_site');
});

Auth::routes();

Route::get('/home','HomeController@index')->name('home');

// ログイン状態
Route::group(['middleware' => 'auth'],function(){
// →ミドルウェア設定することでログインしたときしか表示できないようにする

    // ユーザー関連
    Route::resource('users','UsersController',['only'=> ['index','show','edit','update']]);
});