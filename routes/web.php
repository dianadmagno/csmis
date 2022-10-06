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
Route::get('student/create', ['as' => 'student.create', 'uses' => 'App\Http\Controllers\Transactions\StudentController@create']);
Route::post('student', ['as' => 'student.store', 'uses' => 'App\Http\Controllers\Transactions\StudentController@store']);

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
	Route::get('subject/edit/{id}/{subModId}', ['as' => 'subject.edit', 'uses' => 'App\Http\Controllers\References\SubjectController@edit']);
	Route::get('activity-event/{id}', ['as' => 'event.subIndex', 'uses' => 'App\Http\Controllers\References\ActivityEventController@index']);
	Route::get('activity-event/create/{id}', ['as' => 'event.create', 'uses' => 'App\Http\Controllers\References\ActivityEventController@create']);
	Route::post('activity-event/store/{id}', ['as' => 'event.store', 'uses' => 'App\Http\Controllers\References\ActivityEventController@store']);
	Route::delete('activity-event/destroy/{id}', ['as' => 'event.destroy', 'uses' => 'App\Http\Controllers\References\ActivityEventController@destroy']);
	Route::put('activity-event/edit/{id}', ['as' => 'event.edit', 'uses' => 'App\Http\Controllers\References\ActivityEventController@edit']);
	Route::put('user/restore/{id}', ['as' => 'user.restore', 'uses' => 'App\Http\Controllers\UserController@restore']);
	Route::put('student/photo/{id}', ['as' => 'student.photo', 'uses' => 'App\Http\Controllers\Transactions\StudentController@uploadPhoto']);
	Route::get('student/academic/{id}', ['as' => 'student.academic', 'uses' => 'App\Http\Controllers\Transactions\StudentController@academic']);
	Route::resource('student', 'App\Http\Controllers\Transactions\StudentController', ['except' => ['show', 'create', 'store']]);
	Route::post('student/academic/{studentId}/{subjectId}', ['as' => 'student.academic.store', 'uses' => 'App\Http\Controllers\Transactions\StudentController@storeAcademicGrade']);
	Route::get('student/individual/PDF/{studentId}', ['as' => 'student.individualPDF', 'uses' => 'App\Http\Controllers\Transactions\StudentController@individualPDF']);
	Route::get('student/list/PDF', ['as' => 'student.studentListPDF', 'uses' => 'App\Http\Controllers\Transactions\StudentController@studentListPDF']);
	Route::get('student/academic/input-grade/{studentId}/{subjectId}', ['as' => 'student.academic.input_grade', 'uses' => 'App\Http\Controllers\Transactions\StudentController@academicInputGrade']);
	Route::get('student/academic/edit/{id}', ['as' => 'student.academic.edit', 'uses' => 'App\Http\Controllers\Transactions\StudentController@editAcademicGrade']);
	Route::put('student/academic/{id}', ['as' => 'student.academic.update', 'uses' => 'App\Http\Controllers\Transactions\StudentController@updateAcademicGrade']);
	Route::get('student/nonacademics/{id}', ['as' => 'student.nonacademics', 'uses' => 'App\Http\Controllers\Transactions\StudentController@nonAcademics']);
	Route::get('student/nonacademics/events/{studentId}/{activityId}', ['as' => 'student.nonacademics.events', 'uses' => 'App\Http\Controllers\Transactions\StudentController@nonAcademicEvents']);
	Route::get('student/nonacademics/events/create/{studentId}/{eventId}', ['as' => 'student.nonacademiceventgrade.create', 'uses' => 'App\Http\Controllers\Transactions\StudentController@createNonAcademicEventGrade']);
	Route::post('student/nonacademics/events/{studentId}/{eventId}', ['as' => 'student.nonacademiceventgrade.store', 'uses' => 'App\Http\Controllers\Transactions\StudentController@storeNonAcademicEventGrade']);
	Route::get('student/nonacademics/sub-activities/{studentId}/{activityId}', ['as' => 'student.nonacademicsubactivity.index', 'uses' => 'App\Http\Controllers\Transactions\StudentController@nonAcademicSubActivity']);
	Route::get('student/nonacademics/sub-activities/events/{studentId}/{subActivityId}', ['as' => 'student.nonacademicsubactivityevents.index', 'uses' => 'App\Http\Controllers\Transactions\StudentController@nonAcademicSubActivityEvents']);
	Route::get('student/nonacademics/sub-activities/events/create/{studentId}/{eventId}', ['as' => 'student.nonacademicsubactivityevents.create', 'uses' => 'App\Http\Controllers\Transactions\StudentController@createNonAcademicSubActivityEvents']);
	Route::post('student/nonacademics/sub-activities/events/store/{studentId}/{eventId}', ['as' => 'student.nonacademicsubactivityevents.store', 'uses' => 'App\Http\Controllers\Transactions\StudentController@storeNonAcademicSubActivityEvents']);
	Route::get('student/nonacademics/sub-activities/events/edit/score/{id}', ['as' => 'student.nonacademicsubactivityevents.edit', 'uses' => 'App\Http\Controllers\Transactions\StudentController@editNonAcademicSubActivityEvents']);
	Route::put('student/nonacademics/sub-activities/events/update/{id}', ['as' => 'student.nonacademicsubactivityevents.update', 'uses' => 'App\Http\Controllers\Transactions\StudentController@updateNonAcademicSubActivityEvents']);
	Route::get('student/terminate/{id}', ['as' => 'student.terminate', 'uses' => 'App\Http\Controllers\Transactions\StudentController@terminate']);
	Route::put('student/terminate/{id}', ['as' => 'student.terminate.store', 'uses' => 'App\Http\Controllers\Transactions\StudentController@storeTermination']);
	Route::get('student/add-class/{id}', ['as' => 'student.class.add', 'uses' => 'App\Http\Controllers\Transactions\StudentController@addClass']);
	Route::post('student/store-class/{id}', ['as' => 'student.class.store', 'uses' => 'App\Http\Controllers\Transactions\StudentController@storeClass']);
	Route::get('student/vaccine/{id}', ['as' => 'student.vaccine', 'uses' => 'App\Http\Controllers\Transactions\StudentVaccineController@index']);
	Route::get('student/vaccine-create/{id}', ['as' => 'vaccine.create', 'uses' => 'App\Http\Controllers\Transactions\StudentVaccineController@create']);
	Route::post('student/vaccine-store/{id}', ['as' => 'vaccine.store', 'uses' => 'App\Http\Controllers\Transactions\StudentVaccineController@store']);
	Route::delete('student/vaccine-destroy/{id}', ['as' => 'vaccine.destroy', 'uses' => 'App\Http\Controllers\Transactions\StudentVaccineController@destroy']);
	Route::get('student/deliquency-report/{id}', ['as' => 'student.drIndex', 'uses' => 'App\Http\Controllers\Transactions\StudentDeliquencyReportController@index']);
	Route::resource('role', 'App\Http\Controllers\RoleController', ['except' => ['show']]);
	Route::get('student/deliquency-report-create/{id}', ['as' => 'student.drCreate', 'uses' => 'App\Http\Controllers\Transactions\StudentDeliquencyReportController@create']);
	Route::post('student/deliquency-report-store/{id}', ['as' => 'student.drStore', 'uses' => 'App\Http\Controllers\Transactions\StudentDeliquencyReportController@store']);
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
	Route::get('personnel/list/PDF', ['as' => 'personnel.listPDF', 'uses' => 'App\Http\Controllers\Transactions\PersonnelController@personnelListPDF']);
	Route::get('assign/class/{id}', ['as' => 'assign.class', 'uses' => 'App\Http\Controllers\Transactions\PersonnelController@assignClass']);
	Route::post('assign/class/{id}', ['as' => 'assign.class.store', 'uses' => 'App\Http\Controllers\Transactions\PersonnelController@storeAssignClass']);
	Route::get('assigned/classes/{id}', ['as' => 'assigned.classes', 'uses' => 'App\Http\Controllers\Transactions\PersonnelController@assignedClasses']);
	Route::resource('class', 'App\Http\Controllers\Transactions\StudentClassController', ['except' => ['show']]);
	Route::get('class/list/PDF', ['as' => 'class.listPDF', 'uses' => 'App\Http\Controllers\Transactions\StudentClassController@classListPDF']);
	Route::get('assigned/personnels/{id}', ['as' => 'assigned.personnels', 'uses' => 'App\Http\Controllers\Transactions\StudentClassController@assignedPersonnels']);
	Route::get('assign/personnel/{id}', ['as' => 'assign.personnel', 'uses' => 'App\Http\Controllers\Transactions\StudentClassController@assignPersonnel']);
	Route::post('assign/personnel/{id}', ['as' => 'assign.personnel.store', 'uses' => 'App\Http\Controllers\Transactions\StudentClassController@storeAssignPersonnel']);
	Route::delete('assign/personnel/remove/{id}', ['as' => 'assign.personnel.destroy', 'uses' => 'App\Http\Controllers\Transactions\StudentClassController@removeAssignedPersonnel']);
	Route::get('assigned/activities/{id}', ['as' => 'assigned.activities', 'uses' => 'App\Http\Controllers\Transactions\StudentClassController@assignedActivities']);
	Route::post('assign/activity/{id}', ['as' => 'assign.activity.store', 'uses' => 'App\Http\Controllers\Transactions\StudentClassController@storeAssignActivity']);
	Route::get('assign/activity/{id}', ['as' => 'assign.activity', 'uses' => 'App\Http\Controllers\Transactions\StudentClassController@assignActivity']);
	Route::get('class/non-academic/{classActivityId}', ['as' => 'class.nonacademic', 'uses' => 'App\Http\Controllers\Transactions\StudentClassController@nonAcademics']);
	Route::post('class/non-academic/{classActivityId}', ['as' => 'class.nonacademic.store', 'uses' => 'App\Http\Controllers\Transactions\StudentClassController@storeNonAcademic']);
	Route::get('class/non-academic/edit/{classId}/{activityId}', ['as' => 'class.nonacademic.edit', 'uses' => 'App\Http\Controllers\Transactions\StudentClassController@editNonAcademic']);
	Route::put('class/non-academic/update/{classId}/{activityId}', ['as' => 'class.nonacademic.update', 'uses' => 'App\Http\Controllers\Transactions\StudentClassController@updateNonAcademic']);

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
	Route::resource('vaccineType', 'App\Http\Controllers\References\VaccineTypeController', ['except' => ['show']]);
	Route::get('sub-activity/create/{id}', ['as' => 'sub-activity.create', 'uses' => 'App\Http\Controllers\References\SubActivityController@create']);
	Route::get('sub-activity/{id}', ['as' => 'sub-activity.index', 'uses' => 'App\Http\Controllers\References\SubActivityController@index']);
	Route::post('sub-activity/store/{id}', ['as' => 'sub-activity.store', 'uses' => 'App\Http\Controllers\References\SubActivityController@store']);
	Route::get('sub-activity-event/{id}', ['as' => 'sub-activity-event.index', 'uses' => 'App\Http\Controllers\References\SubActivityEventController@index']);
	Route::get('sub-activity-event/create/{id}', ['as' => 'sub-activity-event.create', 'uses' => 'App\Http\Controllers\References\SubActivityEventController@create']);
	Route::post('sub-activity-event/store/{id}', ['as' => 'sub-activity-event.store', 'uses' => 'App\Http\Controllers\References\SubActivityEventController@store']);
	Route::resource('islandGroup', 'App\Http\Controllers\References\IslandGroupController', ['except' => ['show']]);
	Route::resource('collegeCourse', 'App\Http\Controllers\References\CollegeCourseController', ['except' => ['show']]);
	Route::resource('licenseExam', 'App\Http\Controllers\References\LicenseExamController', ['except' => ['show']]);
	Route::resource('region', 'App\Http\Controllers\References\RegionController', ['except' => ['show']]);

	// Reports
	Route::get('reports', ['as' => 'reports.report', 'uses' => 'App\Http\Controllers\Reports\ReportsController@index']);
	Route::post('reports/generate', ['as' => 'report.generate', 'uses' => 'App\Http\Controllers\Reports\ReportsController@index']);
});

