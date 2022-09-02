<?php

namespace App\Http\Controllers\References;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\References\VaccineName;
use App\Http\Requests\References\VaccineNameRequest;

class VaccineNameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        return view('references.vaccineName.index', [
            'vaccineNames' => VaccineName::where('name', 'LIKE', '%'.$keyword.'%')
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
        return view('references.vaccineName.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VaccineNameRequest $vaccineNameRequest)
    {
        VaccineName::create($vaccineNameRequest->all());
        return redirect()->route('vaccineName.index')->with('status', 'Vaccine Name Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\References\VaccineName  $vaccineName
     * @return \Illuminate\Http\Response
     */
    public function show(VaccineName $vaccineName)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\References\VaccineName  $vaccineName
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('references.vaccineName.edit', [
            'vaccineName' => VaccineName::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\References\VaccineName  $vaccineName
     * @return \Illuminate\Http\Response
     */
    public function update(VaccineNameRequest $vaccineNameRequest, $id)
    {
        $data = VaccineName::find($id);
        $data->update($vaccineNameRequest->all());

        $vaccineNames = VaccineName::paginate(10);
        return redirect()->route('vaccineName.index', [
            'vaccineNames' => $vaccineNames
        ])->with('Vaccine Name Updated Successfully.');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\References\VaccineName  $vaccineName
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = VaccineName::find($id);
        $id->delete();
        return back()->with('status', 'Vaccine Name Deleted Successfully');
    }
}
