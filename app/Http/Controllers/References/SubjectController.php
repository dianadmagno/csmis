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
    public function index(Request $request, $id)
    {
        $keyword = $request->keyword;
        return view('references.subject.index', [
            'subjects' => Subject::where('sub_module_id', $id)
                        ->where('name', 'LIKE', '%'.$keyword.'%')
                        ->paginate(10),
            'subModule' => SubModule::find($id)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('references.subject.create', [
            'subModules' => SubModule::all(),
            'subModuleId' => SubModule::find($id)
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
        return redirect()->route('subjects.index')->with('status', 'Subject Created Successfully');
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
    public function edit($id, $subModId)
    {
        return view('references.subject.edit', [
            'subject' => Subject::find($id),
            'subModules' => SubModule::all(),
            'subModule' => SubModule::find($subModId)
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
        return redirect()->route('subjects.index', [
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
