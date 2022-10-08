<?php

namespace App\Http\Controllers\Transactions;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Transactions\ClassPlatoon;
use App\Models\Transactions\StudentClass;
use App\Http\Requests\Transactions\ClassPlatoonRequest;

class ClassPlatoonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $companyId)
    {
        return view('transactions.platoon.index', [
            'platoons' => ClassPlatoon::where('class_id', $companyId)
                    ->paginate(10),
            'company' => StudentClass::find($companyId)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('transactions.platoon.create', [
            'company' => StudentClass::find($id)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $classPlatoonRequest, $id)
    {
        ClassPlatoon::create([
            'name' => $classPlatoonRequest->name,
            'description' => $classPlatoonRequest->description,
            'class_id' => $id
        ]);
        return redirect()->route('platoon.index',$id)->with('status', 'Platoon Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transactions\ClassPlatoon  $classPlatoon
     * @return \Illuminate\Http\Response
     */
    public function show(ClassPlatoon $classPlatoon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transactions\ClassPlatoon  $classPlatoon
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassPlatoon $classPlatoon, $id)
    {
        return view('transactions.platoon.edit', [
            'platoon' => ClassPlatoon::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transactions\ClassPlatoon  $classPlatoon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $classPlatoonRequest, $id)
    {

        $data = ClassPlatoon::find($id);
        $data->update($classPlatoonRequest->all());

        $platoons = ClassPlatoon::paginate(10);
        return redirect()->route('platoon.index', $data->class_id)->with('Platoon Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transactions\ClassPlatoon  $classPlatoon
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassPlatoon $classPlatoon, $id)
    {
        $id = ClassPlatoon::find($id);
        $id->delete();
        return back()->with('status', 'Platoon Deleted Successfully');
    }
}
