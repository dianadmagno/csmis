<?php

namespace App\Http\Controllers\Transactions;

use Illuminate\Http\Request;
use App\Models\References\Rank;
use App\Http\Controllers\Controller;
use App\Models\Transactions\Personnel;
use App\Models\References\PersonnelCategory;
use App\Http\Requests\Transactions\PersonnelRequest;

class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        return view('transactions.personnels.index', [
            'personnels' => Personnel::where('lastname', 'like', '%'.$keyword.'%')
                                ->orWhere('firstname', 'like', '%'.$keyword.'%')
                                ->orWhere('middlename', 'like', '%'.$keyword.'%')
                                // ->orWhereHas('classes', function($query) use($keyword) {
                                //     $query->where('description', 'like', '%'.$keyword.'%');
                                // })
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
        $personnelCategories = PersonnelCategory::all();
        $ranks = Rank::all();
        return view('transactions.personnels.create', [
            'personnelCategories' => $personnelCategories,
            'ranks' => $ranks
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonnelRequest $request)
    {
        Personnel::create($request->all());
        return redirect()->route('personnel.index')->with('status', 'Personnel Added Successfully');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
