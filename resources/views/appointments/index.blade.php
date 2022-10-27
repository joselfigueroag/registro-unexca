@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex mb-3 justify-content-end">
            <!-- Button trigger modal -->
            <div>
                <a class="btn btn-primary mr-auto" name="add" type="button" data-bs-toggle="modal"
                    data-bs-target="#appointmentModal">Nueva Cita</a>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="appointmentModal" tabindex="-1" aria-labelledby="appointmentModalLabel" aria-hidden="true"
            data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="appointmentModalLabel">Nueva cita</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    {{-- <form class="p-3 border border-primary rounded"
                        action="/appointments/register/patient/{{ $patient->id }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" name="patient_id" value="{{ $patient->id }}">
                            <div class="form-group mb-3">
                                <label for="appointment_date">Fecha de Cita</label>
                                <input type="date" class="form-control" name="appointment_date"
                                    value="{{ old('appointment_date') }}">
                                @if ($errors->has('appointment_date'))
                                    <div>{{ $errors->first('appointment_date') }}</div>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label for="department">Departamento</label>
                                <select name="department" id="department">
                                    @foreach ($departments as $department)
                                        <option selected="selected" value="{{ $department->name }}">
                                            {{ $department->name }}</option>
                                    @endforeach
                                    <option selected="selected" value="seleccionar">Seleccionar</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="clinical_service">Servicio clinico</label>
                                <select name="clinical_service" id="clinical_service">
                                    @foreach ($clinical_services as $clinical_service)
                                        <option selected="selected" value="{{ $clinical_service->name }}">
                                            {{ $clinical_service->name }}</option>
                                    @endforeach
                                    <option selected="selected" value="seleccionar">Seleccionar</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description">Descripcion</label>
                                <input type="text" class="form-control" name="description"
                                    value="{{ old('description') }}">
                                @if ($errors->has('description'))
                                    <div>{{ $errors->first('description') }}</div>
                                @endif
                            </div>
                        </div>
                        <hr size="10" class="mt-0">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary mr-auto" type="submit">Guardar</button>
                        </div>
                    </form> --}}
                </div>
            </div>
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
                        <th scope="col">{{ $appointment->patient->full_name }}</th>
                        <th scope="col">{{ $appointment->appointment_date }}</th>
                        <th scope="col">{{ $appointment->department->name }}</th>
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
