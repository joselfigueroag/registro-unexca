@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex border p-2 mb-3">
            <div class="col-4">
                <p><span class="fw-bold">Primer Nombre:</span> {{ $specialist->first_name }}</p>
                <p><span class="fw-bold">Segundo Nombre:</span> {{ $specialist->second_name }}</p>
                <p><span class="fw-bold">Primer Apellido:</span> {{ $specialist->first_surname }}</p>
                <p><span class="fw-bold">Segundo Apellido:</span> {{ $specialist->second_surname }}</p>

            </div>
            <div class="col-4">
                <p><span class="fw-bold">Cedula de Identidad:</span> {{ $specialist->identification_number }}</p>
                <p><span class="fw-bold">Fecha de Nacimiento:</span> {{ $specialist->birthday_date }}</p>
                <p><span class="fw-bold">Genero:</span> {{ $specialist->gender }}</p>
                <p><span class="fw-bold">Correo:</span> {{ $specialist->email }}</p>
            </div>
            <div class="col-4">
                <p><span class="fw-bold">Direccion:</span> {{$specialist->address}}</p>
                <p><span class="fw-bold">Departamento:</span> {{$specialist->clinical_service->department->name}}</p>
                <p><span class="fw-bold">Especialidad</span> {{$specialist->clinical_service->name}}</p>
                
            </div>
        </div>
        <div class="d-flex justify-content-end">
            @hasrole('admin')
                <a class="btn btn-danger mr-auto me-3" type="submit" onclick="deleteConfirm(event)"
                    href="/specialists/{{ $specialist->id }}/delete">Eliminar</a>
            @endhasrole
            <a class="btn btn-primary mr-auto" href="/specialists/{{ $specialist->id }}/edit">Editar</a>
        </div>
        <hr size="10" class="mt-3">

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#appointmentFromspecialistModal">
            Nueva cita
        </button>

      
    
    </div>
@endsection