@extends('layouts.app')

@section('content')
    <div class="container">
        <form class="p-3 border border-primary rounded" action="/departments" method="POST" id="form_add">
            @csrf
            <div class="form-row d-flex">
                <div class="form-group">
                    <label for="name">Departamento</label>
                    <input type="text" class="form-control" name="name" maxlength="30" id="input_add" value="{{ old('name') }}" >
                    @if ($errors->has('name'))
                        <div class="error-message">{{ $errors->first('name') }}</div>
                    @endif
                </div>
                <div class="ms-3 pt-4">
                    <button class="btn btn-primary mr-auto" type="submit" id="button_add">Agregar</button>
                </div>
            </div>
        </form>
        <table class="table table-striped table-bordered mt-3">
            <thead>
                <tr>
                    <th scope="col" class="col-6">Nombre</th>
                    <th scope="col" class="col-6">Acciones</th>
                </tr>
            </thead>
            @foreach ($departments as $department)
                <tr>
                    <th scope="col">{{ $department->name }}</th>
                    <th scope="col">
                        <a class="btn btn-primary" type="button" data-bs-toggle="modal"
                            data-bs-target="#editFromDepartmentModal" id="{{ $department->id }}"
                            name="{{ $department->name }}" onclick="load_data(this)">Editar</a>
                        <a class="btn btn-primary" type="submit" onclick="deleteConfirm(event)"
                            href="/departments/{{ $department->id }}/delete">Eliminar</a>
                    </th>
                </tr>
            @endforeach
        </table>
        <div class="d-flex justify-content-center">
            {!! $departments->links() !!}
        </div>

        <!-- Modal -->
        <div class="modal fade" id="editFromDepartmentModal" tabindex="-1" aria-labelledby="editFromDepartmentModalLabel"
            aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editFromDepartmentModalLabel">Editar departamento</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="p-3 border border-primary rounded" action="" method="POST" id="form_edit">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="modal-body">
                            {{-- <input type="hidden" name="id_department" id="id_department" value=""> --}}
                            <div class="form-group">
                                <label for="name_edited">Nombre</label>
                                <input type="text" class="form-control" name="name_edited" id="input_edit"
                                    value="{{ old('name_edited') }}">
                                @if ($errors->has('name_edited'))
                                    <div>{{ $errors->first('name_edited') }}</div>
                                @endif
                            </div>
                        </div>
                        <hr size="10" class="mt-0">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary mr-auto" type="submit" id="button_edit">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    function load_data(obj) {
        // var id_department = document.getElementById('id_department');
        var form_add = document.getElementById('form_add')
        form_add.action = ''

        var form_edit = document.getElementById('form_edit')
        form_edit.action = `departments/${obj.id}/edit`

        var button_add = document.getElementById('button_add')
        button_add.disabled = true
        button_add.type = ''

        var input_add = document.getElementById('input_add')
        var input_edit = document.getElementById('input_edit');

        // id_department.value = obj.id


        input_edit.value = obj.name
        input_add.disabled = true
    }
</script>
