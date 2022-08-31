<?php

namespace App\Http\Controllers\References;

use Illuminate\Http\Request;
use App\Models\References\Event;
use Illuminate\Routing\Controller;
use App\Models\References\Activity;
use App\Http\Requests\References\EventRequest;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        $keyword = $request->keyword;
        return view('references.activities.event', [
            'events' => Event::where('name', 'LIKE', '%'.$keyword.'%')
                        ->where('activity_id', $id)
                        ->paginate(10),

            'activity' => Activity::find($id)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('references.activities.createEvent',[
            'activity' => Activity::find($id)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $eventRequest, $id)
    {
        
        Event::create([
            'name' => $eventRequest->name,
            'description' => $eventRequest->description,
            'activity_id' => $id
        ]);

        return view('references.activities.event', [
            'activity' => Activity::find($id),
            'events' => Event::paginate(10)
        ])->with('Event Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\References\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\References\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('references.activities.eventEdit', [
            'event' => Event::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\References\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $eventRequest, $id)
    {
        $data = Event::find($id);
        $data->update($eventRequest->all());

        $events = Event::paginate(10);
        return redirect()->route('event.subIndex', [
            'activity' => Activity::find($id),
            'events' => $events
        ])->with('Event Updated Successfully.'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\References\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Event::find($id);
        $id->delete();
        return back()->with('status', 'Event Deleted Successfully');
    }
}
