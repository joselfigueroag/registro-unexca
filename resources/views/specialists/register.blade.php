@extends('layouts.app')

@section('content')
    <div class="container">
        <form class="p-3 border border-primary rounded" action="#" method="POST">
            @csrf
            <div class="form-row  row d-flex justify-content-between mb-3">
                <div class="col-sm-3 form-group">
                    <label for="first_name">Primer Nombre</label>
                    <input type="text" class="form-control" name="first_name" maxlength="20"
                        value="{{ old('first_name') }}">
                    @if ($errors->has('first_name'))
                        <div class="error-message">{{ $errors->first('first_name') }}</div>
                    @endif
                </div>
                <div class="col-sm-3 form-group">
                    <label for="second_name">Segundo Nombre</label>
                    <input type="text" class="form-control" name="second_name" maxlength="20"
                        value="{{ old('second_name') }}">
                    @if ($errors->has('second_name'))
                        <div class="error-message">{{ $errors->first('second_name') }}</div>
                    @endif
                </div>
                <div class="col-sm-3 form-group">
                    <label for="first_surname">Primer Apellido</label>
                    <input type="text" class="form-control" name="first_surname" maxlength="20"
                        value="{{ old('first_surname') }}">
                    @if ($errors->has('first_surname'))
                        <div class="error-message">{{ $errors->first('first_surname') }}</div>
                    @endif
                </div>
                <div class="col-sm-3 form-group">
                    <label for="second_surname">Segundo Apellido</label>
                    <input type="text" class="form-control" name="second_surname" maxlength="20"
                        value="{{ old('second_surname') }}">
                    @if ($errors->has('second_surname'))
                        <div class="error-message">{{ $errors->first('second_surname') }}</div>
                    @endif
                </div>
            </div>
            <div class="row d-flex justify-content-between mb-3">
                <div class="col-sm-3 form-group">
                    <label for="identification_number">Cedula de Identidad</label>
                    <input type="text" class="form-control" name="identification_number" maxlength="8"
                        value="{{ old('identification_number') }}">
                    @if ($errors->has('identification_number'))
                        <div class="error-message">{{ $errors->first('identification_number') }}</div>
                    @endif
                </div>
                <div class="col-sm-3 form-group">
                    <label for="email">Correo Electronico</label>
                    <input type="text" class="form-control" name="email" maxlength="20" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <div class="error-message">{{ $errors->first('email') }}</div>
                    @endif
                </div>
                <div class="col-sm-3 form-group">
                    <label for="birthday_date">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" name="birthday_date" value="{{ old('birthday_date') }}">
                    @if ($errors->has('birthday_date'))
                        <div class="error-message">{{ $errors->first('birthday_date') }}</div>
                    @endif
                </div>
                <div class="col-sm-3 form-group">
                    <label>Genero</label>
                    <div class="d-flex">
                        <div class="form-check me-5">
                            <input type="radio" class="form-check-input" name="gender" class="custom-control-input"
                                value="M" {{ old('gender') == 'M' ? 'checked' : '' }}>
                            <label class="form-check-label" for="genderM">M</label>
                        </div>
                        <div class="form-check me-5">
                            <input type="radio" class="form-check-input" name="gender" class="custom-control-input"
                                value="F" {{ old('gender') == 'F' ? 'checked' : '' }}>
                            <label class="form-check-label" for="genderF">F</label>
                        </div>
                    </div>
                    @if ($errors->has('gender'))
                        <div class="error-message">{{ $errors->first('gender') }}</div>
                    @endif
                    
                </div>
                <div class="col-sm-6 form-group">
                    <label for="address">Direccion</label>
                    <input type="text" class="form-control" name="address" value="{{ old('address') }}">
                    @if ($errors->has('address'))
                        <div class="error-message">{{ $errors->first('address') }}</div>
                    @endif
                </div>
                <div class="col-sm-3 form-group">
                    <label for="department">Departamento</label>
                    <select name="department" id="department" onchange="load_services(this);">
                        <option selected="selected" value="" hidden>Seleccionar</option>
                        @foreach ($departments as $department)
                            <option value="{{$department->id}}">{{$department->name}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('department'))
                        <div class="error-message">{{ $errors->first('department') }}</div>
                    @endif
                </div>
                <div class="col-sm-3 form-group">
                    <label for="clinical_service">Especialista en:</label>
                    <select name="clinical_service" id="clinical_service" disabled>
                        <option selected="selected" value="" hidden>Seleccionar</option>
                    </select>
                    @if ($errors->has('clinical_service'))
                        <div class="error-message">{{ $errors->first('clinical_service') }}</div>
                    @endif
                </div>
                
            </div>
            <hr size="10" class="mt-0">
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary mr-auto" type="submit">Guardar</button>
            </div>
        </form>
    </div>
@endsection

<script>
    var servicios = new Array();
    servicios = @json($services);
    console.log(servicios);

    function load_services(obj){
        //document.getElementById('clinical_service').options.length=0;
        document.getElementById('clinical_service').disabled = false;
        var x=1;
        for (var i=0; i < servicios.length;i++){
            if (servicios[i].department_id == obj.value){
            document.getElementById('clinical_service').options[x]=new Option(servicios[i].name, servicios[i].id);
            x++;
            }
        }
        console.log(obj.value);
        //document.getElementById('clinical_service').options[]=new Option("Seleccionar", " ");
    }
</script>