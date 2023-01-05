@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-3 justify-content-between">
            <div class="d-flex col-sm-3 mt-2">
                <form action="/users" method="POST" class="d-flex">
                    @csrf
                    <input type="text" class="form-control" name="search" placeholder="Buscar usuario o email"
                        value="{{ $search }}">
                    <div class="ms-2">
                        <button class="btn btn-primary mr-auto" type="submit">Buscar</button>
                    </div>
                </form>
            </div>
            <div class="d-flex col-sm-2 mt-2 ">
                <a class="btn btn-primary" name="add" type="button" href="{{ route('register_user') }}"
                    style="margin-left: auto;">Nuevo
                    Usuario</a>
            </div>
        </div>
        <div class="table-responsive">
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
        </div>
        <div class="d-flex justify-content-center">
            {!! $users->links() !!}
        </div>
    </div>
@endsection
