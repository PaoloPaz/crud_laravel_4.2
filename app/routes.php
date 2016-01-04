<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

//Route::controller('users','UserController');
Route::get('users', 'UserController@getIndex');
Route::get('users/create','UserController@getCreate');
Route::get('users/show/{id}','UserController@getShow');
Route::post('/users/store','UserController@store');
Route::get('/users/edit/{id}','UserController@edit');
Route::post('/users/update/{id}','UserController@update');
Route::get('/users/destroy/{id}','UserController@destroy');
