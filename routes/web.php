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


Route::any('notify_url', 'HomeController@notify_url');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('search','HomeController@search');

Route::get('/sponsor', 'SponsorController@index')->name('sponsor');

Route::get('/','ArticleController@index');
Route::get('{slug}','ArticleController@show');



Route::post('password/change', 'UserController@changePassword')->middleware('auth');

Route::post('comments', 'CommentController@store')->middleware('auth');

Route::group(['prefix' => 'user'], function(){
   Route::group(['middleware' => 'auth'], function(){
        Route::get('profile', 'UserController@edit');
        Route::get('setting', 'UserController@setting');
        Route::put('profile/{id}', 'UserController@update');
   });

});

