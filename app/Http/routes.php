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

Route::get('/', 'IndexController@index');


Route::put('/list', 'ListController@update');
Route::post('/list', 'ListController@store');
Route::delete('/list/{id}', 'ListController@destroy');
