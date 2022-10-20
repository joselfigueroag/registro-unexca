@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card">
                    <div class="card-header bg-primary">{{ __('Tablero') }}</div>
                    <div class="card-body d-flex justify-content-between">
                        <div class="col-5">
                            @hasrole('admin')
                                <div class="dropdown mb-3">
                                    <a class="col-12 btn btn-primary" href="{{ route('list_users') }}">
                                        Empleados
                                    </a>
                                </div>
                                <div class="dropdown mb-3">
                                    <a class="col-12 btn btn-primary" type="button" href="#">
                                        Departamentos
                                    </a>
                                </div>
                            @endhasrole
                            <div class="dropdown mb-3">
                                <button class="col-12 btn btn-primary dropdown-toggle" type="button" id="dropdownUser"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Usuario
                                </button>
                                <div class="dropdown-menu p-0 col-12" aria-labelledby="dropdownUser">
                                    <a href="{{ route('register_patient') }}"
                                        class="btn btn-primary btn-lg col-12 rounded-0" role="button"
                                        aria-pressed="true">Registrar usuario</a>
                                    <hr class="dropdown-divider m-0 p-0 col-12">
                                    <a href="{{ route('list_patients') }}" class="btn btn-primary btn-lg col-12 rounded-0"
                                        role="button" aria-pressed="true">Listar usuarios</a>
                                    {{-- <hr class="dropdown-divider m-0 p-0 col-12">
                                    <a href="#" class="btn btn-primary btn-lg col-12 rounded-0" role="button"
                                        aria-pressed="true">Editar usuario</a>
                                    <hr class="dropdown-divider m-0 p-0 col-12">
                                    <a href="#" class="btn btn-primary btn-lg col-12 rounded-0" role="button"
                                        aria-pressed="true">Eliminar usuario</a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-6 text-center">
                            <div>
                                <img src="/images/logo_etalrs.jpg" alt="logo_etalrs">
                            </div>
                            <div>
                                <h4>Escuela Tecnica Asistencial Luis Rodriguez Sanchez</h4>
                                <h5>Laboratio Clinico</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
