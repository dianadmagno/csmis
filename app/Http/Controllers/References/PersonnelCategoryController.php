<?php

namespace App\Http\Controllers\References;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\References\PersonnelCategory;

class PersonnelCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        return view('references.personnelCategory.index', [
            'personnelCategories' => PersonnelCategory::where('name', 'LIKE', '%'.$keyword.'%')
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
        return view('references.personnelCategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PersonnelCategory::create($request->all());
        return back()->with('status', 'Personnel Category Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\References\PersonnelCategory  $personnelCategory
     * @return \Illuminate\Http\Response
     */
    public function show(PersonnelCategory $personnelCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\References\PersonnelCategory  $personnelCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('references.personnelCategory.edit', [
            'personnelCategory' => PersonnelCategory::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\References\PersonnelCategory  $personnelCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = PersonnelCategory::find($id);
        $data->update($request->all());

        $personnelCategories = PersonnelCategory::paginate(10);
        return view('references.personnelCategory.index', [
            'personnelCategories' => $personnelCategories
        ])->back()->with('Personnel Category successfully updated.'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\References\PersonnelCategory  $personnelCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(PersonnelCategory $personnelCategory, $id)
    {
        $id = PersonnelCategory::find($id);
        $id->delete();
        return back()->with('status', 'Personnel Category Archived Successfully');
    }
}
