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
                <a class="btn btn-primary mr-auto" name="add" type="button" href="{{ route('register_specialists') }}" style="margin-left: auto;" >Nuevo Registro</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Departamento</th>
                        <th scope="col">Especialidad</th>
                        <th scope="col">1° Nombre</th>
                        <th scope="col">1° Apellido</th>
                        <th scope="col">Cedula de Identidad</th>
                        <th scope="col">Correo Electronico</th>
                        <th scope="col">Ver / Editar</th>
                    </tr>
                </thead>
                @foreach ($specialists as $specialist)
                    <tr>
                        <th scope="col">{{$specialist->department}}</th>
                        <th scope="col">{{$specialist->clinical_service}}</th>
                        <th scope="col">{{$specialist->first_name}}</th>
                        <th scope="col">{{$specialist->first_surname}}</th>
                        <th scope="col">{{$specialist->identification_number}}</th>
                        <th scope="col">{{$specialist->email}}</th>
                        <th scope="col">Ver / Editar</th>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{$specialists->links()}}
        </div>
    </div>
@endsection
