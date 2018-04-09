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

Route::get('/','SessionsController@index') -> name('index');

Route::post('/login', 'SessionsController@login') -> name('login');

Route::get('/editUser', 'UsersController@edit') -> name('editUser');
Route::post('/updateUser', 'UsersController@update') -> name('updateUesr');
Route::post('/logout', 'UsersController@logout') -> name('logout');