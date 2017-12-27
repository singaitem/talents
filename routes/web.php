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
	Route::post('/Request/Eyeglasses','KacamataController@store')->name('kacamata.store');

	Route::post('/Request/submit','ClaimController@claim')->name('claim.submit');


	Route::get('/List','ListRequestController@index')->name('request.list');

	Route::get('/Approve/Benefit','ApprovalController@benefit')->name('approve.benefit');
	Route::get('/Approve/Benefit/{claim}','ApprovalController@detail')->name('approve.detail');
	Route::post('/Approve/Benefit/{claim}','ApprovalController@approve')->name('approve.approved');



	Route::get('/Profile','MyHRController@index')->name('profile');
	Route::get('/Family','MyHRController@family')->name('family');

});

Route::group(['namespace' => 'Auth'], function () {
	Route::get('/login','LoginController@showLoginForm')->name('login');
	Route::post('/login','LoginController@login');
	Route::get('/logout','LoginController@logout')->name('logout');

	Route::get('/register','RegisterController@showRegistrationForm')->name('register');
	Route::post('/register','RegisterController@store');
	
});
