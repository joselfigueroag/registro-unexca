@extends('layouts.app')

@section('content')
    <div class="container">
        <form class="p-3 border border-primary rounded" action="/clinical_services" method="POST">
            @csrf
            <div class="form-row d-flex">
                <div class="form-group">
                    <label for="name">Servicio Clinico</label>
                    <input type="text" class="form-control" name="name" maxlength="30" value="{{ old('name') }}">
                    @if ($errors->has('name'))
                        <div>{{ $errors->first('name') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="department">Departamento</label>
                    <select name="department" id="department">
                        <option value="seleccionar">Seleccionar</option>
                        @foreach ($departments as $department)
                            <option selected="selected" value="{{ $department->name }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="ms-3 pt-4">
                    <button class="btn btn-primary mr-auto" type="submit">Agregar</button>
                </div>
            </div>
        </form>
        <table class="table table-striped table-bordered mt-3">
            <thead>
                <tr>
                    <th scope="col" class="col-6">Servicio</th>
                    <th scope="col" class="col-6">Departamento</th>
                </tr>
            </thead>
            @foreach ($clinical_services as $clinical_service)
                <tr>
                    <th scope="col">{{ $clinical_service->name }}</th>
                    <th scope="col">{{ $clinical_service->department->name }}</th>
                    <th scope="col">
                        {{-- <a class="btn btn-primary" type="submit" onclick="deleteConfirm(event)"
                            href="/deparments/{{ $service->id }}/edit">Editar</a> --}}
                        <a class="btn btn-primary" type="submit" onclick="deleteConfirm(event)"
                            href="/clinical_services/{{ $clinical_service->id }}/delete">Eliminar</a>
                    </th>
                </tr>
            @endforeach
        </table>
        <div class="d-flex justify-content-center">
            {!! $clinical_services->links() !!}
        </div>
    </div>
@endsection
