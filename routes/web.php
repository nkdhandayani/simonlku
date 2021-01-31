<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});


Route::get('/coba', function () {
    return view('layouts.master');
});
Route::get('/lte', function () {
    return view('adminLTE');
});
Route::get('/dashboard', function () {
    return view('dashboard.index');
});

Route::get('/regis', 'App\Http\Controllers\InsertRegister@insert');



	Route::post('/logout', 'App\Http\Controllers\AuthController@logout')->name('logout');
	Route::post('/postlogin', 'App\Http\Controllers\AuthController@postlogin');
	
 	
	//	Route oleh Administrator
	Route::group(['middleware' => 'isAdminUser'], function(){
	// 	Route User
		Route::get('/user', 'App\Http\Controllers\UserController@index');
		Route::get('/user/create', 'App\Http\Controllers\UserController@create');
		Route::post('/user/store', 'App\Http\Controllers\UserController@store');
		Route::get('/user/{id}/edit','App\Http\Controllers\UserController@edit');
		Route::patch('/user/{id}/update','App\Http\Controllers\UserController@update');
		Route::get('/user/{id}/detail_user','App\Http\Controllers\UserController@show');

	// 	Route BPW
		Route::get('/bpw', 'App\Http\Controllers\BPWController@index');
		Route::get('/bpw/create', 'App\Http\Controllers\BPWController@create');
		Route::post('/bpw/store', 'App\Http\Controllers\BPWController@store');
		Route::get('/bpw/{id}/edit','App\Http\Controllers\BPWController@edit');
		Route::patch('/bpw/{id}/update','App\Http\Controllers\BPWController@update');
		Route::get('/bpw/{id}/detail_bpw','App\Http\Controllers\BPWController@show');

	// 	Route TDUP

	// 	Route Izin

	// 	Route LKU
	});




	// 	Route oleh Staf Jasa
	Route::group(['middleware' => 'isStaffUser'], function(){
	// 	Route BPW
		// Route::get('/bpw', 'App\Http\Controllers\BPWController@index');
	// 	Route TDUP

	// 	Route Izin

	// 	Route LKU
		
	});




	// 	Route oleh Kepala Seksi
	Route::group(['middleware' => 'isKepalaUser'], function(){
	// 	Route BPW

	// 	Route LKU
		
	});



	// 	Route oleh BPW
	Route::group(['middleware' => 'isBPWUser'], function(){
	// 	Route BPW
		// Route::get('/bpw', 'App\Http\Controllers\BPWController@index');
	// 	Route TDUP

	// 	Route Izin

	// 	Route LKU
		
	});











	//Route group for admin user, using middleware 'isAdminUser' for check the state of auth first, if not admin, then redirect to login page (see at Middleware/isAdminUser.php)
	// Route::group(['middleware' => 'isAdminUser'], function(){
	// 	// Route user oleh Administrator
	// 	Route::get('/dashboard_admin', 'App\Http\Controllers\UserController@indexDashAdmin');
	// 	Route::get('/list_userAdmin', 'App\Http\Controllers\UserController@list');
	// 	Route::get('/tambah_userAdmin', 'App\Http\Controllers\UserController@index');
	// 	Route::get('/edit_userAdmin/edit/{id}', 'App\Http\Controllers\UserController@edit');
	// 	Route::patch('/editUserProsesAdmin/{id}', 'App\Http\Controllers\UserController@editUserProsesAdmin');
	// 	Route::get('/detail_userAdmin/detail/{id}','App\Http\Controllers\UserController@detailUserAdmin');

	// 	// Route BPW oleh Administrator
	// 	Route::get('/dashboard_admin', 'App\Http\Controllers\BPWController@indexDashAdmin');
	// 	Route::get('/list_bpwAdmin', 'App\Http\Controllers\BPWController@listAdmin');
	// 	Route::get('/tambah_bpwAdmin', 'App\Http\Controllers\BPWController@index');
	// 	Route::get('/edit_bpwAdmin/edit/{id}', 'App\Http\Controllers\BPWController@edit');
	// 	Route::patch('/editBPWProsesAdmin/{id}', 'App\Http\Controllers\BPWController@editBPWProsesAdmin');
	// 	Route::get('/detail_bpwAdmin/detail/{id}','App\Http\Controllers\BPWController@detailBPWAdmin');

	// 	// Route TDUP oleh Administrator
	// 	Route::get('/dashboard_admin', 'App\Http\Controllers\TDUPController@indexDashAdmin');
	// 	Route::get('/list_tdupAdmin', 'App\Http\Controllers\TDUPController@listAdmin');

	// 	// Route Izin oleh Administrator
	// 	Route::get('/dashboard_admin', 'App\Http\Controllers\IzinController@indexDashAdmin');
	// 	Route::get('/list_izinAdmin', 'App\Http\Controllers\IzinController@listAdmin');

	// 	// Route LKU oleh Administrator
	// 	Route::get('/dashboard_admin', 'App\Http\Controllers\LKUController@indexDashAdmin');
	// 	Route::get('/list_lkuAdmin', 'App\Http\Controllers\LKUController@listAdmin');

	// });

	// Route::group(['middleware' => 'isStaffUser'], function(){

	// 	// Route BPW oleh Staf
	// 	Route::get('/dashboard_staf', 'App\Http\Controllers\BPWController@indexDashStaf');
	// 	Route::get('/list_bpwStaf', 'App\Http\Controllers\BPWController@listStaf');

	// 	// Route TDUP oleh Staf
	// 	Route::get('/dashboard_staf', 'App\Http\Controllers\TDUPController@indexDashStaf');
	// 	Route::get('/list_tdupStaf', 'App\Http\Controllers\TDUPController@listStaf');
	// 	Route::get('/edit_tdupStaf/edit/{id}', 'App\Http\Controllers\TDUPController@edit');
	// 	Route::patch('/editTDUPProsesStaf/{id}', 'App\Http\Controllers\TDUPController@editTDUPProsesStaf');

	// 	// Route Izin oleh Staf
	// 	Route::get('/dashboard_staf', 'App\Http\Controllers\IzinController@indexDashStaf');
	// 	Route::get('/list_izinStaf', 'App\Http\Controllers\IzinController@listStaf');
	// 	Route::get('/edit_izinStaf/edit/{id}', 'App\Http\Controllers\IzinController@edit');
	// 	Route::patch('/editIzinProsesStaf/{id}', 'App\Http\Controllers\IzinController@editIzinProsesStaf');

	// 	// Route LKU oleh Staf
	// 	Route::get('/dashboard_staf', 'App\Http\Controllers\LKUController@indexDashStaf');
	// 	Route::get('/list_lkuStaf', 'App\Http\Controllers\LKUController@listStaf');
	// 	Route::get('/edit_lkuStaf/edit/{id}', 'App\Http\Controllers\LKUController@edit');
	// 	Route::patch('/editLKUProsesStaf/{id}', 'App\Http\Controllers\LKUController@editLKUProsesStaf');
	// });

	// Route::group(['middleware' => 'isKepalaUser'], function(){
	// 	// Route E-Report BPW oleh Kepala
	// 	Route::get('/dashboard_kepala', 'App\Http\Controllers\LKUController@indexDashKepala');

	// 	// Route E-Report LKU oleh Kepala
	// 	Route::get('/dashboard_kepala', 'App\Http\Controllers\LKUController@indexDashKepala');
	// });

	// Route::group(['middleware' => 'isBPWUser'], function(){
	// 	// Route BPW oleh BPW
	// 	Route::get('/dashboard_bpw', 'App\Http\Controllers\BPWController@indexDashBPW');
	// 	Route::get('/list_bpwBPW', 'App\Http\Controllers\BPWController@listBPW');
	// 	Route::get('/edit_bpwBPW/edit/{id}', 'App\Http\Controllers\BPWController@edit');
	// 	Route::patch('/editBPWProsesBPW/{id}', 'App\Http\Controllers\BPWController@editBPWProsesBPW');

	// 	// Route TDUP oleh BPW
	// 	Route::get('/dashboard_bpw', 'App\Http\Controllers\TDUPController@indexDashBPW');
	// 	Route::get('/list_tdupBPW', 'App\Http\Controllers\TDUPController@listBPW');
	// 	Route::get('/tambah_tdupBPW', 'App\Http\Controllers\TDUPController@index');
	// 	Route::get('/edit_tdupBPW/edit/{id}', 'App\Http\Controllers\TDUPController@edit');
	// 	Route::patch('/editTDUPProsesBPW/{id}', 'App\Http\Controllers\TDUPController@editTDUPProsesBPW');

	// 	// Route Izin oleh BPW
	// 	Route::get('/dashboard_bpw', 'App\Http\Controllers\IzinController@indexDashBPW');
	// 	Route::get('/list_izinBPW', 'App\Http\Controllers\IzinController@listBPW');
	// 	Route::get('/edit_izinBPW/edit/{id}', 'App\Http\Controllers\IzinController@edit');
	// 	Route::patch('/editIzinProsesBPW/{id}', 'App\Http\Controllers\IzinController@editIzinProsesBPW');

	// 	// Route LKU oleh BPW
	// 	Route::get('/dashboard_bpw', 'App\Http\Controllers\LKUController@indexDashBPW');
	// 	Route::get('/list_lkuBPW', 'App\Http\Controllers\LKUController@listBPW');
	// 	Route::get('/edit_lkuBPW/edit/{id}', 'App\Http\Controllers\LKUController@edit');
	// 	Route::patch('/editLKUProsesBPW/{id}', 'App\Http\Controllers\LKUController@editLKUProsesBPW');
	// });






// Route::resource('bpw', 'App\Http\Controllers\BPWController');
// Route::resource('tdup', 'App\Http\Controllers\TDUPController');
// Route::resource('izin', 'App\Http\Controllers\IzinController');
// Route::resource('lku', 'App\Http\Controllers\LKUController');
// Route::resource('user', 'App\Http\Controllers\UserController'); 