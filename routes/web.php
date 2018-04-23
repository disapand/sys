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
Route::post('/updateUser/{user}', 'UsersController@update') -> name('updateUesr');
Route::post('/logout', 'UsersController@logout') -> name('logout');
Route::get('/userList', 'UsersController@list') -> name('userList');
Route::get('/userAdd', 'UsersController@add') -> name('userAdd');
Route::post('/userAdd', 'UsersController@store') -> name('userAdd');
Route::post('/userDelete/{user}', 'UsersController@destroy') -> name('userDelete');

Route::get('/jkrCreate', 'jkrController@create') -> name('jkrCreate');
Route::post('/jkrCreate', 'jkrController@jbxxStore') -> name('jbxxCreate');
Route::get('/jkrlist', 'jkrController@list') -> name('jkrList');
Route::get('/jkrShow/{jbxx}', 'jkrController@show') -> name('jkrShow');
Route::post('/jkrUpdate/{jbxx}', 'jkrController@update') -> name('jbxxUpdate');
Route::get('/jkrQuery/{condition?}/queryString/{queryString?}', 'jkrController@query') -> name('jkrQuery');
Route::post('/jkrSh/{shyj?}/sort/{sort?}/zt/{zt?}', 'jkrController@sh') -> name('jkrSh');