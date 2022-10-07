@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex border p-2">
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
    </div>
@endsection
