<?php

namespace App\Http\Controllers\Transactions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transactions\Student;
use App\Models\Transactions\StudentDeliquencyReport;

class StudentDeliquencyReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        $keyword = $request->keyword;
        $totalAllocatedPoints = 120;
       $drs = StudentDeliquencyReport::where('student_id', $id)->get()->pluck('demerit_points');

        if(count($drs) > 0) {
            foreach ($drs as $key=>$value) {
                $totalAllocatedPoints = $totalAllocatedPoints - $value;
            }
        }
        return view('transactions.students.deliquency', [
            'drs' => StudentDeliquencyReport::where('student_id', $id)
                        ->paginate(10),
            'student' => Student::find($id),
            'totalAllocatedPoints' => $totalAllocatedPoints
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('transactions.students.create_dr', [
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
        StudentDeliquencyReport::create([
            'student_id' => $id,
            'dr_type' => $request->dr_type,
            'demerit_points' => $request->demerit_points,
            'remarks' => $request->remarks            
        ]);
        return redirect()->route('student.drIndex', $id)->with('status', 'Deliquency Report Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transactions\StudentDeliquencyReport  $studentDeliquencyReport
     * @return \Illuminate\Http\Response
     */
    public function show(StudentDeliquencyReport $studentDeliquencyReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transactions\StudentDeliquencyReport  $studentDeliquencyReport
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentDeliquencyReport $studentDeliquencyReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transactions\StudentDeliquencyReport  $studentDeliquencyReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentDeliquencyReport $studentDeliquencyReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transactions\StudentDeliquencyReport  $studentDeliquencyReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentDeliquencyReport $studentDeliquencyReport)
    {
        //
    }
}
