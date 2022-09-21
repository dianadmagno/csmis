<?php

namespace App\Http\Controllers\References;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\References\IslandGroup;
use App\Http\Requests\References\IslandGroupRequest;

class IslandGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        return view('references.islandGroup.index', [
            'islandGroups' => IslandGroup::where('name', 'LIKE', '%'.$keyword.'%')
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
        return view('references.islandGroup.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IslandGroupRequest $islandGroupRequest)
    {
        IslandGroup::create($islandGroupRequest->all());
        return redirect()->route('islandGroup.index')->with('status', 'Island Group Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\References\IslandGroup  $islandGroup
     * @return \Illuminate\Http\Response
     */
    public function show(IslandGroup $islandGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\References\IslandGroup  $islandGroup
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('references.islandGroup.edit', [
            'islandGroup' => IslandGroup::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\References\IslandGroup  $islandGroup
     * @return \Illuminate\Http\Response
     */
    public function update(IslandGroupRequest $islandGroupRequest, $id)
    {
        $data = IslandGroup::find($id);
        $data->update($islandGroupRequest->all());

        $islandGroups = IslandGroup::paginate(10);
        return redirect()->route('islandGroup.index', [
            'islandGroups' => $islandGroups
        ])->with('Island Group Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\References\IslandGroup  $islandGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $islandGroup = IslandGroup::find($id);
        $islandGroup->delete();
        return back()->with('status', 'Island Group Deleted Successfully');
    }
}
