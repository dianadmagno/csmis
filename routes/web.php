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

Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::put('user/password/{id}', ['as' => 'user.password', 'uses' => 'App\Http\Controllers\UserController@changePassword']);
	Route::put('user/photo/{id}', ['as' => 'user.photo', 'uses' => 'App\Http\Controllers\UserController@uploadPhoto']);
	Route::put('user/photo/remove/{id}', ['as' => 'user.photo.remove', 'uses' => 'App\Http\Controllers\UserController@removePhoto']);
	Route::get('user/deactivated', ['as' => 'user.deactivated', 'uses' => 'App\Http\Controllers\UserController@deactivated']);
	Route::get('subModule/{id}', ['as' => 'subModule.subIndex', 'uses' => 'App\Http\Controllers\References\SubModuleController@index']);
	Route::get('subModule/create/{id}', ['as' => 'sbModule.subCreate', 'uses' => 'App\Http\Controllers\References\SubModuleController@create']);
	Route::get('subject/{id}', ['as' => 'subject.subIndex', 'uses' => 'App\Http\Controllers\References\SubjectController@index']);
	Route::get('subject/create/{id}', ['as' => 'subject.create', 'uses' => 'App\Http\Controllers\References\SubjectController@create']);
	Route::get('event/{id}', ['as' => 'event.subIndex', 'uses' => 'App\Http\Controllers\References\EventController@index']);
	Route::get('event/create/{id}', ['as' => 'event.create', 'uses' => 'App\Http\Controllers\References\EventController@create']);
	Route::post('event/store/{id}', ['as' => 'event.store', 'uses' => 'App\Http\Controllers\References\EventController@store']);
	Route::delete('event/destroy/{id}', ['as' => 'event.destroy', 'uses' => 'App\Http\Controllers\References\EventController@destroy']);
	Route::put('event/edit/{id}', ['as' => 'event.edit', 'uses' => 'App\Http\Controllers\References\EventController@edit']);
	Route::put('user/restore/{id}', ['as' => 'user.restore', 'uses' => 'App\Http\Controllers\UserController@restore']);
	Route::resource('student', 'App\Http\Controllers\Transactions\StudentController', ['except' => ['show']]);
	Route::put('student/photo/{id}', ['as' => 'student.photo', 'uses' => 'App\Http\Controllers\Transactions\StudentController@uploadPhoto']);
	Route::get('student/academic/{id}', ['as' => 'student.academic', 'uses' => 'App\Http\Controllers\Transactions\StudentController@academic']);
	Route::get('student/nonacademic/{id}', ['as' => 'student.nonacademic', 'uses' => 'App\Http\Controllers\Transactions\StudentController@nonAcademic']);
	Route::get('student/nonacad/{studId}/{activityId}', ['as' => 'student.nonacad', 'uses' => 'App\Http\Controllers\Transactions\NonAcademicGradeController@index']);
	Route::post('nonacad/store/{studId}{eventId}', ['as' => 'nonacad.store', 'uses' => 'App\Http\Controllers\Transactions\NonAcademicGradeController@store']);
	Route::post('student/academic/{studentId}/{subjectId}', ['as' => 'student.academic.store', 'uses' => 'App\Http\Controllers\Transactions\StudentController@storeAcademicGrade']);
	Route::get('student/academic/input-grade/{studentId}/{subjectId}', ['as' => 'student.academic.input_grade', 'uses' => 'App\Http\Controllers\Transactions\StudentController@academicInputGrade']);
	Route::get('student/nonacademic/input-grade/{studentId}/{eventId}', ['as' => 'student.nonacademic.input_grade', 'uses' => 'App\Http\Controllers\Transactions\NonAcademicGradeController@create']);
	Route::get('student/academic/edit/{id}', ['as' => 'student.academic.edit', 'uses' => 'App\Http\Controllers\Transactions\StudentController@editAcademicGrade']);
	Route::put('student/academic/{id}', ['as' => 'student.academic.update', 'uses' => 'App\Http\Controllers\Transactions\StudentController@updateAcademicGrade']);
	Route::get('student/terminate/{id}', ['as' => 'student.terminate', 'uses' => 'App\Http\Controllers\Transactions\StudentController@terminate']);
	Route::put('student/terminate/{id}', ['as' => 'student.terminate.store', 'uses' => 'App\Http\Controllers\Transactions\StudentController@storeTermination']);
	Route::get('student/add-class/{id}', ['as' => 'student.class.add', 'uses' => 'App\Http\Controllers\Transactions\StudentController@addClass']);
	Route::post('student/store-class/{id}', ['as' => 'student.class.store', 'uses' => 'App\Http\Controllers\Transactions\StudentController@storeClass']);
	Route::resource('role', 'App\Http\Controllers\RoleController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
	Route::get('map', function () {return view('pages.maps');})->name('map');
	Route::get('icons', function () {return view('pages.icons');})->name('icons'); 
	Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::get('class/module/{id}', ['as' => 'module.class', 'uses' => 'App\Http\Controllers\References\ModuleController@getModulePerClass']);
	Route::get('assign/module/{id}', ['as' => 'assign.module', 'uses' => 'App\Http\Controllers\References\ModuleController@assignModule']);
	Route::post('assigned/module/{id}', ['as' => 'assigned.module', 'uses' => 'App\Http\Controllers\References\ModuleController@assignedModule']);
	Route::get('assign/subModule/{id}', ['as' => 'assign.subModule', 'uses' => 'App\Http\Controllers\References\ModuleController@assignSubModule']);
	Route::get('assign/subjects/{id}', ['as' => 'assigned.subject', 'uses' => 'App\Http\Controllers\References\ModuleController@assignedSubjects']);
	Route::get('assign/instructor/{id}', ['as' => 'assigned.instructor', 'uses' => 'App\Http\Controllers\References\ModuleController@updateInstructor']);
	Route::post('add/instructor/{id}', ['as' => 'instructor.add', 'uses' => 'App\Http\Controllers\References\ModuleController@assignedInstructor']);
	Route::resource('personnel', 'App\Http\Controllers\Transactions\PersonnelController', ['except' => ['show']]);
	Route::get('assign/class/{id}', ['as' => 'assign.class', 'uses' => 'App\Http\Controllers\Transactions\PersonnelController@assignClass']);
	Route::post('assign/class/{id}', ['as' => 'assign.class.store', 'uses' => 'App\Http\Controllers\Transactions\PersonnelController@storeAssignClass']);
	Route::get('assigned/classes/{id}', ['as' => 'assigned.classes', 'uses' => 'App\Http\Controllers\Transactions\PersonnelController@assignedClasses']);
	Route::resource('class', 'App\Http\Controllers\Transactions\StudentClassController', ['except' => ['show']]);
	Route::get('assigned/personnels/{id}', ['as' => 'assigned.personnels', 'uses' => 'App\Http\Controllers\Transactions\StudentClassController@assignedPersonnels']);
	Route::get('assign/personnel/{id}', ['as' => 'assign.personnel', 'uses' => 'App\Http\Controllers\Transactions\StudentClassController@assignPersonnel']);
	Route::post('assign/personnel/{id}', ['as' => 'assign.personnel.store', 'uses' => 'App\Http\Controllers\Transactions\StudentClassController@storeAssignPersonnel']);
	Route::delete('assign/personnel/remove/{id}', ['as' => 'assign.personnel.destroy', 'uses' => 'App\Http\Controllers\Transactions\StudentClassController@removeAssignedPersonnel']);
	Route::get('assigned/activities/{id}', ['as' => 'assigned.activities', 'uses' => 'App\Http\Controllers\Transactions\StudentClassController@assignedActivities']);
	Route::post('assign/activity/{id}', ['as' => 'assign.activity.store', 'uses' => 'App\Http\Controllers\Transactions\StudentClassController@storeAssignActivity']);
	Route::get('assign/activity/{id}', ['as' => 'assign.activity', 'uses' => 'App\Http\Controllers\Transactions\StudentClassController@assignActivity']);
	Route::get('class/squad-run/{classId}/{activityId}', ['as' => 'class.squadrun', 'uses' => 'App\Http\Controllers\Transactions\StudentClassController@squadRun']);
	Route::post('class/squad-run/{classId}/{activityId}', ['as' => 'class.squadrun.store', 'uses' => 'App\Http\Controllers\Transactions\StudentClassController@storeSquadRun']);
	Route::get('class/squad-run/edit/{classId}/{activityId}', ['as' => 'class.squadrun.edit', 'uses' => 'App\Http\Controllers\Transactions\StudentClassController@editSquadRun']);
	Route::put('class/squad-run/update/{classId}/{activityId}', ['as' => 'class.squadrun.update', 'uses' => 'App\Http\Controllers\Transactions\StudentClassController@updateRun']);

	//References
	Route::resource('ranks', 'App\Http\Controllers\References\RankController', ['except' => ['show']]);
	Route::resource('type', 'App\Http\Controllers\References\EnlistmentTypeController', ['except' => ['show']]);
	Route::resource('bloodType', 'App\Http\Controllers\References\BloodTypeController', ['except' => ['show']]);
	Route::resource('religion', 'App\Http\Controllers\References\ReligionController', ['except' => ['show']]);
	Route::resource('unit', 'App\Http\Controllers\References\UnitController', ['except' => ['show']]);
	Route::resource('vaccineName', 'App\Http\Controllers\References\VaccineNameController', ['except' => ['show']]);
	Route::resource('module', 'App\Http\Controllers\References\ModuleController', ['except' => ['show']]);
	Route::resource('ethnicGroup', 'App\Http\Controllers\References\EthnicGroupController', ['except' => ['show']]);
	Route::resource('company', 'App\Http\Controllers\References\CompanyController', ['except' => ['show']]);
	Route::resource('sbModule', 'App\Http\Controllers\References\SubModuleController', ['except' => ['show']]);
	Route::resource('subjects', 'App\Http\Controllers\References\SubjectController', ['except' => ['show']]);
	Route::resource('personnelCategory', 'App\Http\Controllers\References\PersonnelCategoryController', ['except' => ['show']]);
	Route::resource('personnelType', 'App\Http\Controllers\References\PersonnelTypeController', ['except' => ['show']]);
	Route::resource('demeritReport', 'App\Http\Controllers\References\DemeritReportTypeController', ['except' => ['show']]);
	Route::resource('activity', 'App\Http\Controllers\References\ActivityController', ['except' => ['show']]);
	Route::resource('course', 'App\Http\Controllers\References\CourseController', ['except' => ['show']]);
});

