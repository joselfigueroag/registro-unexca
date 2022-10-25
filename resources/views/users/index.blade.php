@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex mb-3 justify-content-between">
            <div class="d-flex col-3">
                <input type="text" class="form-control" name="user" id="user" value="{{ old('user') }}"
                    placeholder="Usuario">
                <div class="ms-2">
                    <button class="btn btn-primary mr-auto" name="search" type="button">Buscar</button>
                </div>
            </div>
            <div>
                <a class="btn btn-primary mr-auto" name="add" type="button" href="{{ route('register') }}">Nuevo
                    Registro</a>
            </div>
        </div>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col" class="col-4">Usuario</th>
                    <th scope="col" class="col-4">Email</th>
                    <th scope="col" class="col-3">Rol</th>
                    <th scope="col" class="col-1"></th>
                </tr>
            </thead>
            
            @foreach ($users as $user)
                <tr>
                    <th scope="col">{{ $user->user }}</th>
                    <th scope="col">{{ $user->email }}</th>
                    <th scope="col">{{ $user->role() }}</th>
                    <th scope="col">
                        <a class="btn btn-primary" type="submit" onclick="deleteConfirm(event)"
                        href="/users/{{ $user->id }}/delete">Eliminar</a>
                    </th>
                </tr>
            @endforeach
        </table>
        <div class="d-flex justify-content-center">
            {!! $users->links() !!}
        </div>
    </div>
@endsection
