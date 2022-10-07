<?php

namespace App\Http\Controllers\Transactions;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Transactions\ClassPlatoon;

class ClassPlatoonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $companyId)
    {
        return view('transactions.platoon.index', [
            'platoons' => ClassPlatoon::where('id', $companyId)
                    ->get(),
            'company' => StudentClass::find($id)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('transactions.platoon.create', [
            'company' => StudentClass::find($id)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transactions\ClassPlatoon  $classPlatoon
     * @return \Illuminate\Http\Response
     */
    public function show(ClassPlatoon $classPlatoon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transactions\ClassPlatoon  $classPlatoon
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassPlatoon $classPlatoon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transactions\ClassPlatoon  $classPlatoon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassPlatoon $classPlatoon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transactions\ClassPlatoon  $classPlatoon
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassPlatoon $classPlatoon)
    {
        //
    }
}
