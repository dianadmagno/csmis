<?php

namespace App\Http\Controllers\References;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\References\SubActivity;
use App\Models\References\SubActivityEvent;
use App\Http\Requests\References\SubActivityEventRequest;

class SubActivityEventController extends Controller
{
    public function index(Request $request, $id)
    {
        $keyword = $request->keyword;
        return view('references.subactivityEvent.index', [
            'subActivity' => SubActivity::find($id),
            'events' => SubActivityEvent::where('sub_activity_id', $id)->where('description', 'like', '%'.$keyword.'%')->paginate(10)
        ]);
    }

    public function create($id)
    {
        return view('references.subactivityEvent.create', [
            'subActivity' => SubActivity::find($id)
        ]);
    }

    public function store(SubActivityEventRequest $request, $id)
    {
        SubActivityEvent::create([
            'name' => $request->name,
            'description' => $request->description,
            'percentage' => $request->percentage,
            'sub_activity_id' => $id
        ]);
        return redirect()->route('sub-activity-event.index', $id)->with('status', 'Event Created Successfully');
    }
}
