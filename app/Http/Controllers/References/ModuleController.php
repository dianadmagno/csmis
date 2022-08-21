<?php

namespace App\Http\Controllers\References;

use Illuminate\Http\Request;
use App\Models\References\Module;
use App\Models\References\Subject;
use App\Http\Controllers\Controller;
use App\Models\References\SubModule;
use App\Models\Transactions\Personnel;
use App\Models\Transactions\StudentClass;
use App\Http\Requests\References\ModuleRequest;
use App\Models\Transactions\ClassSubjectInstructor;

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
        $modules = ClassSubjectInstructor::select('tr_classes.id as class_id', 'rf_modules.id as module_id', 'rf_modules.name as module_name', 'rf_modules.description as module_desc')
                        ->join('tr_classes', 'tr_classes.id', '=', 'tr_class_subject_instructors.class_id')
                        ->join('rf_subjects', 'rf_subjects.id', '=', 'tr_class_subject_instructors.subject_id')
                        ->where('class_id', '=', $id)
                        //->where('name', 'LIKE', '%'.$keyword.'%')
                        //->orWhere('description', 'LIKE', '%'.$keyword.'%')
                        ->paginate(10);
                        
        return view('references.module.class', [
            'modules' => $modules, 
            'class' => StudentClass::find($id)
        ]);
    }

    public function assignModule(Request $request, $id)
    {
        // $subModules = SubModule::where('module_id', '=', $id)
        //                 ->get();

        // foreach($subModules as $subModule) {
        //     $subjects = Subject::where('sub_module_id', '=', $subModule['id'])->get();
        //     foreach($subjects as $subject) {
        //         $sub = ClassSubjectInstructor::create([
        //             'class_id' => $id,
        //             'subject_id' => $subject['id']
        //         ]);
        //     }
        // }

        return view('references.module.add', [
            'modules' => ClassSubjectInstructor::where('class_id', '=', $id)->get(),
            'class' => StudentClass::find($id)
        ]);
    }

    public function assignedModule(Request $request, $id)
    {
        $subModules = SubModule::where('module_id', '=', $id)
                        ->get();

        foreach($subModules as $subModule) {
            $subjects = Subject::where('sub_module_id', '=', $subModule['id'])->get();
            foreach($subjects as $subject) {
                $sub = ClassSubjectInstructor::create([
                    'class_id' => $id,
                    'subject_id' => $subject['id']
                ]);
            }
        }

        return view('references.module.add', [
            'modules' => Module::all()
        ]);
    }

    public function assignSubModule(Request $request, $id)
    {
        $keyword = $request->keyword;
        $subModules = SubModule::join('rf_modules', 'rf_modules.id', '=', 'rf_sub_modules.module_id')
                        ->select('rf_modules.id as module_id', 'rf_modules.name as module_name', 'rf_modules.description as module_description', 'rf_sub_modules.description as sub_module_name')
                        ->where('rf_modules.name', 'LIKE', '%'.$keyword.'%')
                        ->orWhere('rf_modules.description', 'LIKE', '%'.$keyword.'%')
                        ->paginate(10);
                        
        return view('references.module.subModule', [
            'subModules' => $subModules, 
            'modules' => Module::find($id)
        ]);
    }

    public function assignedSubjects(Request $request, $id)
    {   
        $keyword = $request->keyword;
        $subjects = Subject::where('id', '=', $id)
                        ->where('name', 'LIKE', '%'.$keyword.'%')
                        //->orWhere('description', 'LIKE', '%'.$keyword.'%')
                        ->paginate(10);
                        
        return view('references.module.subject', [
            'subjects' => $subjects, 
            'subModules' => SubModule::find($id)
        ]);
    }

    public function updateInstructor(Request $request, $id)
    {
        $personnels = Personnel::all();
                        
        return view('references.module.instructor', [
            'instructors' => $personnels,
            'class' => StudentClass::find($id)
        ]);
    }

    public function assignedInstructor(Request $request, $id)
    {   
        $keyword = $request->keyword;
        $data = ClassSubjectInstructor::find($id);
        $data->update($request->all());
                        
        return view('references.module.subject', [
            'subjects' => $subjects, 
            'subModules' => SubModule::find($id)
        ]);
    }
}
