@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="table-responsive">               
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Paciente</th>
                        <th scope="col">Fecha de cita</th>
                        <th scope="col">Departamento</th>
                        <th scope="col">Servicio</th>
                        <th scope="col">Description</th>
                    </tr>
                </thead>
                @foreach ($appointments as $appointment)
                    <tr>
                        <th scope="col">{{ $appointment->patient->full_name }}</th>
                        <th scope="col">{{ $appointment->appointment_date }}</th>
                        <th scope="col">{{ $appointment->clinical_service->department->name }}</th>
                        <th scope="col">{{ $appointment->clinical_service->name }}</th>
                        <th scope="col">{{ $appointment->description }}</th>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {!! $appointments->links() !!}
        </div>
    </div>
@endsection
