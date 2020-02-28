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

Route::get('/', 'HomeController@index')->name('home');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

// CUSTOM

// getting data
Route::get('/isearch', 'IsearchController@index')->name('isearch');

// Loading more data
Route::post('/loaddata', 'IsearchController@loadData')->name('loadData');