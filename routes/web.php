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

Route::group(['namespace' => 'User'], function () {

	Route::get('/','DashboardController@index')->name('dashboard');
	Route::get('/Request','SelfServiceController@index')->name('selfservice');

	Route::get('/Request/Eyeglasses','KacamataController@index')->name('kacamata');
	Route::post('/Request/Eyeglasses','KacamataController@confirmation')->name('kacamata.confirmation');

});

Route::group(['namespace' => 'Auth'], function () {
	Route::get('/login','LoginController@showLoginForm')->name('login');
	Route::post('/login','LoginController@login');
	Route::get('/logout','LoginController@logout')->name('logout');

	Route::get('/register','RegisterController@showRegistrationForm')->name('register');
	Route::post('/register','RegisterController@store');
	
});
