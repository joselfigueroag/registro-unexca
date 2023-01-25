
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Registo Clinico</title>
    <!-- Scripts -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        @page {
            margin: 0cm 0cm;
        }
        body {
            margin: 1.5cm 0cm 0cm;
        }

        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 1.5cm;
            background-color: #2a0927;
            color: white;
            text-align: center;
            line-height: 30px;
        }
        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 0.5cm;
            text-align: center;
            line-height: 35px;
        }
        </style>
</head>
<header class="bg-primary">
    <h1 class="text-center" >Historia Clinica: {{ $patient->clinic_history }}</h1>
</header>
<footer>
    <h6 class="text-center" >Reporte generado el {{date('Y-m-d')}}</h6>
</footer> 
<body>
<div class="row">
    <div class="col-12" >
      

      <table class="table mt-2 container-sm col-12 ">
        <thead class="">
            <tr>
                <th class="text-center" colspan="3"><h3><u>Informacion Personal</u></h3></th>
            </tr>
          </thead>
        <tbody>
        </tr> 
            <tr> 
              <td class="col-4 small" >
                <p><span class="fw-bold">Primer Nombre: {{ $patient->first_name }}</span></p>
                <p><span class="fw-bold ">Segundo Nombre: {{ $patient->second_name }}</span></p>
                <p><span class="fw-bold ">Genero: {{ $patient->gender->type }}</span></p>
                <p><span class="fw-bold ">Grupo Sanguineo:{{ $patient->blood_type ? $patient->blood_type->group : '' }}</span></p>
              </td>
              <td class="col-4 small" >
                <p><span class="fw-bold ">Primer Apellido: {{ $patient->first_surname }}</span></p>
                <p><span class="fw-bold ">Segundo Apellido: {{ $patient->second_surname }}</span></p>
                <p><span class="fw-bold ">Estado Civil:</span> {{ $patient->civil_status ? $patient->civil_status->type : '' }}</p>
                <p><span class="fw-bold ">Donador de Organos: {{ $patient->organ_donor() }}</span></p>
              </td>
              <td class="col-4 small">
                <p><span class="fw-bold ">Fecha de Nacimiento: {{ $patient->birthday_date }}</span></p>
                <p><span class="fw-bold ">Cedula de Identidad: {{ $patient->identification_number }}</span></p>
                <p><span class="fw-bold ">Edad: {{ $patient->age() }}</span></p>
              </td>
            </tr>
        </tbody>
      </table>
    </div>
</div>
<div class="row">
    <div class="col-12" >
      <table class="table mt-2 container-sm col-12 ">
        <thead class="">
            <tr>
                <th class="text-center" colspan="3"><h3><u>Informacion de Contacto</u></h3></th>
            </tr>
          </thead>
        <tbody>
        </tr> 
            <tr> 
              <td class="col-4 small" >
                <p><span class="fw-bold">Correo:</span> {{ $patient->contact_info->email }}</p>
              </td>
              <td class="col-4 small" >
                <p><span class="fw-bold">Numero Celular:</span> {{ $patient->contact_info->cellphone_number }}</p>
              </td>
              <td class="col-4 small">
                <p><span class="fw-bold">Numero Local:</span> {{ $patient->contact_info->local_number }}</p>
              </td>
            </tr>
        </tbody>
      </table>
    </div>
</div>
<div class="row">
    <div class="col-12" >
      <table class="table mt-2 container-sm col-12 ">
        <thead class="">
            <tr>
                <th class="text-center" colspan="3"><h3><h3><u>Direccion</u></h3></th>
            </tr>
          </thead>
        <tbody>
        </tr> 
            <tr> 
              <td class="col-4 small" >
                    @php
                        $parish = $patient->contact_info->parish;
                    @endphp 
                    <p><span class="fw-bold">Pais:</span>
                        {{ $parish ? $parish->municipality->capital->state->country->name : '' }}
                    </p>
                    <p><span class="fw-bold">Estado:</span>
                        {{ $parish ? $parish->municipality->capital->state->name : '' }}
                    </p>
                    <p><span class="fw-bold">Capital:</span>
                        {{ $parish ? $parish->municipality->capital->name : '' }}
                    </p>
              </td>
              <td class="col-4 small" >
                <p><span class="fw-bold">Municipio:</span>
                        {{ $parish ? $parish->municipality->name : '' }}
                    </p>
                    <p><span class="fw-bold">Parroquia:</span>
                        {{ $parish ? $parish->name : '' }}
                    </p>
              </td>
              <td class="col-4 small">
                    <p><span class="fw-bold">Direccion Principal:</span> {{ $patient->contact_info->principal_address }}</p>
                    <p><span class="fw-bold">Direccion Secundaria:</span> {{ $patient->contact_info->secondary_address }}</p>
              </td>
            </tr>
        </tbody>
      </table>
    </div>
