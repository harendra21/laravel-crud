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



Route::get('/', 'CrudController@index');

Route::get('/add', 'CrudController@create');

Route::get('/show-all', 'CrudController@show');

Route::get('/update/{id}', 'CrudController@edit');

Route::get('/delete/{id}', 'CrudController@destroy');

Route::post('/add-update-record', 'CrudController@store');
