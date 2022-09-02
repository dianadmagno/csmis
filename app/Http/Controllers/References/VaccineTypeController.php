<?php

namespace App\Http\Controllers\References;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\References\VaccineType;
use App\Http\Requests\References\VaccineTypeRequest;

class VaccineTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        return view('references.vaccineType.index', [
            'vaccineTypes' => VaccineType::where('name', 'LIKE', '%'.$keyword.'%')
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
        return view('references.vaccineType.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VaccineTypeRequest $vaccineTypeRequest)
    {
        VaccineType::create($vaccineTypeRequest->all());
        return redirect()->route('vaccineType.index')->with('status', 'Vaccine Type Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\References\VaccineType  $vaccineType
     * @return \Illuminate\Http\Response
     */
    public function show(VaccineType $vaccineType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\References\VaccineType  $vaccineType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('references.vaccineType.edit', [
            'vaccineType' => VaccineType::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\References\VaccineType  $vaccineType
     * @return \Illuminate\Http\Response
     */
    public function update(VaccineTypeRequest $vaccineTypeRequest, $id)
    {
        $data = VaccineType::find($id);
        $data->update($vaccineTypeRequest->all());

        $vaccineTypes = VaccineType::paginate(10);
        return redirect()->route('vaccineType.index', [
            'vaccineTypes' => $vaccineTypes
        ])->with('Vaccine Type Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\References\VaccineType  $vaccineType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = VaccineType::find($id);
        $id->delete();
        return back()->with('status', 'Vaccine Type Deleted Successfully');
    }
}
