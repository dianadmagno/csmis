<?php

namespace App\Http\Controllers\References;

use Illuminate\Http\Request;
use App\Models\References\Task;
use Illuminate\Routing\Controller;
use App\Models\References\Activity;
use App\Http\Requests\References\TaskRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        $keyword = $request->keyword;
        return view('references.activities.task', [
            'tasks' => Task::where('name', 'LIKE', '%'.$keyword.'%')
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
        return view('references.activities.createTask',[
            'activity' => Activity::find($id)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $taskRequest, $id)
    {
        
        Task::create([
            'name' => $taskRequest->name,
            'description' => $taskRequest->description,
            'activity_id' => $id
        ]);

        return view('references.activities.task', [
            'activity' => Activity::find($id),
            'tasks' => Task::paginate(10)
        ])->with('Task Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\References\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\References\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('references.activities.taskEdit', [
            'task' => Task::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\References\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $taskRequest, $id)
    {
        $data = Task::find($id);
        $data->update($taskRequest->all());

        $tasks = Task::paginate(10);
        return redirect()->route('task.subIndex', [
            'activity' => Activity::find($id),
            'tasks' => $tasks
        ])->with('Task Updated Successfully.'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\References\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Task::find($id);
        $id->delete();
        return back()->with('status', 'Task Deleted Successfully');
    }
}
