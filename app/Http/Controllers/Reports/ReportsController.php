<?php

namespace App\Http\Controllers\Reports;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Transactions\Student;
use App\Models\Transactions\StudentClass;
use Illuminate\Database\Eloquent\Builder;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $classes = StudentClass::all();
        $classId = $request->class_id;

        $class = StudentClass::where('id', $classId)->first();
        $sex = Student::whereHas('studentClasses', function($query) use ($classId) {
            $query->whereHas('class', function($query) use ($classId) {
                $query->whereNull('graduation_date')
                    ->orWhere('graduation_date', '>', Carbon::parse()->format('Y-m-d'))
                    ->where('class_id', $classId);
            });
        })
        ->select('sex', DB::raw('count(*) as total'))
        ->groupBy('sex')
        ->get();

        return view('reports.report', [
            'class' => $class,
            'classes' => $classes,
            'sex' => $sex,
            'report' => $request->report_type
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
