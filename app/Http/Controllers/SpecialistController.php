<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorespecialistRequest;
use App\Http\Requests\UpdatespecialistRequest;
use App\Models\ClinicalService;
use App\Models\Department;
use App\Models\Specialist;
use Illuminate\Support\Facades\DB;

class SpecialistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$specialists = DB::select('select * from especialistas');
        //return view('specialists.index',compact('specialists'));
        $specialists = Specialist::paginate(10);

        return view('specialists.index',compact('specialists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        $services = ClinicalService::all();
        return view('specialists.register',['departments' => $departments ,'services' => $services]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorespecialistRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSpecialistRequest $request)
    {
        unset($request['_token']);
        $create = Specialist::create($request->all());
        return redirect()->action([SpecialistController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Specialist  $specialist
     * @return \Illuminate\Http\Response
     */
    public function show(Specialist $specialist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Specialist  $specialist
     * @return \Illuminate\Http\Response
     */
    public function edit(Specialist $specialist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSpecialistRequest  $request
     * @param  \App\Models\Specialist  $specialist
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSpecialistRequest $request, Specialist $specialist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Specialist  $specialist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specialist $specialist)
    {
        //
    }
}
