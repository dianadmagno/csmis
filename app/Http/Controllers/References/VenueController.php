<?php

namespace App\Http\Controllers\References;

use Illuminate\Http\Request;
use App\Models\References\Venue;
use Illuminate\Routing\Controller;
use App\Http\Requests\References\VenueRequest;

class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        return view('references.venue.index', [
            'venues' => Venue::where('name', 'LIKE', '%'.$keyword.'%')
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
        return view('references.venue.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VenueRequest $venueRequest)
    {
        Venue::create($venueRequest->all());
        return redirect()->route('venue.index')->with('status', 'Venue Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\References\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function show(Venue $venue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\References\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('references.venue.edit', [
            'venue' => Venue::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\References\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function update(VenueRequest $venueRequest, $id)
    {
        $data = Venue::find($id);
        $data->update($venueRequest->all());

        $venues = Venue::paginate(10);
        return redirect()->route('venue.index', [
            'venues' => $venues
        ])->with('Venue Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\References\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Venue::find($id);
        $id->delete();
        return back()->with('status', 'Venue Deleted Successfully');
    }
}