</div>
<div class="row">
    <div class="col-12" >
            @php
                $habits = $patient->habits;
                $family_background = $patient->family_background;
                $personal_background = $patient->personal_background;
            @endphp

      <table class="table mt-2 container-sm col-12 ">
        <thead class="">
            <tr>
                <th class="text-center" colspan="5"><h3><u>Informacion Medica</u></h3></th>
            </tr>
          </thead>
        <tbody>
        </tr> 
            <tr> 
              <td class="col-3 small" >
                        <h6>Habitos<h6>
                        <p><span class="fw-bold small">Fuma: {{ $habits->smoker() }}</span></p>
                        <p><span class="fw-bold small">Consume bebidas alcoholicas: {{ $habits->drink_liquor() }}</span></p>
                        <p><span class="fw-bold small">Usa drogas: {{ $habits->use_drugs() }}</span></p>
                        <p><span class="fw-bold small">Toma cafe: {{ $habits->drink_coffee() }}</span></p>
                        <p><span class="fw-bold small">Cumple con tratamiento: {{ $habits->treatment() }}</span></p>
                        <p><span class="fw-bold small">Hace ejercicio: {{ $habits->training() }}</span></p>
              </td>
              <td class="col-3 small" >
                        <h6>Antecedentes<h6>
                        <p><span class="fw-bold small">Diabetes: {{ $family_background->diabetes_f() }}</span></p>
                        <p><span class="fw-bold small">Hipertension: {{ $family_background->hypertension_f() }}</span></p>
                        <p><span class="fw-bold small">Alergias: {{ $family_background->allergies_f() }}</span></p>
                        <p><span class="fw-bold small">Asma: {{ $family_background->asthma_f() }}</span></p>
                        <p><span class="fw-bold small">Epilepsia: {{ $family_background->epilepsy_f() }}</span></p>
                        <p><span class="fw-bold small">Obesidad: {{ $family_background->obesity_f() }}</span></p>
                        <p><span class="fw-bold small">Alcoholismo: {{ $family_background->alcoholism_f() }}</span></p>
                        <p><span class="fw-bold small">Carcinomas: {{ $family_background->carcinomas_f() }}</span></p>
              </td>
              <td class="col-3 small" >
                        <h6>Familiares<h6>
                        
                        <p><span class="fw-bold small">Cardiopatias: {{ $family_background->heart_disease_f() }}</span></p>
                        <p><span class="fw-bold small">Hepatopatias: {{ $family_background->liver_disease_f() }}</span></p>
                        <p><span class="fw-bold small">Nefropatias: {{ $family_background->nephropathy_f() }}</span></p>
                        <p><span class="fw-bold small">Enf. Psicologicas: {{ $family_background->psychological_f() }}</span></p>
                        <p><span class="fw-bold small">Enf. Neurologicas: {{ $family_background->neurological_f() }}</span></p>
                        <p><span class="fw-bold small">Enf. Endocrinas: {{ $family_background->endocrine_f() }}</span></p>
                        <p><span class="fw-bold small">Enf. Hematologicas: {{ $family_background->hematological_f() }}</span></p>
                        <p><span class="fw-bold small">Enf. Autoinmunes: {{ $family_background->autoimmune_f() }}</span></p>
              </td>
              <td class="col-3 small">
                        <h6>Antecedentes<h6> 
                        <p><span class="fw-bold small">Diabetes: {{ $personal_background->diabetes_p() }}</span></p>
                        <p><span class="fw-bold small">Hipertension: {{ $personal_background->hypertension_p() }}</span></p>
                        <p><span class="fw-bold small">VIH/Sida: {{ $personal_background->hiv_p() }}</span></p>
                        <p><span class="fw-bold small">Alergias: {{ $personal_background->allergies_p() }}</span></p>
                        <p><span class="fw-bold small">Carcinomas: {{ $personal_background->carcinomas_p() }}</span></p>
                        <p><span class="fw-bold small">Cirugias previas: {{ $personal_background->surgeries_p() }}</span></p>
                        <p><span class="fw-bold small">Cardiopatias: {{ $personal_background->heart_disease_p() }}</span></p>
                        <p><span class="fw-bold small">Enf. Respiratorias: {{ $personal_background->respiratory_p() }}</span></p>

              </td>
              <td class="col-3 small">
                        <h6>Personales<h6> 
                        <p><span class="fw-bold small">Hepatopatias: {{ $personal_background->liver_disease_p() }}</span></p>
                        <p><span class="fw-bold small">Nefropatias: {{ $personal_background->nephropathy_p() }}</span></p>
                        <p><span class="fw-bold small">Enf. Psicologicas: {{ $personal_background->psychological_p() }}</span></p>
                        <p><span class="fw-bold small">Enf. Neurologicas: {{ $personal_background->neurological_p() }}</span></p>
                        <p><span class="fw-bold small">Enf. Endocrinas: {{ $personal_background->endocrine_p() }}</span></p>
                        <p><span class="fw-bold small">Enf. Hematologicas: {{ $personal_background->hematological_p() }}</span></p>
                        <p><span class="fw-bold small">Enf. Autoinmunes: {{ $personal_background->autoimmune_p() }}</span></p>
              </td>
            </tr>
        </tbody>
      </table>
    </div>
</div>
</body>