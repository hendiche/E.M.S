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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['prefix' => ''], function() {
	Route::get('/', 'Frontend\FrontendController@index')->name('front.index');
});


Route::group(['prefix' => 'admin'], function() {
	Route::get('/', 'Backend\BackendController@index')->name('back.index');
	Route::get('/form', 'Backend\BackendController@showForm')->name('back.form');
});