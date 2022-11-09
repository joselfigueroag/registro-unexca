<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientRequest;
use App\Models\AdditionalInfo;
use App\Models\Appointment;
use App\Models\ClinicalService;
use App\Models\Department;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        if($search){
            $patients = Patient::where(
                'identification_number', "LIKE", '%'.$search.'%'
            )->orWhere(
                'clinic_history', "LIKE", '%'.$search.'%'
            )->paginate(15);
        }else{
            $patients = Patient::paginate(15);
        }
        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patients.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PatientRequest $request)
    {   
        $patient = new Patient;
        $patient->first_name = ucwords($request['first_name']);
        $patient->second_name = ucwords($request['second_name']);
        $patient->first_surname = ucwords($request['first_surname']);
        $patient->second_surname = ucwords($request['second_surname']);
        $patient->gender = $request['gender'];
        $patient->identification_number = $request['identification_number'];
        $patient->birthday_date = $request['birthday_date'];
        $patient->email = $request['email'];
        $patient->clinic_history = generateClinicHistory($patient);
        $patient->save();

        $additional_info = new AdditionalInfo;
        $additional_info->patient_id = $patient->id;
        $additional_info->address_1 = $request['address_1'];
        $additional_info->address_2 = $request['address_2'];
        $additional_info->save();

        return redirect()->action([PatientController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = Patient::find($id=$id);
        $departments = Department::all();
        $clinical_services = ClinicalService::all();
        return view('patients.show', compact('patient', 'departments', 'clinical_services'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = Patient::find($id=$id);
        return view('patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(PatientRequest $request, $id)
    {
        $patient = Patient::find($id);
        $patient->fill($request->all());
        $patient->save();
        
        $addit_info = $patient->additional_info;
        $addit_info->fill($request->all());
        $addit_info->save();

        return redirect()->action([PatientController::class, 'show'], ['id' => $patient->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = Patient::find($id);
        $patient->delete();
        
        return redirect()->action([PatientController::class, 'index']);
    }
}
