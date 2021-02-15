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




// かあすれ

Route::get('hello','HelloController@index');
Route::get('hello/view','HelloController@view');
Route::post('hello/check','HelloController@check');
Route::post('hello/register','HelloController@register');
Route::get('hello/login','HelloController@login');

// MainController
Route::post('main/thread','MainController@thread');
Route::match(['get','post'],'main/createMessage','MainController@createMessage');
