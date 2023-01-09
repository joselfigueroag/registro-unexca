@extends('layouts.app')

@section('content')
<div class="container">
    <form class="p-3 border border-primary rounded" action="/clinical_services" method="POST">
        @csrf
        <div class="form-row d-flex">
            <div class="form-group me-3">
                <label for="name">Servicio Clinico</label>
                <input type="text" class="form-control" name="name" maxlength="30" value="{{ old('name') }}" required>
                @if ($errors->has('name'))
                    <div class="error-message">{{ $errors->first('name') }}</div>
                @endif
            </div>
            <div class="form-group me-3">
                <label for="department_id">Departamento</label>
                <select required name="department_id" id="department_id" >
                    <option selected disabled value="" hidden>Seleccionar</option>
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-1 pt-4">
                <button class="btn btn-primary mr-auto" type="submit">Agregar</button>
            </div>
        </div>
    </form>
    <table class="table table-striped table-bordered mt-3">
        <thead>
            <tr>
                <th scope="col" class="col-4">Servicio</th>
                <th scope="col" class="col-4">Departamento</th>
                <th scope="col" class="col-4">Acciones</th>
            </tr>
        </thead>
        @foreach ($clinical_services as $clinical_service)
        <tr>
            <th scope="col">{{ $clinical_service->name }}</th>
            <th scope="col">{{ $clinical_service->department->name }}</th>
            <th scope="col">
                <a class="btn btn-primary" type="button" data-bs-toggle="modal"
                    data-bs-target="#editFromClinicalServiceModal" id="{{ $clinical_service->id }}"
                    name="{{ $clinical_service->name }}" accesskey="{{ $clinical_service->department->id }}" onclick="load_data(this)">Editar</a>
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

<!-- Modal -->
<div class="modal fade" id="editFromClinicalServiceModal" tabindex="-1"
    aria-labelledby="editFromClinicalServiceModalLabel" aria-hidden="true" data-bs-backdrop="static"
    data-bs-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editFromClinicalServiceModalLabel">Editar servicio clinico</h5>
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
                    <div class="form-group">
                        <label for="department_edited">Departamento</label>
                        <select name="department_edited" id="department_edited">
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('department_edited'))
                            <div>{{ $errors->first('department_edited') }}</div>
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
@endsection

<script>
    function load_data(obj) {
        var select_edit = document.getElementById('department_edited');
        for (let element of select_edit.options){ 
            if (obj.accessKey == element.value){
                select_edit.options.selectedIndex = element.index
            }
        }

        var input_edit = document.getElementById('input_edit');
        input_edit.value = obj.name
        
        var form_edit = document.getElementById('form_edit')
        form_edit.action = `clinical_services/${obj.id}/edit`

        
        // var form_add = document.getElementById('form_add')
        // form_add.action = ''

        // var button_add = document.getElementById('button_add')
        // button_add.disabled = true
        // button_add.type = ''
        
        // var input_add = document.getElementById('input_add')
        // input_add.disabled = true

    }
</script>