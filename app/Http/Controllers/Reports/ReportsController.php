<?php

namespace App\Http\Controllers\Reports;

use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\References\Region;
use App\Http\Controllers\Controller;
use App\Models\Transactions\Student;
use App\Models\References\EthnicGroup;
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
        $sexes = [
            ['id' => 1, 'name' => 'Male'],
            ['id' => 2, 'name' => 'Female']
        ]; 
        $highestEducations = [
            ['id' => 1, 'name' => 'Elementary'],
            ['id' => 2, 'name' => 'High School'],
            ['id' => 3, 'name' => 'College'],
            ['id' => 4, 'name' => 'Undergraduate']
        ];

        $class = StudentClass::where('id', $classId)->first();

        if($reportId == 10) {
            foreach ($sexes as $sex) {
                $count = Student::whereHas('studentClasses', function($query) use ($classId) {
                    $query->whereHas('class', function($query) use ($classId) {
                        $query->where('class_id', $classId);
                    });
                })
                ->where('sex', $sex['id'])
                ->count();

                $array = ['sex' => $sex['name'], 'count' => $count];
                array_push($data, $array);
            }
        } elseif ($reportId == 9) {
            $regions = Region::all();
            foreach($regions as $region) {
                $count = Student::whereHas('studentClasses', function($query) use ($classId) {
                    $query->whereHas('class', function($query) use ($classId) {
                        $query->where('class_id', $classId);
                    });
                })
                ->where('region_id', $region['id'])
                ->count();

                $array = ['name' => $region['name'], 'desc' => $region['description'], 'count' => $count];

                array_push($data, $array);
            }
        } elseif ($reportId == 3) {
            $ethnicGroups = EthnicGroup::all();
            foreach($ethnicGroups as $ethnicGroup) {
                $count = Student::whereHas('studentClasses', function($query) use ($classId) {
                    $query->whereHas('class', function($query) use ($classId) {
                        $query->where('class_id', $classId);
                    });
                })
                ->where('ethnic_group_id', $ethnicGroup['id'])
                ->count();

                $array = ['name' => $ethnicGroup['name'], 'desc' => $ethnicGroup['description'], 'count' => $count];

                array_push($data, $array);
            }
        } elseif ($reportId == 4) {
            foreach($highestEducations as $highestEducation) {
                $count = Student::whereHas('studentClasses', function($query) use ($classId) {
                    $query->whereHas('class', function($query) use ($classId) {
                        $query->where('class_id', $classId);
                    });
                })
                ->where('educational_attainment', $highestEducation['id'])
                ->count();

                $array = ['name' => $highestEducation['name'], 'count' => $count];

                array_push($data, $array);
            }
        } elseif ($reportId == 1) {
            $vaccineTypes = VaccineType::all();
            $vaccineNames = VaccineName::all();

            foreach($vaccineNames as $vaccineName) {
                $count = StudentVaccine::whereHas('studentClasses', function($query) use ($classId) {
                    $query->whereHas('class', function($query) use ($classId) {
                        $query->where('class_id', $classId);
                    });
                })
                ->where('vaccine_name_id', $vaccineName['id'])
                ->count();

                $array = ['name' => $vaccineName['name'], 'count' => $count];

                array_push($data, $array);
            }
        }
        elseif ($reportId == 11) {
            $data = Student::whereHas('studentClasses', function($query) use ($classId) {
                $query->whereHas('class', function($query) use ($classId) {
                    $query->where('class_id', $classId);
                });
            })
            ->select( 'rf_ranks.name', 'lastname', 'firstname', 'middlename','mobile_number', 'email')
            ->join('rf_ranks', 'rf_ranks.id', 'tr_students.rank_id')
            ->get();
        }

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
