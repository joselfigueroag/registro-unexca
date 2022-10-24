@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex border p-2 mb-3">
            <div class="col-4">
                <p><span class="fw-bold">Email:</span> {{ $user->email }}</p>
                <p><span class="fw-bold">Rol:</span> {{ $user->role() }}</p>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <a class="btn btn-primary mr-auto me-3" type="submit" onclick="deleteConfirm(event)"
                href="/users/{{ $user->id }}/delete">Eliminar</a>
            <a class="btn btn-primary mr-auto" href="/users/{{ $user->id }}/edit">Editar</a>
        </div>
    </div>
@endsection