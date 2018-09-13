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
	Route::get('/', ['as' => 'entry', 'uses' => 'EntryController@index']);
    Route::post('/submit', 'EntryController@submit')->name('submit');

	Route::get('/form', 'Backend\BackendController@showForm')->name('back.form');

	Route::get('/slack', 'Backend\BackendController@slack')->name('back.slack');
	Route::get('/facebook', 'Backend\BackendController@facebook')->name('back.fb');
	Route::get('/google', 'Backend\BackendController@googleIndex')->name('back.google');
	Route::post('/google/store', 'Backend\BackendController@store');

	Route::get('/oauth', 'Backend\BackendController@oauth')->name('back.oauth');
});