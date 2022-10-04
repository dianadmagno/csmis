<?php

namespace App\Http\Controllers\Transactions;

use Illuminate\Http\Request;
use App\Models\References\Rank;
use App\Http\Controllers\Controller;
use App\Models\Transactions\Personnel;
use App\Models\Transactions\StudentClass;
use App\Models\Transactions\PersonnelClass;
use App\Models\References\PersonnelCategory;
use App\Http\Requests\Transactions\PersonnelRequest;
use PDF;

class PersonnelController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        return view('transactions.personnels.index', [
            'personnels' => Personnel::where('lastname', 'like', '%'.$keyword.'%')
                                ->orWhere('firstname', 'like', '%'.$keyword.'%')
                                ->orWhere('middlename', 'like', '%'.$keyword.'%')
                                ->orWhereHas('personnelClasses', function($query) use($keyword) {
                                    $query->whereHas('studentClass', function($query) use($keyword) {
                                        $query->where('name', 'like', '%'.$keyword.'%')
                                            ->orWhere('alias', 'like', '%'.$keyword.'%');
                                    });
                                })
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
        $personnelCategories = PersonnelCategory::all();
        $ranks = Rank::all();
        return view('transactions.personnels.create', [
            'personnelCategories' => $personnelCategories,
            'ranks' => $ranks
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonnelRequest $request)
    {
        Personnel::create($request->all());
        return redirect()->route('personnel.index')->with('status', 'Personnel Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $personnel = Personnel::find($id);
        $ranks = Rank::all();
        $personnelCategories = PersonnelCategory::all();
        return view('transactions.personnels.edit', [
            'personnel' => $personnel,
            'ranks' => $ranks,
            'personnelCategories' => $personnelCategories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PersonnelRequest $request, $id)
    {
        $personnel = Personnel::find($id);
        $personnel->update($request->all());
        return back()->with('status', 'Personnel Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function assignClass($id)
    {
        $classes = StudentClass::where('is_active', true)->get();
        $personnel = Personnel::find($id);
        return view('transactions.personnels.assign_class', [
            'classes' => $classes,
            'personnel' => $personnel
        ]);
    }

    public function assignedClasses($id)
    {
        $classes = StudentClass::whereHas('personnelClasses', function($query) use($id) {
            $query->where('personnel_id', $id);
        })->paginate(10);
        $personnel = Personnel::find($id);
        return view('transactions.personnels.assigned_classes', [
            'classes' => $classes,
            'personnel' => $personnel
        ]);
    }

    public function storeAssignClass(Request $request, $id)
    {
        $personnelClass = PersonnelClass::where('class_id', $request->class_id)->where('personnel_id', $id)->first();
        if ($personnelClass) {
            return back()->with('status', 'Class already assigned to this personnel');
        }

        PersonnelClass::create([
            'personnel_id' => $id,
            'class_id' => $request->class_id
        ]);
        return redirect()->route('personnel.index')->with('status', 'Class Assigned Successfully');
    }

    public function personnelListPDF()
    {
        $personnels = Personnel::with('rank', 'personnelCategory', 'personnelClasses')->get();
        view()->share('personnels', $personnels);
        $pdf = PDF::loadView('reports.reportsPDF.personnelList', compact('personnels'));
        
        // return($personnels);
        return $pdf->setPaper("a4","landscape")->stream('personnel_list.pdf');        
    }

}
