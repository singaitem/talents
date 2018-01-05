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
	| My Request
	|--------------------------------------------------------------------------
	*/
	Route::get('/list','ListRequestController@index')->name('request.list');
	Route::get('/personal-request','ListRequestController@personal')->name('request.personal');

	/*
	|--------------------------------------------------------------------------
	| Kacamata
	|--------------------------------------------------------------------------
	*/
	Route::get('/request/eyeglasses','KacamataController@index')->name('kacamata');
	Route::post('/request/eyeglasses','KacamataController@store')->name('kacamata.store');

	Route::post('/request/submit','ClaimController@claim')->name('claim.submit');



	Route::get('/approve/benefit','ApprovalController@benefit')->name('approve.benefit');
	Route::get('/approve/benefit/{claim}','ApprovalController@detail')->name('approve.detail');
	Route::post('/approve/benefit/{claim}','ApprovalController@approve')->name('approve.approved');
	/*
	|--------------------------------------------------------------------------
	| Medical
	|--------------------------------------------------------------------------
	*/
	Route::get('/request/medical','MedicalController@index')->name('medical');
	/*
	|--------------------------------------------------------------------------
	| Medical Overlimit
	|--------------------------------------------------------------------------
	*/
	Route::get('/request/medicaloverlimit','MedicalOverlimitController@index')->name('medicaloverlimit');
	/*
	|--------------------------------------------------------------------------
	| Business Travel
	|--------------------------------------------------------------------------
	*/
	Route::get('/request/travel','BusinessTravelController@index')->name('travel');
	/*
	|--------------------------------------------------------------------------
	| SPD Advance
	|--------------------------------------------------------------------------
	*/
	Route::get('/request/spdadvance','SPDAdvanceController@index')->name('spdadvance');
	/*
	|--------------------------------------------------------------------------
	| Wedding
	|--------------------------------------------------------------------------
	*/
	Route::get('/request/wedding','WeddingController@index')->name('wedding');

	/*
	|--------------------------------------------------------------------------
	| My HR
	|--------------------------------------------------------------------------
	*/
	Route::get('/profile','MyHRController@index')->name('profile');

	Route::get('/family','MyHRController@family')->name('family');
	Route::get('/family/member/{family}','MyHRController@familyDetail')->name('family.detail');
	Route::get('/family/new','MyHRController@familyCreate')->name('family.create');

	Route::get('/address','MyHRController@address')->name('address');
	Route::get('/address/detail/{address}','MyHRController@addressDetail')->name('address.detail');
	Route::get('/address/new','MyHRController@addressCreate')->name('address.create');

	Route::get('/certificate','MyHRController@certificate')->name('certificate');
	Route::get('/certificate/new','MyHRController@certificateCreate')->name('certificate.create');
	Route::get('/certificate/detail/{certificate}','MyHRController@certificateDetail')->name('certificate.detail');

	/*
	|--------------------------------------------------------------------------
	| Payslip
	|--------------------------------------------------------------------------
	*/

	Route::get('/monthly','PayslipController@monthly')->name('payslip.monthly');
	Route::get('/monthly/payslip/{monthly}','PayslipController@payslip')->name('payslip.monthly.detail');
	

});

Route::group(['namespace' => 'Auth'], function () {
	Route::get('/login','LoginController@showLoginForm')->name('login');
	Route::post('/login','LoginController@login');
	Route::get('/logout','LoginController@logout')->name('logout');

	Route::get('/register','RegisterController@showRegistrationForm')->name('register');
	Route::post('/register','RegisterController@store');
	
});
