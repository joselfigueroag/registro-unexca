@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex row mb-3 justify-content-between">
            <div class="d-flex col-sm-3 mt-2">
                <input type="text" class="form-control" name="identification_number" id="identification_number" maxlength="8"
                    value="{{ old('identification_number') }}" placeholder="Cedula de Identidad">
                <div class="ms-2">
                    <button class="btn btn-primary mr-auto" name="search" type="button">Buscar</button>
                </div>
            </div>
            <div class="d-flex col-sm-2 mt-2">
                <a class="btn btn-primary mr-auto" name="add" type="button" href="{{ route('register_patient') }}" style="margin-left: auto;" >Nuevo Registro</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Historia Clinica</th>
                        <th scope="col">Primer Nombre</th>
                        <th scope="col">Segundo Nombre</th>
                        <th scope="col">Primer Apellido</th>
                        <th scope="col">Segundo Apellido</th>
                        <th scope="col">Cedula de Identidad</th>
                        <th scope="col">Correo Electronico</th>
                        <th scope="col">Genero</th>
                        <th scope="col">Fecha de Nacimiento</th>
                    </tr>
                </thead>
                @foreach ($patients as $patient)
                    <tr>
                        <th scope="col">
                            <a href="/patients/{{ $patient->id }}">
                                {{ $patient->clinic_history }}
                            </a>
                        </th>
                        <th scope="col">{{ $patient->first_name }}</th>
                        <th scope="col">{{ $patient->second_name }}</th>
                        <th scope="col">{{ $patient->first_surname }}</th>
                        <th scope="col">{{ $patient->second_surname }}</th>
                        <th scope="col">{{ $patient->identification_number }}</th>
                        <th scope="col">{{ $patient->email }}</th>
                        <th scope="col">{{ $patient->gender }}</th>
                        <th scope="col">{{ $patient->birthday_date }}</th>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{-- {{ debbg::$patients }} --}}
            {!! $patients->links() !!}
        </div>
    </div>
@endsection
