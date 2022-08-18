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
	Route::put('student/photo/{id}', ['as' => 'student.photo', 'uses' => 'App\Http\Controllers\Transactions\StudentController@uploadPhoto']);
	Route::resource('role', 'App\Http\Controllers\RoleController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
	Route::get('map', function () {return view('pages.maps');})->name('map');
	Route::get('icons', function () {return view('pages.icons');})->name('icons'); 
	Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::resource('personnel', 'App\Http\Controllers\Transactions\PersonnelController', ['except' => ['show']]);

	//References
	Route::resource('ranks', 'App\Http\Controllers\References\RankController', ['except' => ['show']]);
	Route::resource('class', 'App\Http\Controllers\References\StudentClassController', ['except' => ['show']]);
	Route::resource('type', 'App\Http\Controllers\References\EnlistmentTypeController', ['except' => ['show']]);
	Route::resource('bloodType', 'App\Http\Controllers\References\BloodTypeController', ['except' => ['show']]);
	Route::resource('religion', 'App\Http\Controllers\References\ReligionController', ['except' => ['show']]);
	Route::resource('unit', 'App\Http\Controllers\References\UnitController', ['except' => ['show']]);
	Route::resource('vaccineName', 'App\Http\Controllers\References\VaccineNameController', ['except' => ['show']]);
	Route::resource('module', 'App\Http\Controllers\References\ModuleController', ['except' => ['show']]);
	Route::resource('ethnicGroup', 'App\Http\Controllers\References\EthnicGroupController', ['except' => ['show']]);
	Route::resource('company', 'App\Http\Controllers\References\CompanyController', ['except' => ['show']]);
	Route::resource('subModule', 'App\Http\Controllers\References\SubModuleController', ['except' => ['show']]);
	Route::resource('subject', 'App\Http\Controllers\References\SubjectController', ['except' => ['show']]);
	Route::resource('personnelCategory', 'App\Http\Controllers\References\PersonnelCategoryController', ['except' => ['show']]);
	Route::resource('personnelType', 'App\Http\Controllers\References\PersonnelTypeController', ['except' => ['show']]);
	Route::resource('demeritReport', 'App\Http\Controllers\References\DemeritReportTypeController', ['except' => ['show']]);
});

