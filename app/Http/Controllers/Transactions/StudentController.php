<?php

namespace App\Http\Controllers\Transactions;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\References\Rank;
use App\Models\References\Unit;
use App\Models\References\Course;
use App\Models\References\Company;
use App\Models\References\Activity;
use App\Models\References\Subject;
use Illuminate\Support\Facades\DB;
use App\Models\References\Religion;
use App\Http\Controllers\Controller;
use App\Models\References\BloodType;
use App\Models\Transactions\Student;
use App\Models\References\EthnicGroup;
use App\Models\References\VaccineName;
use App\Http\Requests\UploadPhotoRequest;
use App\Models\References\EnlistmentType;
use App\Models\Transactions\StudentClass;
use App\Models\Transactions\StudentGrade;
use App\Models\Transactions\StudentClasses;
use App\Http\Requests\Transactions\StudentRequest;
use App\Models\Transactions\ClassSubjectInstructor;
use App\Http\Requests\Transactions\AcademicGradeRequest;

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
            'courses' => $courses
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
        $courses = Course::all();
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
            'courses' => $courses
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
            'totalAllocatedPoints' => StudentGrade::where('student_id', $student->id)
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
        StudentGrade::create([
            'student_id' => $studentId,
            'subject_id' => $subjectId,
            'average' => $average,
            'grade' => $request->grade,
            'allocated_points' => $average / 100 * $subject->nr_of_points
        ]);
        return redirect()->route('student.academic', $studentId)->with('status', 'Grade Submitted Successfully');
    }

    public function editAcademicGrade($id)
    {
        $studentGrade = StudentGrade::find($id);
        return view('transactions.students.edit_academic_grade', [
            'studentGrade' => $studentGrade
        ]);
    }

    public function updateAcademicGrade(AcademicGradeRequest $request, $id)
    {
        $studentGrade = StudentGrade::find($id);
        $subject = Subject::find($studentGrade->subject_id);
        if ($request->grade > $studentGrade->subject->nr_of_items) {
            return back()->with('status', 'You cannot update grade more than the number of items');
        }
        $studentGrade->update([
            'grade' => $request->grade
        ]);
        return redirect()->route('student.academic', $studentGrade->student_id)->with('status', 'Grade Updated Successfully'); 
    }
    
    public function nonAcademic($id)
    {
        return view('transactions.students.nonacademic', [
            'activities' => Activity::paginate(10),
            'student' => Student::find($id)
        ]);
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
}
