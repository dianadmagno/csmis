<?php

namespace App\Http\Controllers\Transactions;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Transactions\Student;
use App\Models\References\VaccineName;
use App\Models\References\VaccineType;
use App\Models\Transactions\StudentVaccine;

class StudentVaccineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        $keyword = $request->keyword;
        return view('transactions.students.vaccine', [
            'vaccines' => StudentVaccine::join('rf_vaccine_types', 'rf_vaccine_types.id', '=', 'tr_student_vaccines.vaccine_type_id')
                        ->join('rf_vaccine_names', 'rf_vaccine_names.id', '=', 'tr_student_vaccines.vaccine_name_id')
                        ->select('rf_vaccine_names.description as vaccine_name', 'rf_vaccine_types.description as vaccine_type', 'date', 'place', 'student_id', 'tr_student_vaccines.id as id', 'remarks')
                        ->where('student_id', $id)
                        ->paginate(10),
            'student' => Student::find($id)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('transactions.students.create_vaccine', [
            'vaccineTypes' => VaccineType::all(),
            'vaccineNames' => VaccineName::all(),
            'student' => Student::find($id)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        StudentVaccine::create([
            'student_id' => $id,
            'vaccine_type_id' => $request->vaccine_type_id,
            'vaccine_name_id' => $request->vaccine_name_id,
            'date' => $request->date,
            'place' => $request->place,
            'remarks' => $request->remarks            
        ]);
        return redirect()->route('student.vaccine', $id)->with('status', 'Student Vaccine Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transactions\StudentVaccine  $studentVaccine
     * @return \Illuminate\Http\Response
     */
    public function show(StudentVaccine $studentVaccine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transactions\StudentVaccine  $studentVaccine
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentVaccine $studentVaccine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transactions\StudentVaccine  $studentVaccine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentVaccine $studentVaccine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transactions\StudentVaccine  $studentVaccine
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = StudentVaccine::find($id);
        $id->delete();
        return back()->with('status', 'Student Vaccine Deleted Successfully');
    }
}
