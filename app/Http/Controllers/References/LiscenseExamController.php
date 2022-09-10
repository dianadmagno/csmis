<?php

namespace App\Http\Controllers\References;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\References\LiscenseExam;
use App\Http\Requests\References\LiscenseExamRequest;

class LiscenseExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        return view('references.liscenseExam.index', [
            'liscenseExams' => LiscenseExam::where('name', 'LIKE', '%'.$keyword.'%')
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
        return view('references.liscenseExam.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LiscenseExamRequest $liscenseExamRequest)
    {
        LiscenseExam::create($liscenseExamRequest->all());
        return redirect()->route('liscenseExam.index')->with('status', 'Liscense Exam Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\References\LiscenseExam  $liscenseExam
     * @return \Illuminate\Http\Response
     */
    public function show(LiscenseExam $liscenseExam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\References\LiscenseExam  $liscenseExam
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('references.liscenseExam.edit', [
            'liscenseExam' => LiscenseExam::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\References\LiscenseExam  $liscenseExam
     * @return \Illuminate\Http\Response
     */
    public function update(LiscenseExamRequest $liscenseExamRequest, $id)
    {
        $liscenseExam = LiscenseExam::find($id);
        $liscenseExam->update($liscenseExamRequest->all());
        return redirect()->route('liscenseExam.index')->with('status', 'Liscense Exam Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\References\LiscenseExam  $liscenseExam
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = LiscenseExam::find($id);
        $id->delete();
        return back()->with('status', 'Liscense Exam Deleted Successfully');
    }
}
