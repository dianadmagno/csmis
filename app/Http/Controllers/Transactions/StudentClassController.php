<?php

namespace App\Http\Controllers\Transactions;

use Illuminate\Http\Request;
use App\Models\References\Course;
use App\Models\References\Activity;
use App\Http\Controllers\Controller;
use App\Models\Transactions\Personnel;
use App\Models\Transactions\StudentClass;
use App\Models\Transactions\ClassActivity;
use App\Models\Transactions\PersonnelClass;
use App\Http\Requests\Transactions\StudentClassRequest;

class StudentClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        return view('transactions.class.index', [
            'classes' => StudentClass::where('name', 'LIKE', '%'.$keyword.'%')
                        ->orWhereHas('course', function($query) use($keyword) {
                            $query->where('name', 'like', '%'.$keyword.'%')
                                ->orWhere('description', 'like', '%'.$keyword.'%');
                        })
                        ->orWhere('alias', 'LIKE', '%'.$keyword.'%')
                        ->orWhere('description', 'LIKE', '%'.$keyword.'%')
                        ->latest()
                        ->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transactions.class.create', [
            'courses' => Course::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentClassRequest $request)
    {
        $course = Course::find($request->course_id);
        StudentClass::create([
            'name' => $request->name,
            'alias' => $request->alias,
            'course_id' => $request->course_id,
            'graduation_date' => $request->graduation_date,
            'description' => $course->name.' Class '.$request->name
        ]);
        return redirect()->route('class.index')->with('status', 'Class Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentClass  $studentClass
     * @return \Illuminate\Http\Response
     */
    public function show(StudentClass $studentClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentClass  $studentClass
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentClass $studentClass, $id)
    {
        return view('transactions.class.edit', [
            'class' => StudentClass::find($id),
            'courses' => Course::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentClass  $studentClass
     * @return \Illuminate\Http\Response
     */
    public function update(StudentClassRequest $request, $id)
    {
        $course = Course::find($request->course_id);
        $data = StudentClass::find($id);
        $data->update([
            'name' => $request->name,
            'alias' => $request->alias,
            'course_id' => $request->course_id,
            'graduation_date' => $request->graduation_date,
            'description' => $course->name.' Class '.$request->name
        ]);
        $class = StudentClass::paginate(10);
        return redirect()->route('class.index')->with('status', 'Class successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentClass  $studentClass
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = StudentClass::find($id);
        $id->delete();
        return back()->with('status', 'Class Archived Successfully');
    }

    public function assignedPersonnels(Request $request, $id)
    {
        $keyword = $request->keyword;
        $class = StudentClass::find($id);
        $personnels = Personnel::whereHas('personnelClasses', function($query) use($id, $keyword) {
            $query->where('class_id', $id)
                ->where('lastname', 'like', '%'.$keyword.'%')
                ->orWhere('firstname', 'like', '%'.$keyword.'%')
                ->where('class_id', $id)
                ->orWhere('middlename', 'like', '%'.$keyword.'%')
                ->where('class_id', $id);
        })->paginate(10);
        return view('transactions.class.assigned_personnels', [
            'class' => $class,
            'personnels' => $personnels
        ]);
    }

    public function assignPersonnel($id)
    {
        $class = StudentClass::find($id);
        $personnels = Personnel::all();
        return view('transactions.class.assign_personnel', [
            'class' => $class,
            'personnels' => $personnels
        ]);
    }

    public function storeAssignPersonnel(Request $request, $id)
    {
        $personnelClass = PersonnelClass::where('class_id', $id)->where('personnel_id', $request->personnel_id)->first();
        if ($personnelClass) {
            return back()->with('status', 'Personnel already assigned to this class');
        }
        PersonnelClass::create([
            'personnel_id' => $request->personnel_id,
            'class_id' => $id
        ]);
        return redirect()->route('assigned.personnels', $id)->with('status', 'Personnel Assigned Successfully');
    }

    public function removeAssignedPersonnel($id)
    {
        PersonnelClass::where('personnel_id', $id)->delete();
        return back()->with('status', 'Personnel Removed Successfully');
    }

    public function assignedActivities(Request $request, $id)
    {
        $class = StudentClass::find($id);
        $keyword = $request->keyword;
        $classActivities = ClassActivity::where('class_id', $id)->paginate(10);
        return view('transactions.class.assigned_activities', [
            'class' => $class,
            'classActivities' => $classActivities
        ]);
    }

    public function assignActivity($id)
    {
        $class = StudentClass::find($id);
        $activities = Activity::all();
        return view('transactions.class.assign_activity', [
            'class' => $class,
            'activities' => $activities
        ]);
    }

    public function storeAssignActivity(Request $request, $id)
    {
        ClassActivity::create([
            'class_id' => $id,
            'activity_id' => $request->activity_id
        ]);
        return redirect()->route('assigned.activities', $id)->with('status', 'Activity Assigned Successfully');
    }
}
