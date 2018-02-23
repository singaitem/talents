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
	Route::get('/benefit-request','ListRequestController@benefit')->name('request.list');
	Route::get('/personal-request','ListRequestController@personal')->name('request.personal');
	Route::get('/request/detail/{claim}','ListRequestController@detail')->name('request.detail');
	Route::post('/request/detail/{claim}','ListRequestController@cancel')->name('request.cancel');

	/*
	|--------------------------------------------------------------------------
	| Kacamata
	|--------------------------------------------------------------------------
	*/
	Route::get('/request/eyeglasses','KacamataController@index')->name('kacamata');
	Route::post('/request/eyeglasses','KacamataController@store')->name('kacamata.store');

	Route::post('/request/submit','ClaimController@claim')->name('claim.submit');


	Route::get('/approve/personalia','ApprovalController@personal')->name('approve.personal');
	Route::get('/approve/benefit','ApprovalController@benefit')->name('approve.benefit');
	Route::get('/approve/detail/{claim}','ApprovalController@detail')->name('approve.detail');
	Route::post('/approve/detail/{claim}','ApprovalController@approve')->name('approve.approved');
	Route::post('/approve/detail/reject/{claim}','ApprovalController@reject')->name('approve.rejected');
	/*
	|--------------------------------------------------------------------------
	| Medical
	|--------------------------------------------------------------------------
	*/
	Route::get('/request/medical','MedicalController@index')->name('medical');
	Route::post('/request/medical','MedicalController@store')->name('medical.store');
	/*
	|--------------------------------------------------------------------------
	| Medical Overlimit
	|--------------------------------------------------------------------------
	*/
	Route::get('/request/medicaloverlimit','MedicalOverlimitController@index')->name('medicaloverlimit');
	Route::post('/request/medicaloverlimit','MedicalOverlimitController@store')->name('medicaloverlimit.store');
	/*
	|--------------------------------------------------------------------------
	| Business Travel
	|--------------------------------------------------------------------------
	*/
	Route::get('/request/travel','BusinessTravelController@index')->name('travel');
	Route::post('/request/travel','BusinessTravelController@store')->name('travel.store');
	/*
	|--------------------------------------------------------------------------
	| SPD Advance
	|--------------------------------------------------------------------------
	*/
	Route::get('/request/spdadvance','SPDAdvanceController@index')->name('spdadvance');
	Route::get('/request/realisation/{claim}','SPDAdvanceController@realisation')->name('realisation');
	/*
	|--------------------------------------------------------------------------
	| Wedding
	|--------------------------------------------------------------------------
	*/
	Route::get('/request/wedding','WeddingController@index')->name('wedding');
	Route::post('/request/wedding','WeddingController@store')->name('wedding.store');

	/*
	|--------------------------------------------------------------------------
	| Profile
	|--------------------------------------------------------------------------
	*/
	Route::get('/profile','MyHRController@index')->name('profile');
	Route::post('/profile','MyHRController@changeMaritalStatus')->name('update.marital');
	Route::post('/profile/picture','MyHRController@changeProfilePicture')->name('update.profile-picture');
	Route::post('/profile/changepassword','MyHRController@changePassword')->name('update.password');
	/*
	|--------------------------------------------------------------------------
	| Family
	|--------------------------------------------------------------------------
	*/
	Route::get('/family','FamilyController@index')->name('family');
	Route::get('/family/member/{family}','FamilyController@detail')->name('family.detail');
	Route::post('/family/member/{family}','FamilyController@changeFamily')->name('family.update');
	Route::get('/family/new','FamilyController@create')->name('family.create');
	Route::post('/family/new','FamilyController@addFamily')->name('family.add');
	/*
	|--------------------------------------------------------------------------
	| Address
	|--------------------------------------------------------------------------
	*/
	Route::get('/address','AddressController@index')->name('address');
	Route::get('/address/detail/{address}','AddressController@detail')->name('address.detail');
	Route::post('/address/detail/{address}','AddressController@changeAddress')->name('address.update');
	Route::get('/address/new','AddressController@create')->name('address.create');
	Route::post('/address/new','AddressController@addAddress')->name('address.add');
	
	/*
	|--------------------------------------------------------------------------
	| Certificate
	|--------------------------------------------------------------------------
	*/
	Route::get('/certificate','CertificateController@index')->name('certificate');
	Route::get('/certificate/new','CertificateController@create')->name('certificate.create');
	Route::post('/certificate/new','CertificateController@addCertificate')->name('certificate.add');
	Route::get('/certificate/detail/{certificate}','CertificateController@detail')->name('certificate.detail');

	/*
	|--------------------------------------------------------------------------
	| Payslip
	|--------------------------------------------------------------------------
	*/

	Route::get('/monthly','PayslipController@monthly')->name('payslip.monthly');
	Route::get('/monthly/payslip/{monthly}','PayslipController@payslip')->name('payslip.monthly.detail');
	
	Route::get('/yearly','PayslipController@yearly')->name('payslip.yearly');
	Route::get('/yearly/payslip/{yearly}','PayslipController@yearlyPayslipDetail')->name('payslip.yearly.detail');
	/*
	|--------------------------------------------------------------------------
	| Setting
	|--------------------------------------------------------------------------
	*/
	Route::get('/setting','SettingController@index')->name('setting');
	Route::get('/setting/marital','SettingController@marital')->name('setting.marital');
	Route::get('/setting/family','SettingController@family')->name('setting.family');
	Route::get('/setting/address','SettingController@address')->name('setting.address');
	Route::get('/setting/certificate','SettingController@certificate')->name('setting.certificate');
	Route::get('/setting/eyeglasses','SettingController@eyeglasses')->name('setting.eyeglasses');
	Route::get('/setting/medical','SettingController@medical')->name('setting.medical');
	Route::get('/setting/medicaloverlimit','SettingController@medicaloverlimit')->name('setting.medicaloverlimit');
	Route::get('/setting/businesstravel','SettingController@businesstravel')->name('setting.businesstravel');
	Route::get('/setting/spdadvance','SettingController@spdadvance')->name('setting.spdadvance');
	Route::get('/setting/wedding','SettingController@wedding')->name('setting.wedding');
	Route::get('/setting/approver/{setting}','SettingController@addApprover')->name('setting.approver');
	Route::post('/setting/approver/{setting}','SettingController@store')->name('setting.add');
	Route::get('/setting/update/{settingdetail}','SettingController@changeApprover')->name('setting.update.approver');
	Route::post('/setting/change/{settingdetail}','SettingController@change')->name('setting.approver.change');
	Route::post('/setting/delete/{settingdetail}','SettingController@delete')->name('setting.delete');
});

Route::group(['namespace' => 'Auth'], function () {
	Route::get('/login','LoginController@showLoginForm')->name('login');
	Route::post('/login','LoginController@login');
	Route::get('/logout','LoginController@logout')->name('logout');

	Route::get('/register','RegisterController@showRegistrationForm')->name('register');
	Route::post('/register','RegisterController@store');
	
});
