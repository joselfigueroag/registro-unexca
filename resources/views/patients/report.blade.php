
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistema de Registo Clinico</title>



    <!-- Scripts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>

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
       



        <!-- Modal -->
       
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

</body>