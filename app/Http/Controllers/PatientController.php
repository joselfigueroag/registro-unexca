<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientRequest;
use App\Models\Appointment;
use App\Models\BloodType;
use App\Models\Capital;
use App\Models\CivilStatus;
use App\Models\ClinicalService;
use App\Models\ContactInfo;
use App\Models\Country;
use App\Models\Habit;
use App\Models\Department;
use App\Models\FamilyBackground;
use App\Models\Municipality;
use App\Models\Parish;
use App\Models\Patient;
use App\Models\PersonalBackground;
use App\Models\State;
use Illuminate\Http\Request;
use PDF;
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
        $blood_types = BloodType::all();
        $countries = Country::all();
        $states = State::all();
        $capitals = Capital::all();
        $municipalities = Municipality::all();
        $parishes = Parish::all();
        return view(
            'patients.register',
            compact(
                'civil_status',
                'blood_types',
                'countries',
                'states',
                'capitals',
                'municipalities',
                'parishes',
            )
        );
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
        $patient->gender_id = $request['gender'];
        $patient->identification_number = $request['identification_number'];
        $patient->birthday_date = $request['birthday_date'];
        $patient->clinic_history = generateClinicHistory($patient);
        $patient->civil_status_id = $request['civil_status'];
        $patient->blood_type_id = $request['blood_type'];
        $patient->organ_donor = $request['organ_donor'] ? $request['organ_donor'] : 'f';
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

        $habit = new Habit;
        $habit->patient_id = $patient->id;
        $habit->smoker = $request['smoker'] ? $request['smoker'] : 'f';
        $habit->drink_liquor = $request['drink_liquor'] ? $request['drink_liquor'] : 'f';
        $habit->use_drugs = $request['use_drugs'] ? $request['use_drugs'] : 'f';
        $habit->drink_coffee = $request['drink_coffee'] ? $request['drink_coffee'] : 'f';
        $habit->treatment = $request['treatment'] ? $request['treatment'] : 'f';
        $habit->training = $request['training'] ? $request['training'] : 'f';
        $habit->save();

        $family_background = new FamilyBackground;
        $family_background->patient_id = $patient->id;
        $family_background->diabetes_f = $request['diabetes_f'] ? $request['diabetes_f'] : 'f';
        $family_background->hypertension_f = $request['hypertension_f'] ? $request['hypertension_f'] : 'f';
        $family_background->allergies_f = $request['allergies_f'] ? $request['allergies_f'] : 'f';
        $family_background->asthma_f = $request['asthma_f'] ? $request['asthma_f'] : 'f';
        $family_background->epilepsy_f = $request['epilepsy_f'] ? $request['epilepsy_f'] : 'f';
        $family_background->obesity_f = $request['obesity_f'] ? $request['obesity_f'] : 'f';
        $family_background->alcoholism_f = $request['alcoholism_f'] ? $request['alcoholism_f'] : 'f';
        $family_background->carcinomas_f = $request['carcinomas_f'] ? $request['carcinomas_f'] : 'f';
        $family_background->heart_disease_f = $request['heart_disease_f'] ? $request['heart_disease_f'] : 'f';
        $family_background->liver_disease_f = $request['liver_disease_f'] ? $request['liver_disease_f'] : 'f';
        $family_background->nephropathy_f = $request['nephropathy_f'] ? $request['nephropathy_f'] : 'f';
        $family_background->psychological_f = $request['psychological_f'] ? $request['psychological_f'] : 'f';
        $family_background->neurological_f = $request['neurological_f'] ? $request['neurological_f'] : 'f';
        $family_background->endocrine_f = $request['endocrine_f'] ? $request['endocrine_f'] : 'f';
        $family_background->hematological_f = $request['hematological_f'] ? $request['hematological_f'] : 'f';
        $family_background->autoimmune_f = $request['autoimmune_f'] ? $request['autoimmune_f'] : 'f';
        $family_background->save();

        $personal_background = new PersonalBackground;
        $personal_background->patient_id = $patient->id;
        $personal_background->diabetes_p = $request['diabetes_p'] ? $request['diabetes_p'] : 'f';
        $personal_background->hypertension_p = $request['hypertension_p'] ? $request['hypertension_p'] : 'f';
        $personal_background->hiv_p = $request['hiv_p'] ? $request['hiv_p'] : 'f';
        $personal_background->allergies_p = $request['allergies_p'] ? $request['allergies_p'] : 'f';
        $personal_background->carcinomas_p = $request['carcinomas_p'] ? $request['carcinomas_p'] : 'f';
        $personal_background->surgeries_p = $request['surgeries_p'] ? $request['surgeries_p'] : 'f';
        $personal_background->heart_disease_p = $request['heart_disease_p'] ? $request['heart_disease_p'] : 'f';
        $personal_background->liver_disease_p = $request['liver_disease_p'] ? $request['liver_disease_p'] : 'f';
        $personal_background->nephropathy_p = $request['nephropathy_p'] ? $request['nephropathy_p'] : 'f';
        $personal_background->psychological_p = $request['psychological_p'] ? $request['psychological_p'] : 'f';
        $personal_background->neurological_p = $request['neurological_p'] ? $request['neurological_p'] : 'f';
        $personal_background->endocrine_p = $request['endocrine_p'] ? $request['endocrine_p'] : 'f';
        $personal_background->hematological_p = $request['hematological_p'] ? $request['hematological_p'] : 'f';
        $personal_background->autoimmune_p = $request['autoimmune_p'] ? $request['autoimmune_p'] : 'f';
        $personal_background->respiratory_p = $request['respiratory_p'] ? $request['respiratory_p'] : 'f';
        $personal_background->save();

        return redirect()->action([PatientController::class, 'show'], ['id' => $patient->id]);
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

    public function report($id)
    {
        $patient = Patient::find($id=$id);
        $departments = Department::all();
        $clinical_services = ClinicalService::all();
        //$pdf = PDF::loadView('patients.show', compact('patient', 'departments', 'clinical_services'));
        $pdf = PDF::loadView('patients.report',['patient' => $patient, 'departments' => $departments, 'clinical_services' =>$clinical_services]);
        return $pdf->stream('archivo.pdf') ;
        //return view('patients.report',['patient' => $patient, 'departments' => $departments, 'clinical_services' =>$clinical_services]);
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
        $blood_types = BloodType::all();
        $countries = Country::all();
        $states = State::all();
        $capitals = Capital::all();
        $municipalities = Municipality::all();
        $parishes = Parish::all();
        return view(
            'patients.edit',
            compact(
                'patient',
                'civil_status',
                'blood_types',
                'countries',
                'states',
                'capitals',
                'municipalities',
                'parishes',
            )
        );
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
        $patient['organ_donor'] = $data['organ_donor'];
        $patient['blood_type_id'] = $data['blood_type'];
        $patient->fill($data);
        $patient->save();
        
        $contact_info = $patient->contact_info;
        $contact_info->fill($data);
        $contact_info->save();

        $habits = $patient->habits;
        $habits->smoker = $request['smoker'] ? $request['smoker'] : 'f';
        $habits->drink_liquor = $request['drink_liquor'] ? $request['drink_liquor'] : 'f';
        $habits->use_drugs = $request['use_drugs'] ? $request['use_drugs'] : 'f';
        $habits->drink_coffee = $request['drink_coffee'] ? $request['drink_coffee'] : 'f';
        $habits->treatment = $request['treatment'] ? $request['treatment'] : 'f';
        $habits->training = $request['training'] ? $request['training'] : 'f';
        $habits->save();

        $family_background = $patient->family_background;
        $family_background->diabetes_f = $request['diabetes_f'] ? $request['diabetes_f'] : 'f';
        $family_background->hypertension_f = $request['hypertension_f'] ? $request['hypertension_f'] : 'f';
        $family_background->allergies_f = $request['allergies_f'] ? $request['allergies_f'] : 'f';
        $family_background->asthma_f = $request['asthma_f'] ? $request['asthma_f'] : 'f';
        $family_background->epilepsy_f = $request['epilepsy_f'] ? $request['epilepsy_f'] : 'f';
        $family_background->obesity_f = $request['obesity_f'] ? $request['obesity_f'] : 'f';
        $family_background->alcoholism_f = $request['alcoholism_f'] ? $request['alcoholism_f'] : 'f';
        $family_background->carcinomas_f = $request['carcinomas_f'] ? $request['carcinomas_f'] : 'f';
        $family_background->heart_disease_f = $request['heart_disease_f'] ? $request['heart_disease_f'] : 'f';
        $family_background->liver_disease_f = $request['liver_disease_f'] ? $request['liver_disease_f'] : 'f';
        $family_background->nephropathy_f = $request['nephropathy_f'] ? $request['nephropathy_f'] : 'f';
        $family_background->psychological_f = $request['psychological_f'] ? $request['psychological_f'] : 'f';
        $family_background->neurological_f = $request['neurological_f'] ? $request['neurological_f'] : 'f';
        $family_background->endocrine_f = $request['endocrine_f'] ? $request['endocrine_f'] : 'f';
        $family_background->hematological_f = $request['hematological_f'] ? $request['hematological_f'] : 'f';
        $family_background->autoimmune_f = $request['autoimmune_f'] ? $request['autoimmune_f'] : 'f';
        $family_background->save();

        $personal_background = $patient->personal_background;
        $personal_background->diabetes_p = $request['diabetes_p'] ? $request['diabetes_p'] : 'f';
        $personal_background->hypertension_p = $request['hypertension_p'] ? $request['hypertension_p'] : 'f';
        $personal_background->hiv_p = $request['hiv_p'] ? $request['hiv_p'] : 'f';
        $personal_background->allergies_p = $request['allergies_p'] ? $request['allergies_p'] : 'f';
        $personal_background->carcinomas_p = $request['carcinomas_p'] ? $request['carcinomas_p'] : 'f';
        $personal_background->surgeries_p = $request['surgeries_p'] ? $request['surgeries_p'] : 'f';
        $personal_background->heart_disease_p = $request['heart_disease_p'] ? $request['heart_disease_p'] : 'f';
        $personal_background->liver_disease_p = $request['liver_disease_p'] ? $request['liver_disease_p'] : 'f';
        $personal_background->nephropathy_p = $request['nephropathy_p'] ? $request['nephropathy_p'] : 'f';
        $personal_background->psychological_p = $request['psychological_p'] ? $request['psychological_p'] : 'f';
        $personal_background->neurological_p = $request['neurological_p'] ? $request['neurological_p'] : 'f';
        $personal_background->endocrine_p = $request['endocrine_p'] ? $request['endocrine_p'] : 'f';
        $personal_background->hematological_p = $request['hematological_p'] ? $request['hematological_p'] : 'f';
        $personal_background->autoimmune_p = $request['autoimmune_p'] ? $request['autoimmune_p'] : 'f';
        $personal_background->respiratory_p = $request['respiratory_p'] ? $request['respiratory_p'] : 'f';
        $personal_background->save();

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
