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
Route::resource('/login','LoginController');
Route::get('logout', 'LoginController@logout');
Route::resource('/cargo', 'CargoController');
Route::resource('/home', 'HomeController');
Route::resource('/usuario', 'UsuarioController');
Route::get('/password', 'UsuarioController@password');
Route::post('/updatepassword', 'UsuarioController@updatePassword');
