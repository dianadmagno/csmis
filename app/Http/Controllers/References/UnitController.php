<?php

namespace App\Http\Controllers\References;

use Illuminate\Http\Request;
use App\Models\References\Unit;
use App\Http\Controllers\Controller;
use App\Http\Requests\References\UnitRequest;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        return view('references.unit.index', [
            'units' => Unit::where('name', 'LIKE', '%'.$keyword.'%')
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
        return view('references.unit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UnitRequest $unitRequest)
    {
        Unit::create($unitRequest->all());
        return redirect()->route('unit.index')->with('status', 'Unit Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\References\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\References\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        return view('references.unit.edit', [
            'unit' => Unit::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\References\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(UnitRequest $unitRequest, $id)
    {
        $data = Unit::find($id);
        $data->update($unitRequest->all());

        $units = Unit::paginate(10);
        return redirect()->route('unit.index', [
            'units' => $units
        ])->with('Unit Updated Successfully.'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\References\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Unit::find($id);
        $id->delete();
        return back()->with('status', 'Unit Archived Successfully');
    }
}
