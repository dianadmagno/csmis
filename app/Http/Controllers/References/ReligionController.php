<?php

namespace App\Http\Controllers\References;

use Illuminate\Http\Request;
use App\Models\References\Religion;
use App\Http\Controllers\Controller;
use App\Http\Requests\References\ReligionRequest;

class ReligionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        return view('references.religion.index', [
            'religions' => Religion::where('name', 'LIKE', '%'.$keyword.'%')
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
        return view('references.religion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReligionRequest $religionRequest)
    {
        Religion::create($religionRequest->all());
        return redirect()->route('religion.index')->with('status', 'Religion Created Successfully');
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
        return view('references.religion.edit', [
            'religions' => Religion::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReligionRequest $religionRequest, $id)
    {   
        $data = Religion::find($id);
        $data->update($religionRequest->all());

        $religions = Religion::paginate(10);
        return redirect()->route('religion.index', [
            'religions' => $religions
        ])->with('Religion Updated Successfully.');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Religion::find($id);
        $id->delete();
        return back()->with('status', 'Religion Archived Successfully');
    }
}
