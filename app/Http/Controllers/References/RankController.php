<?php

namespace App\Http\Controllers\References;

use Illuminate\Http\Request;
use App\Models\References\Rank;
use App\Http\Controllers\Controller;
use App\Http\Requests\References\RankRequest;

class RankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        return view('references.ranks.index', [
            'ranks' => Rank::where('name', 'LIKE', '%'.$keyword.'%')
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
        return view('references.ranks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RankRequest $rankRequest)
    {
        Rank::create($rankRequest->all());
        return redirect()->route('ranks.index')->with('status', 'Rank Created Successfully');
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
        return view('references.ranks.edit', [
            'rank' => Rank::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RankRequest $rankRequest, $id)
    {   
        $data = Rank::find($id);
        $data->update($rankRequest->all());

        $ranks = Rank::paginate(10);
        return redirect()->route('ranks.index', [
            'ranks' => $ranks
        ])->with('Rank Updated Successfully.');   
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
        return back()->with('status', 'Rank Deleted Successfully');
    }
}
