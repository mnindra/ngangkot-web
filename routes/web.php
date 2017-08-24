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
    return view('template');
});

// Admin Route
Route::get('/admin', 'AdminController@index');
Route::get('/admin/tambah', 'AdminController@create');
Route::post('/admin', 'AdminController@store');
Route::delete('/admin/{id}', 'AdminController@destroy');
