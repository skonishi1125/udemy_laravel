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
});

// Udemy
Route::get('tests/test', 'TestController@index');
Auth::routes();
// REST
// Route::resource('contacts', 'ContactFormController')->only([
//   'index', 'show'
// ]);

// Route::get('contact/index' , 'ContactFormController@index');
// contact/createなど、まとめてグループで書く
// prefix => フォルダ名 , '認証機能(使うなら)'
// ユーザー登録していない場合、弾かれるようになる よく使うらしい
Route::group(['prefix' => 'contact','middleware' => 'auth'], function(){
  Route::get('index' , 'ContactFormController@index')->name('contact.index');
  Route::get('create' , 'ContactFormController@create')->name('contact.create');
});
// 名前を付けられる
Route::get('/home', 'HomeController@index')->name('home');


// かあすれ

Route::get('hello','HelloController@index');
Route::get('hello/view','HelloController@view');
Route::post('hello/check','HelloController@check');
Route::post('hello/register','HelloController@register');
Route::get('hello/login','HelloController@login');

// MainController
Route::post('main/thread','MainController@thread');
Route::match(['get','post'],'main/createMessage','MainController@createMessage');


