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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::put('user/password/{id}', ['as' => 'user.password', 'uses' => 'App\Http\Controllers\UserController@changePassword']);
	Route::put('user/photo/{id}', ['as' => 'user.photo', 'uses' => 'App\Http\Controllers\UserController@uploadPhoto']);
	Route::put('user/photo/remove/{id}', ['as' => 'user.photo.remove', 'uses' => 'App\Http\Controllers\UserController@removePhoto']);
	Route::get('user/deactivated', ['as' => 'user.deactivated', 'uses' => 'App\Http\Controllers\UserController@deactivated']);
	Route::put('user/restore/{id}', ['as' => 'user.restore', 'uses' => 'App\Http\Controllers\UserController@restore']);
	Route::resource('student', 'App\Http\Controllers\Transactions\StudentController', ['except' => ['show']]);
	Route::resource('role', 'App\Http\Controllers\RoleController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
	Route::get('map', function () {return view('pages.maps');})->name('map');
	Route::get('icons', function () {return view('pages.icons');})->name('icons'); 
	Route::get('table-list', function () {return view('pages.tables');})->name('table');

	//References
	Route::resource('ranks', 'App\Http\Controllers\RankController', ['except' => ['show']]);
	Route::resource('class', 'App\Http\Controllers\StudentClassController', ['except' => ['show']]);
	Route::resource('type', 'App\Http\Controllers\StudentTypeController', ['except' => ['show']]);
	Route::resource('bloodType', 'App\Http\Controllers\BloodTypeController', ['except' => ['show']]);
	Route::resource('religion', 'App\Http\Controllers\ReligionController', ['except' => ['show']]);
});

