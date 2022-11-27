@extends('layouts.app')

@section('content')
    <div class="container">
        <form class="p-3 border border-primary rounded" action="/patients/{{ $patient->id }}/edit" method="POST">
            @csrf
            {{ method_field('PUT') }}
            <div class="d-flex justify-content-between">
                <h3><u>Informacion personal</u></h3>
            </div>
            <div class="form-row d-flex justify-content-between mb-3">
                <div class="form-group custom-div">
                    <label for="first_name">Primer Nombre</label>
                    <input type="text" class="form-control" name="first_name" maxlength="20"
                        value={{ $patient->first_name }}>
                    @if ($errors->has('first_name'))
                        <div class="error-message">{{ $errors->first('first_name') }}</div>
                    @endif
                </div>
                <div class="form-group custom-div">
                    <label for="second_name">Segundo Nombre</label>
                    <input type="text" class="form-control" name="second_name" maxlength="20"
                        value={{ $patient->second_name }}>
                    @if ($errors->has('second_name'))
                        <div class="error-message">{{ $errors->first('second_name') }}</div>
                    @endif
                </div>
                <div class="form-group custom-div">
                    <label for="first_surname">Primer Apellido</label>
                    <input type="text" class="form-control" name="first_surname" maxlength="20"
                        value={{ $patient->first_surname }}>
                    @if ($errors->has('first_surname'))
                        <div class="error-message">{{ $errors->first('first_surname') }}</div>
                    @endif
                </div>
                <div class="form-group custom-div">
                    <label for="second_surname">Segundo Apellido</label>
                    <input type="text" class="form-control" name="second_surname" maxlength="20"
                        value={{ $patient->second_surname }}>
                    @if ($errors->has('second_surname'))
                        <div class="error-message">{{ $errors->first('second_surname') }}</div>
                    @endif
                </div>
            </div>
            <div class="form-row d-flex justify-content-between mb-3">
                <div class="form-group custom-div">
                    <label for="identification_number">Cedula de Identidad</label>
                    <input type="text" class="form-control" name="identification_number" maxlength="8"
                        value={{ $patient->identification_number }}>
                    @if ($errors->has('identification_number'))
                        <div class="error-message">{{ $errors->first('identification_number') }}</div>
                    @endif
                </div>
                <div class="form-group custom-div">
                    <label for="birthday_date">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" name="birthday_date" value={{ $patient->birthday_date }}>
                    @if ($errors->has('birthday_date'))
                        <div class="error-message">{{ $errors->first('birthday_date') }}</div>
                    @endif
                </div>
                <div class="form-group mb-3 custom-div">
                    <label for="civil_status">Estado Civil</label>
                    <select name="civil_status" id="civil_status">
                        <option selected value="{{$patient->civil_status ? $patient->civil_status->id : ''}}" hidden>{{ $patient->civil_status ? $patient->civil_status->type : 'Seleccionar' }}</option>
                        @foreach ($civil_status as $status)
                            <option value="{{ $status->id }}">{{ $status->type }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group custom-div">
                    <label>Genero</label>
                    <div class="d-flex">
                        <div class="form-check me-5">
                            <input type="radio" class="form-check-input" name="gender" class="custom-control-input"
                                value="1" {{ $patient->gender->id == '1' ? 'checked' : '' }}>
                            <label class="form-check-label" for="genderF">Femenino</label>
                        </div>
                        <div class="form-check me-5">
                            <input type="radio" class="form-check-input" name="gender" class="custom-control-input"
                                value="2" {{ $patient->gender->id == '2' ? 'checked' : '' }}>
                            <label class="form-check-label" for="genderM">Masculino</label>
                        </div>
                    </div>

                    @if ($errors->has('gender'))
                        <div class="error-message">{{ $errors->first('gender') }}</div>
                    @endif
                </div>
            </div>
            <hr size="10" class="mt-0">
            <div class="d-flex justify-content-between">
                <h3><u>Informacion de contacto</u></h3>
            </div>
            <div class="form-row d-flex justify-content-between mb-3">
                <div class="form-group custom-div">
                    <label for="email">Correo Electronico</label>
                    <input type="text" class="form-control" name="email" maxlength="50"
                        value={{ $patient->contact_info->email }}>
                    @if ($errors->has('email'))
                        <div class="error-message">{{ $errors->first('email') }}</div>
                    @endif
                </div>
                <div class="form-group custom-div">
                    <label for="cellphone_number">Numero Celular</label>
                    <input type="text" class="form-control" name="cellphone_number" maxlength="11"
                        value={{ $patient->contact_info->cellphone_number }}>
                    @if ($errors->has('cellphone_number'))
                        <div class="error-message">{{ $errors->first('cellphone_number') }}</div>
                    @endif
                </div>
                <div class="form-group custom-div">
                    <label for="local_number">Numero Local</label>
                    <input type="text" class="form-control" name="local_number" maxlength="11"
                        value={{ $patient->contact_info->local_number }}>
                    @if ($errors->has('local_number'))
                        <div class="error-message">{{ $errors->first('local_number') }}</div>
                    @endif
                </div>
            </div>
            <div class="form-row d-flex justify-content-between mb-3">
                <div class="col-4 form-group">
                    <label for="principal_address">Direccion 1</label>
                    <input type="text" class="form-control" name="principal_address"
                        value="{{ $patient->contact_info->principal_address }}">
                    @if ($errors->has('principal_address'))
                        <div class="error-message">{{ $errors->first('principal_address') }}</div>
                    @endif
                </div>
                <div class="col-4 form-group">
                    <label for="secondary_address">Direccion 2</label>
                    <input type="text" class="form-control" name="secondary_address"
                        value="{{ $patient->contact_info->secondary_address }}">
                    @if ($errors->has('secondary_address'))
                        <div class="error-message">{{ $errors->first('secondary_address') }}</div>
                    @endif
                </div>
            </div>
            <hr size="10" class="mt-0">
            <div class="d-flex justify-content-between">
                <h3><u>Datos medicos</u></h3>
            </div>
            <hr size="10" class="mt-0">
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary mr-auto" type="submit">Guardar</button>
            </div>
        </form>
    </div>
@endsection
