@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- <div class="d-flex border p-2 mb-3">
            <form action="/appointments" method="POST" class="d-flex">
                @csrf
                <input type="date" class="form-control me-2" name="date" value="{{ $date }}">
                <div class="vr"></div>
                <select name="clinical_service" id="clinical_service" class="ms-2 me-2">
                    @foreach ($clinical_services as $clinical_service)
                        <option value="{{ $clinical_service->id }}">{{ $clinical_service->name }}</option>
                    @endforeach
                    <option selected value="" hidden>Seleccionar</option>
                </select>
                <div class="vr"></div>
                <div class="ms-2">
                    <button class="btn btn-primary mr-auto" type="submit">Buscar</button>
                </div>
            </form>
        </div> --}}
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Historia Clinica</th>
                        <th scope="col">Primer Nombre</th>
                        <th scope="col">Primer Apellido</th>
                        <th scope="col">Cedula de Identidad</th>
                        <th scope="col">Acciones</th>
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
                        <th class="col-3">
                            <a class="btn btn-primary mr-auto me-3" type="submit"
                                href="/deleted_records/{{ $patient->id }}/restore">Restaurar</a>
                            <a class="btn btn-primary mr-auto me-3" type="submit"
                                href="/deleted_records/{{ $patient->id }}/force_delete">Borrado definitivo</a>
                        </th>
                    </tr>
                @endforeach
            </table>
        </div>
        {{-- <div class="d-flex justify-content-center">
            {!! $patients->links() !!}
        </div> --}}
    </div>
@endsection
