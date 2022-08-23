<?php

namespace App\Http\Controllers\References;

use Illuminate\Http\Request;
use App\Models\References\Subject;
use Illuminate\Routing\Controller;
use App\Models\References\SubModule;
use App\Http\Requests\References\SubjectRequest;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        return view('references.subject.index', [
            'subjects' => Subject::where('name', 'LIKE', '%'.$keyword.'%')
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
        return view('references.subject.create', [
            'subModules' => SubModule::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubjectRequest $subjectRequest)
    {
        Subject::create($subjectRequest->all());
        return redirect()->route('subject.index')->with('status', 'Subject Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\References\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\References\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('references.subject.edit', [
            'subject' => Subject::find($id),
            'subModules' => SubModule::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\References\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(SubjectRequest $subjectRequest, $id)
    {
        $data = Subject::find($id);
        $data->update($subjectRequest->all());

        $subjects = Subject::paginate(10);
        return redirect()->route('subject.index', [
            'subjects' => $subjects
        ])->with('Subject Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\References\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Subject::find($id);
        $id->delete();
        return back()->with('status', 'Subject Deleted Successfully');
    }
}
