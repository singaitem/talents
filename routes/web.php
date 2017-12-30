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


	Route::get('/request','SelfServiceController@index')->name('selfservice');

	/*
	|--------------------------------------------------------------------------
	| Kacamata
	|--------------------------------------------------------------------------
	*/
	Route::get('/request/eyeglasses','KacamataController@index')->name('kacamata');
	Route::post('/request/eyeglasses','KacamataController@store')->name('kacamata.store');

	Route::post('/request/submit','ClaimController@claim')->name('claim.submit');


	Route::get('/list','ListRequestController@index')->name('request.list');

	Route::get('/approve/benefit','ApprovalController@benefit')->name('approve.benefit');
	Route::get('/approve/benefit/{claim}','ApprovalController@detail')->name('approve.detail');
	Route::post('/approve/benefit/{claim}','ApprovalController@approve')->name('approve.approved');


	/*
	|--------------------------------------------------------------------------
	| My HR
	|--------------------------------------------------------------------------
	*/
	Route::get('/profile','MyHRController@index')->name('profile');
	Route::get('/family','MyHRController@family')->name('family');
	Route::get('/address','MyHRController@address')->name('address');
	Route::get('/certificate','MyHRController@certificate')->name('certificate');

	/*
	|--------------------------------------------------------------------------
	| Payslip
	|--------------------------------------------------------------------------
	*/

	Route::get('/monthly','PayslipController@monthly')->name('payslip.monthly');

});

Route::group(['namespace' => 'Auth'], function () {
	Route::get('/login','LoginController@showLoginForm')->name('login');
	Route::post('/login','LoginController@login');
	Route::get('/logout','LoginController@logout')->name('logout');

	Route::get('/register','RegisterController@showRegistrationForm')->name('register');
	Route::post('/register','RegisterController@store');
	
});
