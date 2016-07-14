<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('book','BookController');
Route::resource('user','UserController');
Route::resource('lib','LibController');

Route::get('/book/{id}/get','BookController@selectUser');



Route::get('/book/{id}/get/user/{uid}','BookController@getBook');

Route::get('/book/{id}/pass/user/{uid}', 'BookController@passBook');
Route::get('/user/{id}/books','UserController@showBooks');