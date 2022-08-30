<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Transactions\Student;
use App\Models\Transactions\StudentClasses;

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
        return view('dashboard', [
            'sex' => $sex,
            'religions' => $religions,
            'totalNewStudents' => $totalNewStudents,
            'totalPrevStudents' => $totalPrevStudents,
            'studentsByClasses' => $studentsByClasses
        ]);
    }
}
