<?php

namespace App\Http\Controllers\References;

use Illuminate\Http\Request;
use App\Models\References\Module;
use App\Http\Controllers\Controller;
use App\Models\References\SubModule;
use App\Models\Transactions\StudentClass;
use App\Http\Requests\References\ModuleRequest;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        return view('references.module.index', [
            'modules' => Module::where('name', 'LIKE', '%'.$keyword.'%')
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
        return view('references.module.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModuleRequest $moduleRequest)
    {
        Module::create($moduleRequest->all());
        return back()->with('status', 'Module Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\References\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\References\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function edit(Module $module, $id)
    {
        return view('references.module.edit', [
            'module' => Module::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\References\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(ModuleRequest $moduleRequest, $id)
    {
        $data = Module::find($id);
        $data->update($moduleRequest->all());

        $modules = Module::paginate(10);
        return view('references.module.index', [
            'modules' => $modules
        ])->back()->with('Module successfully updated.'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\References\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module)
    {
        $id = Module::find($id);
        $id->delete();
        return back()->with('status', 'Module Archived Successfully');
    }

    public function getModulePerClass(Request $request, $id)
    {   
        $keyword = $request->keyword;
        $modules = Module::where('id', '=', $id)
                        ->where('name', 'LIKE', '%'.$keyword.'%')
                        //->orWhere('description', 'LIKE', '%'.$keyword.'%')
                        ->paginate(10);
                        
        return view('references.module.class', [
            'modules' => $modules, 
            'class' => StudentClass::find($id)
        ]);
    }

    public function assignModule(Request $request)
    {
        return view('references.module.add', [
            'modules' => Module::all()
        ]);
    }

    public function assignSubModule(Request $request, $id)
    {
        $keyword = $request->keyword;
        $subModules = SubModule::where('id', '=', $id)
                        ->where('name', 'LIKE', '%'.$keyword.'%')
                        //->orWhere('description', 'LIKE', '%'.$keyword.'%')
                        ->paginate(10);
                        
        return view('references.module.subModule', [
            'subModules' => $subModules, 
            'modules' => Module::find($id)
        ]);
    }
}
