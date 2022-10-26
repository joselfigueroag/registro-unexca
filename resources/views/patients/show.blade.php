@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex border p-2 mb-3">
            <div class="col-4">
                <p><span class="fw-bold">Primer Nombre:</span> {{ $patient->first_name }}</p>
                <p><span class="fw-bold">Segundo Nombre:</span> {{ $patient->second_name }}</p>
                <p><span class="fw-bold">Primer Apellido:</span> {{ $patient->first_surname }}</p>
                <p><span class="fw-bold">Segundo Apellido:</span> {{ $patient->second_surname }}</p>

            </div>
            <div class="col-4">
                <p><span class="fw-bold">Cedula de Identidad:</span> {{ $patient->identification_number }}</p>
                <p><span class="fw-bold">Fecha de Nacimiento:</span> {{ $patient->birthday_date }}</p>
                <p><span class="fw-bold">Genero:</span> {{ $patient->gender }}</p>
            </div>
            <div class="col-4">
                <p><span class="fw-bold">Historia Clinica:</span> {{ $patient->clinic_history }}</p>
                <p><span class="fw-bold">Direccion 1:</span> {{ $patient->additional_info->address_1 }}</p>
                <p><span class="fw-bold">Direccion 2:</span> {{ $patient->additional_info->address_2 }}</p>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            @hasrole('admin')
                <a class="btn btn-primary mr-auto me-3" type="submit" onclick="deleteConfirm(event)"
                    href="/patients/{{ $patient->id }}/delete">Eliminar</a>
            @endhasrole
            <a class="btn btn-primary mr-auto" href="/patients/{{ $patient->id }}/edit">Editar</a>
        </div>
        <hr size="10" class="mt-3">

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#appointmentFromPatientModal">
            Nueva cita
        </button>

        <!-- Modal -->
        <div class="modal fade" id="appointmentFromPatientModal" tabindex="-1" aria-labelledby="appointmentFromPatientModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="appointmentFromPatientModalLabel">Nueva cita</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="p-3 border border-primary rounded"
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
                                <select name="department" id="department" onchange="load_services(this);">
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                    <option selected value="" hidden>Seleccionar</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="clinical_service">Servicio clinico</label>
                                <select name="clinical_service" id="clinical_service" disabled>
                                    <option selected="selected" value="" hidden>Seleccionar</option>
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
                    </form>
                </div>
            </div>
        </div>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">Fecha de cita</th>
                    <th scope="col">Departamento</th>
                    <th scope="col">Servicio</th>
                    <th scope="col">Description</th>
                </tr>
            </thead>
            @foreach ($patient->appointments as $appointment)
                <tr>
                    <th scope="col">{{ $appointment->appointment_date }}</th>
                    <th scope="col">{{ $appointment->department->name }}</th>
                    <th scope="col">{{ $appointment->clinical_service->name }}</th>
                    <th scope="col">{{ $appointment->description }}</th>
                </tr>
            @endforeach
        </table>
    </div>
@endsection

<script>
    var servicios = new Array();
    servicios = @json($clinical_services);
    console.log(servicios);

    function load_services(obj){
        //document.getElementById('clinical_service').options.length=0;
        document.getElementById('clinical_service').disabled = false;
        var x=1;
        for (var i=0; i < servicios.length;i++){
            if (servicios[i].department_id == obj.value){
            document.getElementById('clinical_service').options[x]=new Option(servicios[i].name, servicios[i].id);
            x++;
            }
        }
        console.log(obj.value);
        //document.getElementById('clinical_service').options[]=new Option("Seleccionar", " ");
    }
</script>