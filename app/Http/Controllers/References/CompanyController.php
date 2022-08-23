<?php

namespace App\Http\Controllers\References;

use Illuminate\Http\Request;
use App\Models\References\Company;
use App\Http\Controllers\Controller;
use App\Http\Requests\References\CompanyRequest;

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
    public function store(CompanyRequest $companyRequest)
    {
        Company::create($companyRequest->all());
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
    public function edit(Company $company, $id)
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
    public function update(CompanyRequest $companyRequest, $id)
    {
        $data = Company::find($id);
        $data->update($companyRequest->all());

        $companies = Company::paginate(10);
        return redirect()->route('company.index', [
            'companies' => $companies
        ])->with('Company Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\References\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Company::find($id);
        $id->delete();
        return back()->with('status', 'Company Archived Successfully');
    }
}
