<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClinicalServiceRequest;
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
    public function store(ClinicalServiceRequest $request)
    {   
        $clinical_service = new ClinicalService;
        $clinical_service->name = ucwords($request['name']);
        $clinical_service->department_id = $request['department_id'];
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
    public function update(Request $request, $id)
    {
        $clinical_service = ClinicalService::find($id);
        $clinical_service->name = ucwords($request['name_edited']);
        $clinical_service->department_id = ucwords($request['department_edited']);
        $clinical_service->save();
        return redirect()->route('list_clinical_services');
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
