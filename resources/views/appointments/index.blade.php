@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex border p-2 mb-3">
            <form action="/appointments" method="POST" class="d-flex">
                @csrf
                <input type="date" class="form-control me-2" name="date" value="{{ $date }}">
                <div class="vr"></div>
                <select name="clinical_service" id="clinical_service" class="ms-2 me-2">
                    @foreach ($clinical_services as $clinical_service)
                        <option value="{{ $clinical_service->id }}">{{ $clinical_service->name }}</option>
                    @endforeach
                    <option selected value="" hidden>Seleccionar</option>
                </select>
                <div class="vr"></div>
                <div class="ms-2">
                    <button class="btn btn-primary mr-auto" type="submit">Buscar</button>
                </div>
            </form>
        </div>
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
                        @if ($appointment->patient)
                            <th scope="col">{{ $appointment->patient->full_name }}</th>
                        @else
                            <th scope="col"></th>
                        @endif
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
