@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between">
            <h3><u>Informacion Personal</u></h3>
            <p><span class="fw-bold">Historia Clinica:</span> {{ $patient->clinic_history }}</p>
        </div>
        <div class="d-flex border p-2 mb-3">
            <div class="col-4">
                <p><span class="fw-bold">Primer Nombre:</span> {{ $patient->first_name }}</p>
                <p><span class="fw-bold">Segundo Nombre:</span> {{ $patient->second_name }}</p>
                <p><span class="fw-bold">Genero:</span> {{ $patient->gender->type }}</p>
                <p><span class="fw-bold">Grupo Sanguineo:</span>
                    {{ $patient->blood_type ? $patient->blood_type->group : '' }}</p>
            </div>
            <div class="col-4">
                <p><span class="fw-bold">Primer Apellido:</span> {{ $patient->first_surname }}</p>
                <p><span class="fw-bold">Segundo Apellido:</span> {{ $patient->second_surname }}</p>
                <p><span class="fw-bold">Estado Civil:</span>
                    {{ $patient->civil_status ? $patient->civil_status->type : '' }}</p>
                <p><span class="fw-bold">Donador de Organos:</span> {{ $patient->organ_donor() }}</p>
            </div>
            <div class="col-4">
                <p><span class="fw-bold">Fecha de Nacimiento:</span> {{ $patient->birthday_date }}</p>
                <p><span class="fw-bold">Cedula de Identidad:</span> {{ $patient->identification_number }}</p>
                <p><span class="fw-bold">Edad:</span> {{ $patient->age() }}</p>
            </div>
        </div>
        <div>
            <h3><u>Informacion de Contacto</u></h3>
        </div>
        <div class="d-flex border p-2 mb-3">
            <div class="col-4">
                <p><span class="fw-bold">Correo:</span> {{ $patient->contact_info->email }}</p>
            </div>
            <div class="col-4">
                <p><span class="fw-bold">Numero Celular:</span> {{ $patient->contact_info->cellphone_number }}</p>
            </div>
            <div class="col-4">
                <p><span class="fw-bold">Numero Local:</span> {{ $patient->contact_info->local_number }}</p>
            </div>
        </div>
        <div>
            <h3><u>Direccion</u></h3>
        </div>
        <div class="d-flex border p-2 mb-3">
            @php
                $parish = $patient->contact_info->parish;
            @endphp
            <div class="col-4">
                <p><span class="fw-bold">Pais:</span>
                    {{ $parish ? $parish->municipality->capital->state->country->name : '' }}
                </p>
                <p><span class="fw-bold">Estado:</span>
                    {{ $parish ? $parish->municipality->capital->state->name : '' }}
                </p>
                <p><span class="fw-bold">Capital:</span>
                    {{ $parish ? $parish->municipality->capital->name : '' }}
                </p>
            </div>
            <div class="col-4">
                <p><span class="fw-bold">Municipio:</span>
                    {{ $parish ? $parish->municipality->name : '' }}
                </p>
                <p><span class="fw-bold">Parroquia:</span>
                    {{ $parish ? $parish->name : '' }}
                </p>
            </div>
            <div class="col-4">
                <p><span class="fw-bold">Direccion Principal:</span> {{ $patient->contact_info->principal_address }}</p>
                <p><span class="fw-bold">Direccion Secundaria:</span> {{ $patient->contact_info->secondary_address }}</p>
            </div>
        </div>
        <div>
            <h3><u>Informacion Medica</u></h3>
        </div>
        <div class="p-3 border rounded">
            @php
                $habits = $patient->habits;
            @endphp
            <div>
                <h6>Habitos<h6>
            </div>
            <div class="d-flex">
                <div class="d-flex flex-wrap">
                    <div class="form-check custom-div">
                        <p><span class="fw-bold">Fuma:</span>
                            {{ $habits->smoker() }}
                        </p>
                    </div>
                    <div class="form-check custom-div">
                        <p><span class="fw-bold">Consume bebidas alcoholicas:</span>
                            {{ $habits->drink_liquor() }}
                        </p>
                    </div>
                    <div class="form-check custom-div">
                        <p><span class="fw-bold">Usa drogas:</span>
                            {{ $habits->use_drugs() }}
                        </p>
                    </div>
                    <div class="form-check custom-div">
                        <p><span class="fw-bold">Toma cafe:</span>
                            {{ $habits->drink_coffee() }}
                        </p>
                    </div>
                    <div class="form-check custom-div">
                        <p><span class="fw-bold">Cumple con tratamiento:</span>
                            {{ $habits->treatment() }}
                        </p>
                    </div>
                    <div class="form-check custom-div">
                        <p><span class="fw-bold">Hace ejercicio:</span>
                            {{ $habits->training() }}
                        </p>
                    </div>
                </div>
            </div>
            @php
                $family_background = $patient->family_background;
            @endphp
            <div>
                <h6>Antecedentes Familiares<h6>
            </div>
            <div class="d-flex">
                <div class="d-flex flex-wrap">
                    <div class="form-check custom-div">
                        <p><span class="fw-bold">Diabetes:</span>
                            {{ $family_background->diabetes_f() }}
                        </p>
                    </div>
                    <div class="form-check custom-div">
                        <p><span class="fw-bold">Hipertension:</span>
                            {{ $family_background->hypertension_f() }}
                        </p>
                    </div>
                    <div class="form-check custom-div">
                        <p><span class="fw-bold">Alergias:</span>
                            {{ $family_background->allergies_f() }}
                        </p>
                    </div>
                    <div class="form-check custom-div">
                        <p><span class="fw-bold">Asma:</span>
                            {{ $family_background->asthma_f() }}
                        </p>
                    </div>
                    <div class="form-check custom-div">
                        <p><span class="fw-bold">Epilepsia:</span>
                            {{ $family_background->epilepsy_f() }}
                        </p>
                    </div>
                    <div class="form-check custom-div">
                        <p><span class="fw-bold">Obesidad:</span>
                            {{ $family_background->obesity_f() }}
                        </p>
                    </div>
                    <div class="form-check custom-div">
                        <p><span class="fw-bold">Alcoholismo:</span>
                            {{ $family_background->alcoholism_f() }}
                        </p>
                    </div>
                    <div class="form-check custom-div">
                        <p><span class="fw-bold">Carcinomas:</span>
                            {{ $family_background->carcinomas_f() }}
                        </p>
                    </div>
                    <div class="form-check custom-div">
                        <p><span class="fw-bold">Cardiopatias:</span>
                            {{ $family_background->heart_disease_f() }}
                        </p>
                    </div>
                    <div class="form-check custom-div">
                        <p><span class="fw-bold">Hepatopatias:</span>
                            {{ $family_background->liver_disease_f() }}
                        </p>
                    </div>
                    <div class="form-check custom-div">
                        <p><span class="fw-bold">Nefropatias:</span>
                            {{ $family_background->nephropathy_f() }}
                        </p>
                    </div>
                    <div class="form-check custom-div">
                        <p><span class="fw-bold">Enf. Psicologicas:</span>
                            {{ $family_background->psychological_f() }}
                        </p>
                    </div>
                    <div class="form-check custom-div">
                        <p><span class="fw-bold">Enf. Neurologicas:</span>
                            {{ $family_background->neurological_f() }}
                        </p>
                    </div>
                    <div class="form-check custom-div">
                        <p><span class="fw-bold">Enf. Endocrinas:</span>
                            {{ $family_background->endocrine_f() }}
                        </p>
                    </div>
                    <div class="form-check custom-div">
                        <p><span class="fw-bold">Enf. Hematologicas:</span>
                            {{ $family_background->hematological_f() }}
                        </p>
                    </div>
                    <div class="form-check custom-div">
                        <p><span class="fw-bold">Enf. Autoinmunes:</span>
                            {{ $family_background->autoimmune_f() }}
                        </p>
                    </div>
                </div>
            </div>
            @php
                $personal_background = $patient->personal_background;
            @endphp
            <div>
                <h6>Antecedentes Familiares<h6>
            </div>
            <div class="d-flex">
                <div class="d-flex flex-wrap">
                    <div class="form-check custom-div">
                        <p><span class="fw-bold">Diabetes:</span>
                            {{ $personal_background->diabetes_p() }}
                        </p>
                    </div>
                    <div class="form-check custom-div">
                        <p><span class="fw-bold">Hipertension:</span>
                            {{ $personal_background->hypertension_p() }}
                        </p>
                    </div>
                    <div class="form-check custom-div">
                        <p><span class="fw-bold">VIH/Sida:</span>
                            {{ $personal_background->hiv_p() }}
                        </p>
                    </div>
                    <div class="form-check custom-div">
                        <p><span class="fw-bold">Alergias:</span>
                            {{ $personal_background->allergies_p() }}
                        </p>
                    </div>
                    <div class="form-check custom-div">
                        <p><span class="fw-bold">Carcinomas:</span>
                            {{ $personal_background->carcinomas_p() }}
                        </p>
                    </div>
                    <div class="form-check custom-div">
                        <p><span class="fw-bold">Cirugias previas:</span>
                            {{ $personal_background->surgeries_p() }}
                        </p>
                    </div>
                    <div class="form-check custom-div">
                        <p><span class="fw-bold">Cardiopatias:</span>
                            {{ $personal_background->heart_disease_p() }}
                        </p>
                    </div>
                    <div class="form-check custom-div">
                        <p><span class="fw-bold">Hepatopatias:</span>
                            {{ $personal_background->liver_disease_p() }}
                        </p>
                    </div>
                    <div class="form-check custom-div">
                        <p><span class="fw-bold">Nefropatias:</span>
                            {{ $personal_background->nephropathy_p() }}
                        </p>
                    </div>
                    <div class="form-check custom-div">
                        <p><span class="fw-bold">Enf. Psicologicas:</span>
                            {{ $personal_background->psychological_p() }}
                        </p>
                    </div>
                    <div class="form-check custom-div">
                        <p><span class="fw-bold">Enf. Neurologicas:</span>
                            {{ $personal_background->neurological_p() }}
                        </p>
                    </div>
                    <div class="form-check custom-div">
                        <p><span class="fw-bold">Enf. Endocrinas:</span>
                            {{ $personal_background->endocrine_p() }}
                        </p>
                    </div>
                    <div class="form-check custom-div">
                        <p><span class="fw-bold">Enf. Hematologicas:</span>
                            {{ $personal_background->hematological_p() }}
                        </p>
                    </div>
                    <div class="form-check custom-div">
                        <p><span class="fw-bold">Enf. Autoinmunes:</span>
                            {{ $personal_background->autoimmune_p() }}
                        </p>
                    </div>
                    <div class="form-check custom-div">
                        <p><span class="fw-bold">Enf. Respiratorias:</span>
                            {{ $personal_background->respiratory_p() }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end mt-3">
            @hasrole('teacher')
                <a class="btn btn-primary mr-auto me-3" type="submit" onclick="deleteConfirm(event)"
                    href="/patients/{{ $patient->id }}/delete">Eliminar</a>
            @endhasrole
            <a class="btn btn-primary mr-auto me-3" href="/patients/{{ $patient->id }}/edit">Editar</a>
            <a class="btn btn-primary mr-auto" target="_blank" href="/patients/{{ $patient->id }}/report">Imprimir Ficha</a>
        </div>
        <hr size="10" class="mt-3">

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
            data-bs-target="#appointmentFromPatientModal">
            Nueva cita
        </button>

        <!-- Modal -->
        <div class="modal fade" id="appointmentFromPatientModal" tabindex="-1"
            aria-labelledby="appointmentFromPatientModalLabel" aria-hidden="true" data-bs-backdrop="static"
            data-bs-keyboard="false">
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
                    <th scope="col">{{ $appointment->clinical_service->department->name }}</th>
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

    function load_services(obj) {
        //document.getElementById('clinical_service').options.length=0;
        document.getElementById('clinical_service').disabled = false;
        var x = 1;
        for (var i = 0; i < servicios.length; i++) {
            if (servicios[i].department_id == obj.value) {
                document.getElementById('clinical_service').options[x] = new Option(servicios[i].name, servicios[i].id);
                x++;
            }
        }
        console.log(obj.value);
        //document.getElementById('clinical_service').options[]=new Option("Seleccionar", " ");
    }
</script>
