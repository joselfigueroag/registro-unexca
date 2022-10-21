@extends('layouts.app')

@section('content')
    <div class="container">
        <form class="p-3 border border-primary rounded" action="/departments" method="POST">
            @csrf
            <div class="form-row d-flex">
                <div class="form-group">
                    <label for="name">Departamento</label>
                    <input type="text" class="form-control" name="name" maxlength="30" value="{{ old('name') }}">
                    @if ($errors->has('name'))
                        <div>{{ $errors->first('name') }}</div>
                    @endif
                </div>
                <div class="ms-3 pt-4">
                    <button class="btn btn-primary mr-auto" type="submit">Agregar</button>
                </div>
            </div>
        </form>
        <table class="table table-striped table-bordered mt-3">
            <thead>
                <tr>
                    <th scope="col" class="col-6">Nombre</th>
                </tr>
            </thead>
            @foreach ($departments as $department)
                <tr>
                    <th scope="col">{{ $department->name }}</th>
                    <th scope="col">
                        {{-- <a class="btn btn-primary" type="submit" onclick="deleteConfirm(event)"
                            href="/deparments/{{ $department->id }}/edit">Editar</a> --}}
                        <a class="btn btn-primary" type="submit" onclick="deleteConfirm(event)"
                            href="/departments/{{ $department->id }}/delete">Eliminar</a>
                    </th>
                </tr>
            @endforeach
        </table>
        <div class="d-flex justify-content-center">
            {!! $departments->links() !!}
        </div>
    </div>
@endsection
