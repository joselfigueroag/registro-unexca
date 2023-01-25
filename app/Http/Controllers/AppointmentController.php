<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Department;
use App\Models\ClinicalService;
use Illuminate\Http\Request;
use PDF;
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
        $date = $request->input('date');
        $clinical_service = $request->input('clinical_service');
        if ($date && $clinical_service) {
            $appointments = Appointment::where([['clinical_service_id', $clinical_service], ['appointment_date', $date]])->with('clinical_service', 'clinical_service.department')->paginate(100);
        } elseif ($date) {
            $appointments = Appointment::where('appointment_date', $date)->paginate(100);
        } elseif ($clinical_service) {
            $appointments = Appointment::where('clinical_service_id', $clinical_service)->with('clinical_service')->paginate(100);
        } else {
            $appointments = Appointment::paginate(15);
        }
        return view('appointments.index', compact('appointments', "clinical_services", 'date'));
    }
    public function report(Request $request)
    {   
        $clinical_services = ClinicalService::all();
        $date = $request->input('date');
        $clinical_service = $request->input('clinical_service');
        if ($date && $clinical_service) {
            $appointments = Appointment::where([['clinical_service_id', $clinical_service], ['appointment_date', $date]])->with('clinical_service', 'clinical_service.department')->paginate(100);
        } elseif ($date) {
            $appointments = Appointment::where('appointment_date', $date)->paginate(100);
        } elseif ($clinical_service) {
            $appointments = Appointment::where('clinical_service_id', $clinical_service)->with('clinical_service')->paginate(100);
        } else {
            $appointments = Appointment::paginate(15);
        }

        $pdf = PDF::loadView('appointments.report',['appointments' => $appointments, "clinical_services" => $clinical_services, 'date' => $date]);
        return $pdf->stream('appointments.pdf') ;
        //return view('appointments.report', compact('appointments', "clinical_services", 'date'));
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
    //esta funcion se encargara de llenar la grafica se debe hacer un array con todos los datos para de esta forma mandar una sola variable a cada grafico
    public function graf()
    {
        $año = date('Y');
        $mes = date('m');
        $v = 0;
        for ($i = 1; $i <= $mes; $i++) {
            $e = $i;
            switch ($e) {
                case 1:
                    $mes_aux = 'enero';
                    break;
                case 2:
                    $mes_aux = 'febrero';
                    break;
                case 3:
                    $mes_aux = 'marzo';
                    break;
                case 4:
                    $mes_aux = 'abril';
                    break;
                case 5:
                    $mes_aux = 'mayo';
                    break;
                case 6:
                    $mes_aux = 'junio';
                    break;
                case 7:
                    $mes_aux = 'julio';
                    break;
                case 8:
                    $mes_aux = 'agosto';
                    break;
                case 9:
                    $mes_aux = 'septiembre';
                    break;
                case 10:
                    $mes_aux = 'octubre';
                    break;
                case 11:
                    $mes_aux = 'noviembre';
                    break;
                case 12:
                    $mes_aux = 'diciembre';
                    break;

            }
        }

        return view('statistics.index',compact('mes_aux'));
    }
}
