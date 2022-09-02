<?php

namespace App\Http\Controllers\Transactions;

use Illuminate\Http\Request;
use App\Models\Transactions\Student;
use App\Models\Transactions\StudentDeliquencyReport;

class StudentDeliquencyReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keyword = $request->keyword;
        return view('transactions.students.vaccine', [
            'deliquencyReports' => StudentDeliquencyReport::where('student_id', $id)
                        ->paginate(10),
            'student' => Student::where('tr_students.id', $id)
                        ->join('rf_ranks', 'rf_ranks.id', 'tr_students.rank_id')
                        ->first()
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
    public function store(Request $request)
    {
        //
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
