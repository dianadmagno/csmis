<?php

namespace App\Http\Controllers\Transactions;

use Illuminate\Http\Request;
use App\Models\References\Rank;
use App\Models\References\Unit;
use App\Models\References\Company;
use App\Models\References\Religion;
use App\Http\Controllers\Controller;
use App\Models\References\BloodType;
use App\Models\Transactions\Student;
use App\Models\References\EthnicGroup;
use App\Http\Requests\UploadPhotoRequest;
use App\Models\References\EnlistmentType;
use App\Models\Transactions\StudentClass;
use App\Http\Requests\Transactions\StudentRequest;

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
                                ->orWhere('email', 'like', '%'.$keyword.'%')
                                ->orWhereHas('class', function($query) use($keyword) {
                                    $query->where('description', 'like', '%'.$keyword.'%');
                                })
                                ->orWhereHas('company', function($query) use($keyword) {
                                    $query->where('description', 'like', '%'.$keyword.'%');
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
        $studentClasses = StudentClass::where('is_active', true)->get();
        $units = Unit::all();
        $ethnicGroups = EthnicGroup::all();
        $companies = Company::all();
        return view('transactions.students.create', [
            'bloodTypes' => $bloodTypes,
            'religions' => $religions,
            'ranks' => $ranks,
            'enlistmentTypes' => $enlistmentTypes,
            'studentClasses' => $studentClasses,
            'units' => $units,
            'ethnicGroups' => $ethnicGroups,
            'companies' => $companies
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
        Student::create($request->all());
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
        $studentClasses = StudentClass::where('is_active', true)->get();
        $units = Unit::all();
        $ethnicGroups = EthnicGroup::all();
        $companies = Company::all();
        $student = Student::find($id);
        return view('transactions.students.edit', [
            'bloodTypes' => $bloodTypes,
            'religions' => $religions,
            'ranks' => $ranks,
            'enlistmentTypes' => $enlistmentTypes,
            'studentClasses' => $studentClasses,
            'units' => $units,
            'ethnicGroups' => $ethnicGroups,
            'companies' => $companies,
            'student' => $student
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
}
