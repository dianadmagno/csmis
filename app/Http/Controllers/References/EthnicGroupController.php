<?php

namespace App\Http\Controllers\References;

use App\Models\References\EthnicGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EthnicGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        return view('references.ethnicGroup.index', [
            'ethnicGroups' => EthnicGroup::where('name', 'LIKE', '%'.$keyword.'%')
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
        return view('references.ethnicGroup.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        EthnicGroup::create($request->all());
        return redirect()->route('ethnicGroup.index')->with('status', 'Ethnic Group Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\References\EthnicGroup  $ethnicGroup
     * @return \Illuminate\Http\Response
     */
    public function show(EthnicGroup $ethnicGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\References\EthnicGroup  $ethnicGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(EthnicGroup $ethnicGroup)
    {
        return view('references.ethnicGroup.edit', [
            'ethnicGroup' => EthnicGroup::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\References\EthnicGroup  $ethnicGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EthnicGroup $ethnicGroup, $id)
    {
        $data = EthnicGroup::find($id);
        $data->update($request->all());

        $ethnicGroups = EthnicGroup::paginate(10);
        return view('references.ethnicGroup.index', [
            'ethnicGroups' => $ethnicGroups
        ])->withStatus(__('Ethnic Group successfully updated.'));  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\References\EthnicGroup  $ethnicGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(EthnicGroup $ethnicGroup, $id)
    {
        $id = EthnicGroup::find($id);
        $id->delete();
        return redirect()->route('ethnicGroup.index')->with('status', 'Ethnic Group Archived Successfully');
    }
}
