<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Department;
use App\Models\ClinicalService;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $clinical_services = ClinicalService::all();
        $search_by_date = $request->input('search_by_date');
        $clinical_service = $request->input('clinical_service');
        if ($search_by_date && $clinical_service) {
            $appointments = Appointment::where([['clinical_service_id', $clinical_service], ['appointment_date', $search_by_date]])->with('clinical_service', 'clinical_service.department')->paginate(100);
        } elseif ($search_by_date) {
            $appointments = Appointment::where('appointment_date', $search_by_date)->paginate(100);
        } elseif ($clinical_service) {
            $appointments = Appointment::where('clinical_service_id', $clinical_service)->with('clinical_service')->paginate(100);
        } else {
            $appointments = Appointment::paginate(15);
        }
        return view('appointments.index', compact('appointments', "clinical_services"));
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
        $appointment = new Appointment;
        $appointment->patient_id = $request['patient_id'];
        $appointment->appointment_date = $request['appointment_date'];
        $appointment->clinical_service_id = $request['clinical_service'];
        $appointment->description = $request['description'];
        $appointment->save();

        return redirect()->route('show_patient', $request['patient_id']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
