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

Route::get('/', function () {
    return view('dokumentasi');
});

Route::group(['prefix' => 'api'], function() {

	Route::post('register', 'UserController@register');
	Route::post('login', 'UserController@login');


	/*
	|--------------------------------------------------------------------------
	| Memberi token pada routing API
	|--------------------------------------------------------------------------
	| Data tidak dapat di akses tanpa menggunakan token
	| ini semua berlaku jika routing tersebut masuk pada middleware 'jw.auth'
	*/
	Route::group(['middleware' => 'jwt.auth'], function() {
		Route::get('buku', 'BukuController@index');
		Route::post('buku/store', 'BukuController@store');
		Route::get('buku/{id}', 'BukuController@show');
		Route::post('buku/{id}/update', 'BukuController@update');
		Route::post('buku/{id}/delete', 'BukuController@destroy');
	});

});