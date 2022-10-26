@extends('layouts.app')

@section('content')
    <div class="container">
        <form class="p-3 border border-primary rounded" action="/patients/{{ $patient->id }}/edit" method="POST">
            @csrf
            {{ method_field('PUT') }}
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
                    <label for="email">Correo Electronico</label>
                    <input type="text" class="form-control" name="email" maxlength="20" value={{ $patient->email }}>
                    @if ($errors->has('email'))
                        <div class="error-message">{{ $errors->first('email') }}</div>
                    @endif
                </div>
                <div class="form-group custom-div">
                    <label for="birthday_date">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" name="birthday_date" value={{ $patient->birthday_date }}>
                    @if ($errors->has('birthday_date'))
                        <div class="error-message">{{ $errors->first('birthday_date') }}</div>
                    @endif
                </div>
                <div class="form-group custom-div">
                    <label>Genero</label>
                    <div class="d-flex">
                        <div class="form-check me-5">
                            <input type="radio" class="form-check-input" name="gender" class="custom-control-input"
                                value="M" {{ $patient->gender == 'M' ? 'checked' : '' }}>
                            <label class="form-check-label" for="genderM">M</label>
                        </div>
                        <div class="form-check me-5">
                            <input type="radio" class="form-check-input" name="gender" class="custom-control-input"
                                value="F" {{ $patient->gender == 'F' ? 'checked' : '' }}>
                            <label class="form-check-label" for="genderF">F</label>
                        </div>
                    </div>

                    @if ($errors->has('gender'))
                        <div class="error-message">{{ $errors->first('gender') }}</div>
                    @endif
                </div>
            </div>
            <hr size="10" class="mt-0">
            <div class="form-row d-flex justify-content-between mb-3">
                <div class="col-4 form-group">
                    <label for="address_1">Direccion 1</label>
                    <input type="text" class="form-control" name="address_1"
                        value="{{ $patient->additional_info->address_1 }}">
                    @if ($errors->has('address_1'))
                        <div class="error-message">{{ $errors->first('address_1') }}</div>
                    @endif
                </div>
                <div class="col-4 form-group">
                    <label for="address_2">Direccion 2</label>
                    <input type="text" class="form-control" name="address_2"
                        value="{{ $patient->additional_info->address_2 }}">
                    @if ($errors->has('address_2'))
                        <div class="error-message">{{ $errors->first('address_2') }}</div>
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
