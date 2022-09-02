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
        $totalAllocatedPoints = NonAcademicGrade::where('student_id', $studId)->where('activity_id', $activityId);
        if ($activity->id != 4) {
            $total = $totalAllocatedPoints->sum('average') ? $totalAllocatedPoints->sum('average') / count($totalAllocatedPoints->get()) : '';
        } else {
            $total = $totalAllocatedPoints->sum('average') ? $totalAllocatedPoints->sum('average') + count($totalAllocatedPoints->get()) : '';
        }

        return view('transactions.students.nonacad', [
            'events' => $nonAcad,
            'student' => Student::find($studId),
            'activity' => $activity,
            'totalAllocatedPoints' => $total
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
        $average = $request->average / 5 / 10 * 100;
        if ($event->id == 10) {
            $total = $average * .50;
        } elseif ($event->id == 11 || $event->id == 12) {
            $total = $average * .25;
        } else {
            $total = $request->average;
        }
        NonAcademicGrade::create([
            'student_id' => $studId,
            'event_id' => $eventId,
            'average' => $total,
            'activity_id' => $event->activity_id
        ]);
        return redirect()->route('student.nonacad', [$studId, $event->activity_id])->with('status', 'Average Submitted Successfully');
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
