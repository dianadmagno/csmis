<?php

namespace App\Http\Controllers\References;

use App\Models\References\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        return view('references.company.index', [
            'companies' => Company::where('name', 'LIKE', '%'.$keyword.'%')
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
        return view('references.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Company::create($request->all());
        return redirect()->route('company.index')->with('status', 'Company Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\References\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\References\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('references.company.edit', [
            'company' => Company::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\References\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $data = Company::find($id);
        $data->update($request->all());

        $companies = Company::paginate(10);
        return view('references.company.index', [
            'companies' => $companies
        ])->withStatus(__('Company successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\References\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $id = Company::find($id);
        $id->delete();
        return redirect()->route('company.index')->with('status', 'Company Archived Successfully');
    }
}
