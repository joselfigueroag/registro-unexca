<?php

namespace App\Http\Controllers;

use App\Models\ClinicalService;
use App\Models\Department;
use Illuminate\Http\Request;

class ClinicalServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clinical_services = ClinicalService::paginate(10);
        $departments = Department::all();
        return view('clinical_services.index', compact('clinical_services', 'departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $department = Department::where('name', $request['department'])->get()->first();

        $clinical_service = new ClinicalService;
        $clinical_service->name = ucwords($request['name']);
        $clinical_service->department_id = $department->id;
        $clinical_service->save();
        return redirect()->route('list_clinical_services');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClinicalService  $clinicalService
     * @return \Illuminate\Http\Response
     */
    public function show(ClinicalService $clinicalService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClinicalService  $clinicalService
     * @return \Illuminate\Http\Response
     */
    public function edit(ClinicalService $clinicalService)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClinicalService  $clinicalService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClinicalService $clinicalService)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClinicalService  $clinicalService
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clinical_service = ClinicalService::find($id);
        $clinical_service->delete();
        return redirect()->route('list_clinical_services');
    }
}
