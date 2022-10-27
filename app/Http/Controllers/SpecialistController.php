<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorespecialistRequest;
use App\Http\Requests\UpdatespecialistRequest;
use App\Models\ClinicalService;
use App\Models\Department;
use App\Models\specialist;
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
        $specialists = DB::select('select * from especialistas');
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
    public function store(StorespecialistRequest $request)
    {
        unset($request['_token']);
        $create = specialist::create($request->all());
        return redirect()->action([SpecialistController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\specialist  $specialist
     * @return \Illuminate\Http\Response
     */
    public function show(specialist $specialist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\specialist  $specialist
     * @return \Illuminate\Http\Response
     */
    public function edit(specialist $specialist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatespecialistRequest  $request
     * @param  \App\Models\specialist  $specialist
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatespecialistRequest $request, specialist $specialist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\specialist  $specialist
     * @return \Illuminate\Http\Response
     */
    public function destroy(specialist $specialist)
    {
        //
    }
}
