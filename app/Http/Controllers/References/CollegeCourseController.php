<?php

namespace App\Http\Controllers\References;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\References\CollegeCourse;
use App\Http\Requests\References\CollegeCourseRequest;

class CollegeCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        return view('references.collegeCourse.index', [
            'collegeCourses' => CollegeCourse::where('name', 'LIKE', '%'.$keyword.'%')
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
        return view('references.collegeCourse.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CollegeCourseRequest $collegeCourseRequest)
    {
        CollegeCourse::create($collegeCourseRequest->all());
        return redirect()->route('collegeCourse.index')->with('status', 'College Course Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\References\CollegeCourse  $collegeCourse
     * @return \Illuminate\Http\Response
     */
    public function show(CollegeCourse $collegeCourse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\References\CollegeCourse  $collegeCourse
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('references.collegeCourse.edit', [
            'collegeCourse' => CollegeCourse::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\References\CollegeCourse  $collegeCourse
     * @return \Illuminate\Http\Response
     */
    public function update(CollegeCourseRequest $collegeCourseRequest, $id)
    {
        $data = CollegeCourse::find($id);
        $data->update($collegeCourseRequest->all());

        $collegeCourses = CollegeCourse::paginate(10);
        return redirect()->route('collegeCourse.index', [
            'collegeCourses' => $collegeCourses
        ])->with('College Course Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\References\CollegeCourse  $collegeCourse
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = CollegeCourse::find($id);
        $id->delete();
        return back()->with('status', 'College Course Deleted Successfully');
    }
}
