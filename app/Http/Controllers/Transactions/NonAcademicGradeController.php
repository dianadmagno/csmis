<?php

namespace App\Http\Controllers\Transactions;

use Illuminate\Http\Request;
use App\Models\References\Event;
use Illuminate\Routing\Controller;
use App\Models\Transactions\Student;
use App\Models\Transactions\NonAcademicGrade;
use App\Models\Transactions\ClassSubjectInstructor;

class NonAcademicGradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $studId, $activityId)
    {
        $nonAcad = NonAcademicGrade::join('rf_events', 'rf_events.id', '=', 'tr_non_academic_grades.event_id')
                        ->where('student_id', $studId)
                        ->where('event_id', $activityId)
                        ->paginate(10);

        return view('transactions.students.nonacad', [
            'events' => $nonAcad,
            'student' => Student::find($studId),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $studId, $eventId)
    {
        NonAcademicGrade::create([
            'student_id' => $studId,
            'event_id' => $eventId,
            'grades' => $request->grades,
            'remarks' => $request->remarks
        ]);
        return redirect()->route('nonacad.index', [
            'non_acad' => NonAcademicGrade::find($studId)
        ])->with('status', 'Added Grade and Remarks Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transactions\NonAcademicGrade  $nonAcademicGrade
     * @return \Illuminate\Http\Response
     */
    public function show(NonAcademicGrade $nonAcademicGrade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transactions\ClassSubjectInstructor  $classSubjectInstructor
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassSubjectInstructor $classSubjectInstructor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transactions\ClassSubjectInstructor  $classSubjectInstructor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NonAcademicGrade $nonAcademicGrade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transactions\ClassSubjectInstructor  $classSubjectInstructor
     * @return \Illuminate\Http\Response
     */
    public function destroy(NonAcademicGrade $nonAcademicGrade)
    {
        //
    }
}
