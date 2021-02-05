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


	Route::get('/dashboard', function () { return view('dashboard.index');	});
	Route::get('/regis', 'App\Http\Controllers\InsertRegister@insert');
	Route::post('/logout', 'App\Http\Controllers\AuthController@logout')->name('logout');
	Route::post('/postlogin', 'App\Http\Controllers\AuthController@postlogin');
	
 	
	//	Route oleh Administrator
	Route::group(['middleware' => 'isAdminUser'], function(){
	// 	Route User
		Route::get('/user', 'App\Http\Controllers\UserController@index');
		Route::post('/user/store', 'App\Http\Controllers\UserController@store');
		Route::get('/user/edit/{id}','App\Http\Controllers\UserController@edit');
		Route::patch('/user/update/{id}','App\Http\Controllers\UserController@update');
		Route::get('/user/show/{id}','App\Http\Controllers\UserController@show');

	// 	Route BPW
		Route::get('/bpw', 'App\Http\Controllers\BPWController@index');
		Route::post('/bpw/store', 'App\Http\Controllers\BPWController@store');
		Route::get('/bpw/edit/{id}','App\Http\Controllers\BPWController@edit');
		Route::patch('/bpw/update/{id}','App\Http\Controllers\BPWController@update');
		Route::get('/bpw/show/{id}','App\Http\Controllers\BPWController@show');

	// 	Route TDUP
		Route::get('/tdup_verif', 'App\Http\Controllers\TDUPController@index');
		Route::get('/tdup_nonverif', 'App\Http\Controllers\TDUPController@index2');
		Route::get('/tdup/show/{id}','App\Http\Controllers\TDUPController@show');

	// 	Route Izin
		Route::get('/izin_verif', 'App\Http\Controllers\IzinController@index');
		Route::get('/izin_nonverif', 'App\Http\Controllers\IzinController@index2');
		Route::get('/izin/show/{id}','App\Http\Controllers\IzinController@show');

	// 	Route LKU
		// Route::get('/lku_verif', 'App\Http\Controllers\LKUController@index');
		// Route::get('/lku_nonverif', 'App\Http\Controllers\LKUController@index2');
		// Route::get('/lku/show/{id}','App\Http\Controllers\LKUController@show');
	});




	// 	Route oleh Staf Jasa
	Route::group(['middleware' => 'isStaffUser'], function(){
	// // 	Route BPW
	// 	Route::get('/bpw', 'App\Http\Controllers\BPWController@index');
	// 	Route::get('/bpw/show/{id}','App\Http\Controllers\BPWController@show');

	// // 	Route TDUP
	//  	Route::get('/tdup_verif', 'App\Http\Controllers\TDUPController@index');
	// 	Route::get('/tdup_nonverif', 'App\Http\Controllers\TDUPController@index2');
	//  	Route::get('/tdup/edit/{id}','App\Http\Controllers\TDUPController@edit');
	//  	Route::patch('/tdup/update/{id}','App\Http\Controllers\TDUPController@update');
	//  	Route::get('/tdup/show/{id}','App\Http\Controllers\TDUPController@show');

	// // 	Route Izin
	// 	Route::get('/izin_verif', 'App\Http\Controllers\IzinController@index');
	//  	Route::get('/izin_nonverif', 'App\Http\Controllers\IzinController@index2');
	// 	Route::get('/izin/edit/{id}','App\Http\Controllers\IzinController@edit');
	// 	Route::patch('/izin/update/{id}','App\Http\Controllers\IzinController@update');
	// 	Route::get('/izin/show/{id}','App\Http\Controllers\IzinController@show');

	// // 	Route LKU
	// 	Route::get('/lku_verif', 'App\Http\Controllers\LKUController@index');
	// 	Route::get('/lku_nonverif', 'App\Http\Controllers\LKUController@index2');
	// 	Route::get('/lku/edit/{id}','App\Http\Controllers\LKUController@edit');
	// 	Route::patch('/lku/update/{id}','App\Http\Controllers\LKUController@update');
	// 	Route::get('/lku/show/{id}','App\Http\Controllers\LKUController@show');
		
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
		// Route::get('/bpw/show/{id}','App\Http\Controllers\BPWController@show');

	// 	Route TDUP
	 	// Route::get('/tdup_verif', 'App\Http\Controllers\TDUPController@index');
		// Route::get('/tdup_nonverif', 'App\Http\Controllers\TDUPController@index2');
	 	// Route::post('/tdup/store', 'App\Http\Controllers\TDUPController@store');
	 	// Route::get('/tdup/edit/{id}','App\Http\Controllers\TDUPController@edit');
	 	// Route::patch('/tdup/update/{id}','App\Http\Controllers\TDUPController@update');
	 	// Route::get('/tdup/show/{id}','App\Http\Controllers\TDUPController@show');

	//  Route Izin
	 	// Route::get('/izin_verif', 'App\Http\Controllers\IzinController@index');
		// Route::get('/izin_nonverif', 'App\Http\Controllers\IzinController@index2');
	 	// Route::post('/izin/store', 'App\Http\Controllers\IzinController@store');
	 	// Route::get('/izin/edit/{id}','App\Http\Controllers\IzinController@edit');
	 	// Route::patch('/izin/update/{id}','App\Http\Controllers\IzinController@update');
	 	// Route::get('/izin/show/{id}','App\Http\Controllers\IzinController@show');

	//  Route LKU
		// Route::get('/lku_verif', 'App\Http\Controllers\LKUController@index');
		// Route::get('/lku_nonverif', 'App\Http\Controllers\LKUController@index2');
		// Route::get('/lku/create', 'App\Http\Controllers\LKUController@create');
		// Route::post('/lku/store', 'App\Http\Controllers\LKUController@store');
		// Route::get('/lku/edit/{id}','App\Http\Controllers\LKUController@edit');
		// Route::patch('/lku/update/{id}','App\Http\Controllers\LKUController@update');
		// Route::get('/lku/show/{id}','App\Http\Controllers\LKUController@show');
		
	});

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/lte', function () {
    return view('adminLTE');
});