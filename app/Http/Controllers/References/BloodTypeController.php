<?php

namespace App\Http\Controllers\References;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\References\BloodType;
use App\Http\Requests\References\BloodTypeRequest;

class BloodTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        return view('references.bloodType.index', [
            'blood_types' => BloodType::where('name', 'LIKE', '%'.$keyword.'%')
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
        return view('references.bloodType.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BloodTypeRequest $bloodTypeRequest)
    {
        BloodType::create($bloodTypeRequest->all());
        return redirect()->route('bloodType.index')->with('status', 'Blood Type Created Successfully');
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
        return view('references.bloodType.edit', [
            'blood_types' => BloodType::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BloodTypeRequest $bloodTypeRequest, $id)
    {   
        $data = BloodType::find($id);
        $data->update($bloodTypeRequest->all());

        $bloodType = BloodType::paginate(10);
        return redirect()->route('bloodType.index', [
            'blood_types' => $bloodType
        ])->with('Blood Type Updated Successfully.');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = BloodType::find($id);
        $id->delete();
        return back()->with('status', 'Blood Type Archived Successfully');
    }
}
