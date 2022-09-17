<?php

namespace App\Http\Controllers\References;

use Illuminate\Http\Request;
use App\Models\References\ActivityEvent;
use Illuminate\Routing\Controller;
use App\Models\References\Activity;
use App\Http\Requests\References\ActivityEventRequest;

class ActivityEventController extends Controller
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
            'events' => ActivityEvent::where('name', 'LIKE', '%'.$keyword.'%')
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
    public function store(ActivityEventRequest $eventRequest, $id)
    {
        ActivityEvent::create([
            'name' => $eventRequest->name,
            'description' => $eventRequest->description,
            'activity_id' => $id,
            'percentage' => $eventRequest->percentage
        ]);

        return view('references.activities.event', [
            'activity' => Activity::find($id),
            'events' => ActivityEvent::paginate(10)
        ])->with('Event Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\References\ActivityEvent  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\References\ActivityEvent  $event
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('references.activities.eventEdit', [
            'event' => ActivityEvent::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\References\ActivityEvent  $event
     * @return \Illuminate\Http\Response
     */
    public function update(ActivityEventRequest $eventRequest, $id)
    {
        $data = ActivityEvent::find($id);
        $data->update($eventRequest->all());

        $events = ActivityEvent::paginate(10);
        return redirect()->route('event.subIndex', [
            'activity' => Activity::find($id),
            'events' => $events
        ])->with('status', 'Event Updated Successfully.'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\References\ActivityEvent  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = ActivityEvent::find($id);
        $id->delete();
        return back()->with('status', 'Event Deleted Successfully');
    }
}
