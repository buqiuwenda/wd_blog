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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('search','HomeController@search');

Route::get('/','ArticleController@index');
Route::get('{slug}','ArticleController@show');

Route::post('password/change', 'UserController@changePassword')->middleware('auth');

Route::post('comments', 'CommentController@store')->middleware('auth');


