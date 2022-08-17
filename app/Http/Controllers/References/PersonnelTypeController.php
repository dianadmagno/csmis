<?php

namespace App\Http\Controllers\References;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\References\PersonnelType;

class PersonnelTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        return view('references.personnelType.index', [
            'personnelTypes' => PersonnelType::where('name', 'LIKE', '%'.$keyword.'%')
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
        return view('references.personnelType.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PersonnelType::create($request->all());
        return back()->with('status', 'Personnel Type Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\References\PersonnelType  $personnelType
     * @return \Illuminate\Http\Response
     */
    public function show(PersonnelType $personnelType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\References\PersonnelType  $personnelType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('references.personnelType.edit', [
            'personnelType' => PersonnelType::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\References\PersonnelType  $personnelType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = PersonnelType::find($id);
        $data->update($request->all());

        $personnelTypes = PersonnelType::paginate(10);
        return view('references.personnelType.index', [
            'personnelTypes' => $personnelTypes
        ])->back()->with('Personnel Type successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\References\PersonnelType  $personnelType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = PersonnelType::find($id);
        $id->delete();
        return back()->with('status', 'Personnel Type Archived Successfully');
    }
}
