<?php

namespace App\Http\Controllers\References;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\References\LicenseExam;
use App\Http\Requests\References\LicenseExamRequest;

class LicenseExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        return view('references.licenseExam.index', [
            'licenseExams' => LicenseExam::where('name', 'LIKE', '%'.$keyword.'%')
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
        return view('references.licenseExam.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LicenseExamRequest $licenseExamRequest)
    {
        LicenseExam::create($licenseExamRequest->all());
        return redirect()->route('licenseExam.index')->with('status', 'License Exam Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\References\LicenseExam  $licenseExam
     * @return \Illuminate\Http\Response
     */
    public function show(LicenseExam $licenseExam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\References\LicenseExam  $licenseExam
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('references.licenseExam.edit', [
            'licenseExam' => LicenseExam::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\References\LicenseExam  $licenseExam
     * @return \Illuminate\Http\Response
     */
    public function update(LicenseExamRequest $licenseExamRequest, $id)
    {
        $licenseExam = LicenseExam::find($id);
        $licenseExam->update($licenseExamRequest->all());
        return redirect()->route('licenseExam.index')->with('status', 'License Exam Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\References\LicenseExam  $licenseExam
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = LicenseExam::find($id);
        $id->delete();
        return back()->with('status', 'License Exam Deleted Successfully');
    }
}
