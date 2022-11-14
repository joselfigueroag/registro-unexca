@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex row mb-3 justify-content-between">
            <div class="d-flex col-sm-3 mt-2">
                <form action="/patients" method="POST" class="d-flex">
                    @csrf
                    <input type="text" class="form-control" name="search" placeholder="Buscar historia o cedula">
                    <div class="ms-2">
                        <button class="btn btn-primary mr-auto" type="submit">Buscar</button>
                    </div>
                </form>
            </div>
            <div class="d-flex col-sm-2 mt-2">
                <a class="btn btn-primary mr-auto" name="add" type="button" href="{{ route('register_patient') }}"
                    style="margin-left: auto;">Nuevo Registro</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Historia Clinica</th>
                        <th scope="col">Primer Nombre</th>
                        <th scope="col">Primer Apellido</th>
                        <th scope="col">Cedula de Identidad</th>
                    </tr>
                </thead>
                @foreach ($patients as $patient)
                    <tr>
                        <th scope="col">
                            <a href="/patients/{{ $patient->id }}/show">
                                {{ $patient->clinic_history }}
                            </a>
                        </th>
                        <th scope="col">{{ $patient->first_name }}</th>
                        <th scope="col">{{ $patient->first_surname }}</th>
                        <th scope="col">{{ $patient->identification_number }}</th>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {!! $patients->links() !!}
        </div>
    </div>
@endsection
