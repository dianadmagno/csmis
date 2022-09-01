<?php

namespace App\Http\Controllers\Transactions;

use Illuminate\Http\Request;
use App\Models\References\Event;
use Illuminate\Routing\Controller;
use App\Models\References\Activity;
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
        $nonAcad = Event::where('activity_id', $activityId)->paginate(10);
        $activity = Activity::find($activityId);
        return view('transactions.students.nonacad', [
            'events' => $nonAcad,
            'student' => Student::find($studId),
            'activity' => $activity
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($studentId, $eventId)
    {
        return view('transactions.students.create_nonacademic_grade', [
            'student' => Student::find($studentId),
            'event' => Event::find($eventId)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $studId, $eventId)
    {
        $event = Event::find($eventId);
        $student = Student::find($studId);
        $m = 70;
        if ($student->age < 35 && $student->sex == 1) {
            for($n = 41; $n <= 80; $n++) {
                var_dump($m+=2, $n);
            }
        }
        return;
        NonAcademicGrade::create([
            'student_id' => $studId,
            'event_id' => $eventId,
            'grades' => $request->grade,
        ]);
        return redirect()->route('student.nonacad', [$studId, $event->activity_id])->with('status', 'Grade Submitted Successfully');
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
