<?php

namespace App\Http\Controllers\References;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\References\DemeritReportType;
use App\Http\Requests\References\DemeritReportTypeRequest;

class DemeritReportTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        return view('references.demeritReport.index', [
            'demeritReports' => DemeritReportType::where('name', 'LIKE', '%'.$keyword.'%')
                        ->orWhere('description', 'LIKE', '%'.$keyword.'%')
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
        return view('references.demeritReport.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DemeritReportTypeRequest $demeritReportTypeRequest)
    {
        DemeritReportType::create($demeritReportTypeRequest->all());
        return redirect()->route('demeritReport.index')->with('status', 'Demerit Type Report Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\References\DemeritReportType  $demeritReportType
     * @return \Illuminate\Http\Response
     */
    public function show(DemeritReportType $demeritReportType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\References\DemeritReportType  $demeritReportType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('references.demeritReport.edit', [
            'demeritReport' => DemeritReportType::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\References\DemeritReportType  $demeritReportType
     * @return \Illuminate\Http\Response
     */
    public function update(DemeritReportTypeRequest $demeritReportTypeRequest, $id)
    {
        $data = DemeritTypeReport::find($id);
        $data->update($demeritReportTypeRequest->all());

        $demeritReports = DemeritTypeReport::paginate(10);
        return redirect()->route('demeritReport.index', [
            'demeritReports' => $demeritReports
        ])->with('Demerit Report Type Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\References\DemeritReportType  $demeritReportType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = DemeritTypeReport::find($id);
        $id->delete();
        return back()->with('status', 'Demerit Report Type Archived Successfully');
    }
}
