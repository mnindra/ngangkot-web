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
Route::get('/admin/create', 'AdminController@create');
Route::post('/admin', 'AdminController@store');
Route::delete('/admin/{id}', 'AdminController@destroy');
Route::get('/admin/edit/{id}', 'AdminController@edit');
Route::put('/admin/{id}', 'AdminController@update');

// Penumpang Route
Route::get('/penumpang', 'PenumpangController@index');
Route::delete('/penumpang/{id}', 'PenumpangController@destroy');

// Pengemudi Route
Route::get('/pengemudi', 'PengemudiController@index');
Route::delete('/pengemudi/{id}', 'PengemudiController@destroy');