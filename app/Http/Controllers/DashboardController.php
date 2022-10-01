<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Transactions\Student;
use App\Models\Transactions\ActivityRun;
use App\Models\Transactions\AcademicGrade;
use App\Models\Transactions\StudentClasses;
use App\Models\Transactions\ActivityAverage;
use App\Models\Transactions\NonAcademicGrade;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $totalNewStudents = Student::whereHas('studentClasses', function($query) {
            $query->whereHas('class', function($query) {
                $query->whereNull('graduation_date')
                    ->orWhere('graduation_date', '>', Carbon::parse()->format('Y-m-d'));
            });
        })->count();

        $totalPrevStudents = Student::whereHas('studentClasses', function($query) {
            $query->whereHas('class', function($query) {
                $query->orderBy('graduation_date', 'desc');
            });
        })->count();

        $sex = Student::whereHas('studentClasses', function($query) {
            $query->whereHas('class', function($query) {
                $query->whereNull('graduation_date')
                    ->orWhere('graduation_date', '>', Carbon::parse()->format('Y-m-d'));
            });
        })
        ->select('sex', DB::raw('count(*) as total'))
        ->groupBy('sex')
        ->get();

        $religions = Student::whereHas('studentClasses', function($query) {
            $query->whereHas('class', function($query) {
                $query->whereNull('graduation_date')
                    ->orWhere('graduation_date', '>', Carbon::parse()->format('Y-m-d'));
            });
        })
        ->select('religion_id', DB::raw('count(*) as total'))
        ->groupBy('religion_id')
        ->get();

        $studentsByClasses = StudentClasses::whereHas('class', function($query) {
            $query->whereNull('graduation_date')
                ->orWhere('graduation_date', '>', Carbon::parse()->format('Y-m-d'));
        })
        ->select('class_id', DB::raw('count(*) as total'))
        ->groupBy('class_id')
        ->get();

        $squadRunByClasses = ActivityRun::whereHas('classActivity', function($query) {
            $query->where('activity_id', 2)
                ->whereHas('class', function($query) {
                    $query->whereNull('graduation_date')
                            ->orWhere('graduation_date', '>', Carbon::parse()->format('Y-m-d'));
                });
        })->orderBy('time', 'asc')->get();

        $platoonRunByClasses = ActivityRun::whereHas('classActivity', function($query) {
            $query->where('activity_id', 3)
                ->whereHas('class', function($query) {
                    $query->whereNull('graduation_date')
                            ->orWhere('graduation_date', '>', Carbon::parse()->format('Y-m-d'));
                });
        })->orderBy('time', 'asc')->get();

        $companyRunByClasses = ActivityRun::whereHas('classActivity', function($query) {
            $query->where('activity_id', 4)
                ->whereHas('class', function($query) {
                    $query->whereNull('graduation_date')
                            ->orWhere('graduation_date', '>', Carbon::parse()->format('Y-m-d'));
                });
        })->orderBy('time', 'asc')->get();

        $topAcademicStudent = AcademicGrade::whereHas('student', function($query) {
            $query->whereHas('studentClasses', function($query) {
                $query->whereHas('class', function($query) {
                    $query->whereNull('graduation_date')
                        ->orWhere('graduation_date', '>', Carbon::parse()->format('Y-m-d'));
                });
            });
        })->orderBy('allocated_points', 'desc')->first();

        $topNonAcademicStudent = ActivityAverage::whereHas('student', function($query) {
            $query->whereHas('studentClasses', function($query) {
                $query->whereHas('class', function($query) {
                    $query->whereNull('graduation_date')
                        ->orWhere('graduation_date', '>', Carbon::parse()->format('Y-m-d'));
                });
            });
        })->orderBy('average', 'desc')->first();

        $topStudent = Student::whereHas('studentClasses', function($query) {
            $query->whereHas('class', function($query) {
                $query->whereNull('graduation_date')
                    ->orWhere('graduation_date', '>', Carbon::parse()->format('Y-m-d'));
            });
        })->whereNotNull('gwa')->orderBy('gwa', 'asc')->first();

        $topStudents = Student::whereHas('studentClasses', function($query) {
            $query->whereHas('class', function($query) {
                $query->whereNull('graduation_date')
                    ->orWhere('graduation_date', '>', Carbon::parse()->format('Y-m-d'));
            });
        })->whereNotNull('gwa')->orderBy('gwa', 'asc')->limit(3)->get();

        return view('dashboard', [
            'sex' => $sex,
            'religions' => $religions,
            'totalNewStudents' => $totalNewStudents,
            'totalPrevStudents' => $totalPrevStudents,
            'studentsByClasses' => $studentsByClasses,
            'squadRunByClasses' => $squadRunByClasses,
            'platoonRunByClasses' => $platoonRunByClasses,
            'companyRunByClasses' => $companyRunByClasses,
            'topAcademicStudent' => $topAcademicStudent,
            'topNonAcademicStudent' => $topNonAcademicStudent,
            'topStudent' => $topStudent,
            'topStudents' => $topStudents
        ]);
    }
}
