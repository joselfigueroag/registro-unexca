<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientRequest;
use App\Models\Appointment;
use App\Models\CivilStatus;
use App\Models\ClinicalService;
use App\Models\ContactInfo;
use App\Models\Country;
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
        return view('patients.index', compact('patients', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $civil_status = CivilStatus::all();
        $countries = Country::with(
            'states', 'states.capital', 'states.capital.municipalities', 'states.capital.municipalities.parishes'
        )->get();
        return view( 'patients.register', compact('civil_status', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $patient = new Patient;
        $patient->first_name = ucwords($request['first_name']);
        $patient->second_name = ucwords($request['second_name']);
        $patient->first_surname = ucwords($request['first_surname']);
        $patient->second_surname = ucwords($request['second_surname']);
        $patient->gender_id = $request['gender'];
        $patient->identification_number = $request['identification_number'];
        $patient->birthday_date = $request['birthday_date'];
        $patient->clinic_history = generateClinicHistory($patient);
        $patient->civil_status_id = $request['civil_status'];
        $patient->save();
        
        $contact_info = new ContactInfo;
        $contact_info->patient_id = $patient->id;
        $contact_info->email = $request['email'];
        $contact_info->principal_address = $request['principal_address'];
        $contact_info->secondary_address = $request['secondary_address'];
        $contact_info->cellphone_number = $request['cellphone_number'];
        $contact_info->local_number = $request['local_number'];
        $contact_info->parish_id = $request['parish'];
        $contact_info->save();

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
        $civil_status = CivilStatus::all();
        return view('patients.edit', compact('patient', 'civil_status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        
        $patient = Patient::find($id);
        $patient['gender_id'] = $data['gender'];
        $patient['civil_status_id'] = $data['civil_status'];
        $patient->fill($data);
        $patient->save();
        
        $contact_info = $patient->contact_info;
        $contact_info->fill($data);
        $contact_info->save();

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
        $appointments = Appointment::where('patient_id', $patient->id)->get();
        
        $patient->delete();
        $appointments->each->delete();
        return redirect()->action([PatientController::class, 'index']);
    }
}
