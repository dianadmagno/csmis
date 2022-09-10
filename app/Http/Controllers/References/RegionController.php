<?php

namespace App\Http\Controllers\References;

use Illuminate\Http\Request;
use App\Models\References\Region;
use Illuminate\Routing\Controller;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        return view('references.region.index', [
            'regions' => Region::where('name', 'LIKE', '%'.$keyword.'%')
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
        return view('references.region.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Region::create($regionRequest->all());
        return redirect()->route('region.index')->with('status', 'Region Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\References\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function show(Region $region)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\References\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('references.region.edit', [
            'region' => Region::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\References\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function update(RegionRequest $regionRequest, $id)
    {
        $data = Region::find($id);
        $data->update($regionRequest->all());

        $regions = Region::paginate(10);
        return redirect()->route('region.index', [
            'regions' => $regions
        ])->with('Region Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\References\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Region::find($id);
        $id->delete();
        return back()->with('status', 'Region Deleted Successfully');
    }
}
