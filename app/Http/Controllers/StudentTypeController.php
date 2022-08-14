<?php

namespace App\Http\Controllers;

use App\Models\StudentType;
use Illuminate\Http\Request;

class StudentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studentType = StudentType::paginate(10);
        return view('references.type.index', [
            'student_types' => $studentType
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
    public function store(Request $request)
    {
        StudentType::create($request->all());
        return redirect()->route('type.index')->with('status', 'Student Type Created Successfully');
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
            'student_types' => StudentType::find($id)
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
        $data = StudentType::find($id);
        $data->update($request->all());

        $studentType = StudentType::paginate(10);
        return view('references.type.index', [
            'student_types' => $studentType
        ])->withStatus(__('Student Type successfully updated.'));   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = StudentType::find($id);
        $id->delete();
        return view('references.type.index', [
            'student_types' => $id
        ])->withStatus(__('Student Type successfully deleted.'));
    }
}
