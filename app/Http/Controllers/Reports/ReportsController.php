<?php

namespace App\Http\Controllers\Reports;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\References\Region;
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
        $reportId = $request->report_type;
        $data = [];

        $class = StudentClass::where('id', $classId)->first();

        if($reportId == 1) {
            $data = Student::whereHas('studentClasses', function($query) use ($classId) {
                $query->whereHas('class', function($query) use ($classId) {
                    $query->where('class_id', $classId);
                });
            })
            ->select('sex', DB::raw('count(*) as total'))
            ->groupBy('sex')
            ->get();
        } elseif ($reportId == 9) {
            // $regions = Region::all();
            // foreach($regions as $region) {
            //     $count = Student::where('region_id', $region['id'])->count();

            //     $array = ['name' => $region['name'], 'desc' => $region['description'], 'count' => $count];

            //     array_push($data, $array);
            // }

            $data = Region::selectRaw("name, description, count(".DB::table('tr_students')->where('region_id', 'id').") as count")->get();
        }

        return dd($data);

        return view('reports.report', [
            'class' => $class,
            'classes' => $classes,
            'data' => $data,
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
