<?php

namespace App\Http\Controllers\Transactions;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\References\Rank;
use App\Models\References\Unit;
use App\Models\References\Course;
use App\Models\References\Region;
use App\Models\References\Company;
use App\Models\References\Subject;
use Illuminate\Support\Facades\DB;
use App\Models\References\Activity;
use App\Models\References\Religion;
use App\Http\Controllers\Controller;
use App\Models\References\BloodType;
use App\Models\Transactions\Student;
use App\Models\References\EthnicGroup;
use App\Models\References\IslandGroup;
use App\Models\References\SubActivity;
use App\Models\References\VaccineName;
use App\Models\References\LiscenseExam;
use App\Models\References\ActivityEvent;
use App\Models\References\CollegeCourse;
use App\Http\Requests\UploadPhotoRequest;
use App\Models\References\EnlistmentType;
use App\Models\Transactions\StudentClass;
use App\Models\Transactions\AcademicGrade;
use App\Models\References\SubActivityEvent;
use App\Models\Transactions\StudentClasses;
use App\Models\Transactions\ActivityAverage;
use App\Models\Transactions\EventAverageScore;
use App\Models\Transactions\SubActivityAverage;
use App\Http\Requests\Transactions\StudentRequest;
use App\Models\Transactions\ClassSubjectInstructor;
use App\Http\Requests\Transactions\AcademicGradeRequest;
use PDF;
use Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        return view('transactions.students.index', [
            'students' => Student::where('lastname', 'like', '%'.$keyword.'%')
                                ->orWhere('firstname', 'like', '%'.$keyword.'%')
                                ->orWhere('middlename', 'like', '%'.$keyword.'%')
                                ->orWhereHas('company', function($query) use($keyword) {
                                    $query->where('description', 'like', '%'.$keyword.'%');
                                })
                                ->orWhereHas('studentClasses', function($query) use($keyword) {
                                    $query->whereHas('class', function($query) use($keyword) {
                                        $query->where('description', 'like', '%'.$keyword.'%');
                                    });
                                })
                                ->paginate(10)
        ]);
    }

    public function classListPDF()
    {
        
        $student = Student::all();
       
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bloodTypes = BloodType::all();
        $religions = Religion::all();
        $ranks = Rank::all();
        $enlistmentTypes = EnlistmentType::all();
        $studentClasses = StudentClass::where('graduation_date', '<=', Carbon::parse()->format('Y-m-d'))->orWhereNull('graduation_date')->get();
        $units = Unit::all();
        $ethnicGroups = EthnicGroup::all();
        $companies = Company::all();
        $vaccines = VaccineName::all();
        $courses = Course::all();
        $collegeCourses = CollegeCourse::all();
        $regions = Region::all();
        $liscenseExams = LiscenseExam::all();
        $islandGroups = IslandGroup::all();
        return view('transactions.students.create', [
            'bloodTypes' => $bloodTypes,
            'religions' => $religions,
            'ranks' => $ranks,
            'enlistmentTypes' => $enlistmentTypes,
            'studentClasses' => $studentClasses,
            'units' => $units,
            'ethnicGroups' => $ethnicGroups,
            'companies' => $companies,
            'vaccines' => $vaccines,
            'courses' => $courses,
            'collegeCourses' => $collegeCourses,
            'regions' => $regions,
            'liscenseExams' => $liscenseExams,
            'islandGroups' => $islandGroups
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        $student = Student::create($request->all());
        StudentClasses::create([
            'student_id' => $student->id,
            'class_id' => $request->class_id
        ]);
        return redirect()->route('student.index')->with('status', 'Student Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bloodTypes = BloodType::all();
        $religions = Religion::all();
        $ranks = Rank::all();
        $enlistmentTypes = EnlistmentType::all();
        $studentClasses = StudentClass::where('graduation_date', '<=', Carbon::now())->orWhereNull('graduation_date')->get();
        $units = Unit::all();
        $ethnicGroups = EthnicGroup::all();
        $companies = Company::all();
        $student = Student::find($id);
        $linkId = $id;
        $courses = Course::all();
        $collegeCourses = CollegeCourse::all();
        $regions = Region::all();
        $liscenseExams = LiscenseExam::all();
        $islandGroups = IslandGroup::all();
        return view('transactions.students.edit', [
            'bloodTypes' => $bloodTypes,
            'religions' => $religions,
            'ranks' => $ranks,
            'enlistmentTypes' => $enlistmentTypes,
            'studentClasses' => $studentClasses,
            'units' => $units,
            'ethnicGroups' => $ethnicGroups,
            'companies' => $companies,
            'student' => $student,
            'courses' => $courses,
            'collegeCourses' => $collegeCourses,
            'regions' => $regions,
            'liscenseExams' => $liscenseExams,
            'linkId' => $linkId,
            'islandGroup' => $islandGroups
        ]);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, $id)
    {
        $student = Student::find($id);
        $student->update($request->all());
        return redirect()->route('student.edit', $id)->with('status', 'Student Updated Successfully');
    }

    // Generate PDF
    public function individualPDF($id) {
        // retreive all records from db
        $bloodTypes = BloodType::all();
        $religions = Religion::all();
        $ranks = Rank::all();
        $enlistmentTypes = EnlistmentType::all();
        $studentClasses = StudentClass::where('graduation_date', '<=', Carbon::now())->orWhereNull('graduation_date')->get();
        $units = Unit::all();
        $ethnicGroups = EthnicGroup::all();
        $companies = Company::all();
        $students = Student::where('id',$id)->get();
        $courses = Course::all();
        $collegeCourses = CollegeCourse::all();
        $regions = Region::all();
        $liscenseExams = LiscenseExam::all();
        $islandGroups = IslandGroup::all();




        view()->share('students', $students);
        $pdf = PDF::loadView('reports.reportsPDF.studentIndividual', compact('students'));
        
        return $pdf->setPaper("a4")->stream('pdf_file.pdf');


       
      }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function uploadPhoto(UploadPhotoRequest $request, $id)
    {
        $student = Student::find($id);
        if ($request->photo) {
            switch ($request->input('action')) {
                case 'upload':
                    $photo = $student->id.'_'.time().'.'.$request->photo->getClientOriginalExtension();
    
                    if ($student->photo) {
                        if (file_exists(public_path('/student images/'.$student->photo))) {
                            unlink(public_path('/student images/'.$student->photo));
                        }
                    }
    
                    $request->photo->move(public_path('student images'), $photo);
                    $student->update([
                        'photo' => $photo
                    ]);
                    return back()->with('status', 'Student Photo Uploaded Successfully');
                    break;
                
                case 'remove':
                    unlink(public_path('/student images/'.$student->photo));
                    $student->update([
                        'photo' => null
                    ]);
                    return back()->with('status', 'Student Photo Removed Successfully');
                    break;
            }
        } else {
            return back()->with('error', 'Please choose a file before upload');
        }
    }

    public function academic(Request $request, $id)
    {
        $keyword = $request->keyword;
        $student = Student::find($id);
        $classId = $student->studentClasses()->latest()->pluck('class_id')->first();
        $classSubjectInstructors = ClassSubjectInstructor::where('class_id', $student->studentClasses()->latest()->pluck('class_id')->first())
                                                        ->whereHas('subject', function($query) use($keyword) {
                                                            $query->where('name', 'like', '%'.$keyword.'%')
                                                                ->orWhere('description', 'like', '%'.$keyword.'%');
                                                        })
                                                        ->paginate(10);
        return view('transactions.students.academic', [
            'classSubjectInstructors' => $classSubjectInstructors,
            'student' => $student,
            'totalAllocatedPoints' => AcademicGrade::where('student_id', $student->id)
                                                ->whereHas('classSubjectInstructor', function($query) use($classId) {
                                                    $query->where('class_id', $classId);
                                                })
                                                ->sum('allocated_points')
        ]);
    }

    public function academicInputGrade($studentId, $subjectId)
    {
        $student = Student::find($studentId);
        $subject = Subject::find($subjectId);
        return view('transactions.students.create_academic_grade', [
            'student' => $student,
            'subject' => $subject
        ]);
    }

    public function storeAcademicGrade(AcademicGradeRequest $request, $studentId, $subjectId)
    {
        $subject = Subject::find($subjectId);
        if ($request->grade > $subject->nr_of_items) {
            return back()->with('status', 'You cannot input grade more than the number of items');
        }
        $average = $request->grade / $subject->nr_of_items * 100;
        AcademicGrade::create([
            'student_id' => $studentId,
            'subject_id' => $subjectId,
            'average' => $average,
            'grade' => $request->grade,
            'allocated_points' => round($average / 100 * $subject->nr_of_points, 0)
        ]);

        $totalAcademicGrade = AcademicGrade::where('student_id', $studentId)->sum('allocated_points');
        $totalNonAcademicGrade = ActivityAverage::where('student_id', $studentId)->sum('total_points');

        Student::find($studentId)->update([
            'gwa' => round($totalAcademicGrade + $totalNonAcademicGrade, 0)
        ]);
        return redirect()->route('student.academic', $studentId)->with('status', 'Grade Submitted Successfully');
    }

    public function editAcademicGrade($id)
    {
        $AcademicGrade = AcademicGrade::find($id);
        return view('transactions.students.edit_academic_grade', [
            'AcademicGrade' => $AcademicGrade
        ]);
    }

    public function updateAcademicGrade(AcademicGradeRequest $request, $id)
    {
        $AcademicGrade = AcademicGrade::find($id);
        $subject = Subject::find($AcademicGrade->subject_id);
        if ($request->grade > $AcademicGrade->subject->nr_of_items) {
            return back()->with('status', 'You cannot update grade more than the number of items');
        }
        $AcademicGrade->update([
            'grade' => $request->grade
        ]);
        return redirect()->route('student.academic', $AcademicGrade->student_id)->with('status', 'Grade Updated Successfully'); 
    }

    public function nonAcademics(Request $request, $id)
    {
        $student = Student::find($id);
        $keyword = $request->keyword;
        $conduct = Activity::where('id', 1)->first();
        return view('transactions.students.nonacademics', [
            'student' => $student,
            'activities' => Activity::whereHas('classActivities', function($query) use($student) {
                $query->where('class_id', $student->studentClasses()->latest()->pluck('class_id')->first());
            })->where('name', 'like', '%'.$keyword.'%')->where('performance_type', 1)->orWhere('description', 'like', '%'.$keyword.'%')->where('performance_type', 1)->paginate(10),
            'totalPoints' => ActivityAverage::where('student_id', $id)->sum('total_points') + $conduct->nr_of_points
        ]);
    }

    public function nonAcademicEvents(Request $request, $studentId, $activityId)
    {
        $keyword = $request->keyword;
        return view('transactions.students.non_academic_events', [
            'student' => Student::find($studentId),
            'activity' => Activity::find($activityId),
            'events' => ActivityEvent::where('activity_id', $activityId)
                            ->where('name', 'like', '%'.$keyword.'%')
                            ->orWhere('description', 'like', '%'.$keyword.'%')
                            ->where('activity_id', $activityId)
                            ->paginate(10)
        ]);
    }

    public function createNonAcademicEventGrade($studentId, $eventId)
    {
        return view('transactions.students.create_non_academic_event_grade', [
            'student' => Student::find($studentId),
            'event' => ActivityEvent::find($eventId)
        ]);
    }

    public function storeNonAcademicEventGrade(Request $request, $studentId, $eventId)
    {
        $student = Student::find($studentId);
        $event = ActivityEvent::find($eventId);

        EventAverageScore::create([
            'student_id' => $studentId,
            'activity_event_id' => $eventId,
            'score' => $request->score,
            'average' => $event->percentage ? $request->score * ('.'.$event->percentage) : null
        ]);

        $eventAverageScore = EventAverageScore::where('student_id', $student->id)
                                                ->whereHas('activityEvent', function($query) use($event) {
                                                    $query->where('activity_id', $event->activity_id);
                                                });

        $hasActivityAverage = ActivityAverage::where('student_id', $studentId)->where('activity_id', $event->activity_id)->first();
        if(!$hasActivityAverage) {
            ActivityAverage::create([
                'student_id' => $studentId,
                'activity_id' => $event->activity_id,
                'average' => $event->percentage ? round($eventAverageScore->sum('average'), 0) : round($eventAverageScore->sum('score') / $eventAverageScore->count(), 0),
                'total_points' => $event->percentage ? round(($eventAverageScore->sum('average')) / 100 * $event->activity->nr_of_points, 0) : round(($eventAverageScore->sum('score') / $eventAverageScore->count()) / 100 * $event->activity->nr_of_points, 0)
            ]);
        }

        ActivityAverage::where('student_id', $studentId)->where('activity_id', $event->activity_id)->update([
            'student_id' => $studentId,
            'activity_id' => $event->activity_id,
            'average' => $event->percentage ? round($eventAverageScore->sum('average'), 0) : round($eventAverageScore->sum('score') / $eventAverageScore->count(), 0),
            'total_points' => $event->percentage ? round(($eventAverageScore->sum('average')) / 100 * $event->activity->nr_of_points, 0) : round(($eventAverageScore->sum('score') / $eventAverageScore->count()) / 100 * $event->activity->nr_of_points, 0)
        ]);

        $totalAcademicGrade = AcademicGrade::where('student_id', $studentId)->sum('allocated_points');
        $totalNonAcademicGrade = ActivityAverage::where('student_id', $studentId)->sum('total_points');

        Student::find($studentId)->update([
            'gwa' => round($totalAcademicGrade + $totalNonAcademicGrade, 0)
        ]);

        return redirect()->route('student.nonacademics.events', [$studentId, $event->activity_id])->with('status', 'Event Scored Successfully');
    }

    public function terminate($id)
    {
        $student = Student::find($id);
        return view('transactions.students.terminate', [
            'student' => $student
        ]);
    }

    public function storeTermination(Request $request, $id)
    {
        Student::find($id)->update([
            'termination_remarks' => $request->termination_remarks
        ]);
        return redirect()->route('student.index')->with('status', 'Student Terminated Successfully');
    }

    public function addClass($id)
    {
        return view('transactions.students.add_class', [
            'student' => Student::find($id),
            'classes' => StudentClass::where('graduation_date', '<=', Carbon::parse()->format('Y-m-d'))->orWhereNull('graduation_date')->get()
        ]);
    }

    public function storeClass(Request $request, $id)
    {
        StudentClasses::create([
            'student_id' => $id,
            'class_id' => $request->class_id
        ]);
        return redirect()->route('student.index')->with('status', 'Class Added Successfully');
    } 

    public function nonAcademicSubActivity(Request $request, $studentId, $activityId)
    {
        $keyword = $request->keyword;
        return view('transactions.students.nonAcademicSubActivities', [
            'activity' => Activity::find($activityId),
            'subActivities' => SubActivity::where('activity_id', $activityId)->where('description', 'LIKE', '%'.$keyword.'%')->paginate(10),
            'student' => Student::find($studentId)
        ]);
    }

    public function nonAcademicSubActivityEvents(Request $request, $studentId, $subActivityId)
    {
        $keyword = $request->keyword;
        return view('transactions.students.nonAcademicSubActivityEvents', [
            'subActivity' => SubActivity::find($subActivityId),
            'events' => SubActivityEvent::where('sub_activity_id', $subActivityId)->where('description', 'LIKE', '%'.$keyword.'%')->paginate(10),
            'student' => Student::find($studentId)
        ]);
    }

    public function createNonAcademicSubActivityEvents($studentId, $eventId)
    {
        return view('transactions.students.create_non_academic_sub_activity_events', [
            'student' => Student::find($studentId),
            'event' => SubActivityEvent::find($eventId)
        ]);
    }

    public function storeNonAcademicSubActivityEvents(Request $request, $studentId, $eventId)
    {
        $student = Student::find($studentId);
        $event = SubActivityEvent::find($eventId);

        $eventPercentage = ('.'.$event->percentage);
        if($event->percentage == 100) {
            $eventPercentage = 1;
        }

        $subActivityPercentage = ('.'.$event->subActivity->percentage);
        if($event->subActivity->percentage == 100) {
            $subActivityPercentage = 1;
        }

        EventAverageScore::create([
            'student_id' => $studentId,
            'sub_activity_event_id' => $eventId,
            'score' => $request->score,
            'average' => $request->score * $eventPercentage,
            'repetition_time' => $request->repetition_time
        ]);

        $eventAverageScore = EventAverageScore::where('student_id', $student->id)
                                                ->whereHas('subActivityEvent', function($query) use($event) {
                                                    $query->where('sub_activity_id', $event->sub_activity_id);
                                                });

        $hasSubActivityAverage = SubActivityAverage::where('student_id', $studentId)->where('sub_activity_id', $event->sub_activity_id)->first();
        if(!$hasSubActivityAverage) {
            SubActivityAverage::create([
                'student_id' => $studentId,
                'sub_activity_id' => $event->sub_activity_id,
                'average' => round($eventAverageScore->sum('score') / $eventAverageScore->count(), 0),
                'total' => round($eventAverageScore->sum('score') / $eventAverageScore->count() * $subActivityPercentage, 0)
            ]);
        }

        SubActivityAverage::where('student_id', $studentId)->where('sub_activity_id', $event->sub_activity_id)->update([
            'student_id' => $studentId,
            'sub_activity_id' => $event->sub_activity_id,
            'average' => round($eventAverageScore->sum('score') / $eventAverageScore->count(), 0),
            'total' => round($eventAverageScore->sum('score') / $eventAverageScore->count() * $subActivityPercentage, 0)
        ]);

        $subActivityAverage = SubActivityAverage::where('student_id', $studentId)->whereHas('subActivity', function($query) use($event) {
            $query->where('activity_id', $event->subActivity->activity_id);
        });

        $hasActivityAverage = ActivityAverage::where('student_id', $studentId)->where('activity_id', $event->subActivity->activity_id)->first();
        if(!$hasActivityAverage) {
            ActivityAverage::create([
                'student_id' => $studentId,
                'activity_id' => $event->subActivity->activity_id,
                'average' => round($subActivityAverage->sum('total'), 0),
                'total_points' => round(($subActivityAverage->sum('total')) / 100 * $event->subActivity->activity->nr_of_points, 0)
            ]);
        }

        ActivityAverage::where('student_id', $studentId)->where('activity_id', $event->subActivity->activity_id)->update([
            'student_id' => $studentId,
            'activity_id' => $event->subActivity->activity_id,
            'average' => round($subActivityAverage->sum('total'), 0),
            'total_points' => round(($subActivityAverage->sum('total')) / 100 * $event->subActivity->activity->nr_of_points, 0)
        ]);

        $totalAcademicGrade = AcademicGrade::where('student_id', $studentId)->sum('allocated_points');
        $totalNonAcademicGrade = ActivityAverage::where('student_id', $studentId)->sum('total_points');

        Student::find($studentId)->update([
            'gwa' => round($totalAcademicGrade + $totalNonAcademicGrade, 0)
        ]);

        return redirect()->route('student.nonacademicsubactivityevents.index', [$studentId, $event->sub_activity_id])->with('status', 'Event Scored Successfully');
    }
}