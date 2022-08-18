<?php

namespace App\Http\Controllers\References;

use Illuminate\Http\Request;
use App\Models\References\Module;
use App\Http\Controllers\Controller;
use App\Models\References\SubModule;
use App\Http\Requests\References\SubModuleRequest;

class SubModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        return view('references.subModule.index', [
            'subModules' => SubModule::join('rf_modules', 'rf_modules.id', '=', 'rf_sub_modules.module_id')
                        ->select('rf_modules.id as module_id', 'rf_modules.name as module_name', 'rf_modules.description as module_description', 'rf_sub_modules.description as sub_module_name')
                        ->where('rf_modules.name', 'LIKE', '%'.$keyword.'%')
                        ->orWhere('rf_modules.description', 'LIKE', '%'.$keyword.'%')
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
        return view('references.subModule.create', [
            'modules' => Module::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubModuleRequest $subModuleRequest)
    {
        SubModule::create($subModuleRequest->all());
        return back()->with('status', 'Sub Module Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\References\SubModule  $subModule
     * @return \Illuminate\Http\Response
     */
    public function show(SubModule $subModule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\References\SubModule  $subModule
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('references.subModule.edit', [
            'subModule' => SubModule::find($id),
            'modules' => Module::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\References\SubModule  $subModule
     * @return \Illuminate\Http\Response
     */
    public function update(SubModuleRequest $subModuleRequest, $id)
    {
        $data = SubModule::find($id);
        $data->update($subModuleRequest->all());

        $subModules = SubModule::paginate(10);
        return view('references.subModule.index', [
            'subModules' => $subModules
        ])->back()->with('Sub Module successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\References\SubModule  $subModule
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubModule $subModule, $id)
    {
        $id = SubModule::find($id);
        $id->delete();
        return back()->with('status', 'Sub Module Archived Successfully');
    }
}
