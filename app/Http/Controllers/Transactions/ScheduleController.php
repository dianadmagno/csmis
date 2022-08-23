<?php

namespace App\Http\Controllers\Transactions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transactions\Schedule;

class ScheduleController extends Controller
{
    public function showSchedules(Request $request)
    {
        $keyword = $request->keyword;
        return view('transactions.personnels.index', [
            'schedules' => Schedule::where('from', 'like', '%'.$keyword.'%')
                                ->orWhere('to', 'like', '%'.$keyword.'%')
                                ->paginate(10)
        ]);
    }

    public function createSchedule()
    {
        $companies = Company::all();
    }
}
