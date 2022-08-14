<?php

namespace App\Http\Controllers;

use App\Models\BloodType;
use Illuminate\Http\Request;

class BloodTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bloodType = BloodType::paginate(10);
        return view('references.bloodType.index', [
            'blood_types' => $bloodType
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
    public function store(Request $request)
    {
        Rank::create($request->all());
        return redirect()->route('references.bloodType.index')->with('status', 'Blood Type Created Successfully');
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
            'blood_type' => BloodType::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $data = BloodType::find($id);
        $data->update($request->all());

        $bloodType = BloodType::paginate(10);
        return view('references.bloodType.index', [
            'blood_types' => $bloodType
        ])->withStatus(__('Blood Type successfully updated.'));   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Rank::find($id);
        $id->delete();
        return view('references.bloodType.index', [
            'blood_types' => $id
        ])->withStatus(__('Blood Type successfully deleted.'));
    }
}
