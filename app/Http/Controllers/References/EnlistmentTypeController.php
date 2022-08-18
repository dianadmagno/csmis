<?php

namespace App\Http\Controllers\References;

use Illuminate\Http\Request;
use App\Models\References\EnlistmentType;
use App\Http\Controllers\Controller;

class EnlistmentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        return view('references.type.index', [
            'types' => EnlistmentType::where('name', 'LIKE', '%'.$keyword.'%')
                        ->orWhere('description', 'LIKE', '%'.$keyword.'%')
                        ->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('references.type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EnlistmentTypeRequest $enlistmentRequest, Request $request)
    {
        EnlistmentType::create($enlistmentRequest->all());
        return back()->with('status', 'Student Type Created Successfully');
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
        return view('references.type.edit', [
            'types' => EnlistmentType::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EnlistmentTypeRequest $enlistmentRequest, Request $request, $id)
    {   
        $data = EnlistmentType::find($id);
        $data->update($enlistmentRequest->all());

        $studentType = EnlistmentType::paginate(10);
        return view('references.type.index', [
            'types' => $studentType
        ])->back()->with('Student Type successfully updated.');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = EnlistmentType::find($id);
        $id->delete();
        return back()->with('status', 'Student Enlistment Archived Successfully');
    }
}
