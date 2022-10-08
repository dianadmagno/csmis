<?php

namespace App\Http\Controllers\Transactions;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Transactions\ClassSquad;
use App\Models\Transactions\ClassPlatoon;
use App\Http\Requests\Transactions\ClassSquadRequest;

class ClassSquadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $platoonId)
    {
        return view('transactions.squad.index', [
            'squads' => ClassSquad::where('platoon_id', $platoonId)
                    ->paginate(10),
            'platoon' => ClassPlatoon::find($platoonId)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('transactions.squad.create', [
            'platoon' => ClassPlatoon::find($id)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $classSquadRequest, $id)
    {
        ClassSquad::create([
            'name' => $classSquadRequest->name,
            'description' => $classSquadRequest->description,
            'platoon_id' => $id
        ]);
        return redirect()->route('squad.index', $id)->with('status', 'Squad Created Successfully');
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
    public function edit(ClassSquad $classSquad, $id)
    {
        return view('transactions.squad.edit', [
            'squad' => ClassSquad::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transactions\ClassPlatoon  $classPlatoon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $classSquadRequest, $id)
    {
        $data = ClassSquad::find($id);
        $data->update($classSquadRequest->all());

        $squads = ClassSquad::paginate(10);
        return redirect()->route('squad.index', $data->platoon_id)->with('Squad Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transactions\ClassPlatoon  $classPlatoon
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassSquad $classSquad, $id)
    {
        $id = ClassSquad::find($id);
        $id->delete();
        return back()->with('status', 'Squad Deleted Successfully');
    }
}
