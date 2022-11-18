@extends('layouts.app')

@section('content')
    <div class="container">
        <form class="p-3 border border-primary rounded" action="/patients/create" method="POST">
            @csrf
            <div class="d-flex justify-content-between">
                <h3><u>Informacion personal</u></h3>
            </div>
            <div class="form-row d-flex justify-content-between mb-3">
                <div class="form-group custom-div">
                    <label for="first_name">Primer Nombre</label>
                    <input type="text" class="form-control" name="first_name" maxlength="20"
                        value="{{ old('first_name') }}">
                    @if ($errors->has('first_name'))
                        <div class="error-message">{{ $errors->first('first_name') }}</div>
                    @endif
                </div>
                <div class="form-group custom-div">
                    <label for="second_name">Segundo Nombre</label>
                    <input type="text" class="form-control" name="second_name" maxlength="20"
                        value="{{ old('second_name') }}">
                    @if ($errors->has('second_name'))
                        <div class="error-message">{{ $errors->first('second_name') }}</div>
                    @endif
                </div>
                <div class="form-group custom-div">
                    <label for="first_surname">Primer Apellido</label>
                    <input type="text" class="form-control" name="first_surname" maxlength="20"
                        value="{{ old('first_surname') }}">
                    @if ($errors->has('first_surname'))
                        <div class="error-message">{{ $errors->first('first_surname') }}</div>
                    @endif
                </div>
                <div class="form-group custom-div">
                    <label for="second_surname">Segundo Apellido</label>
                    <input type="text" class="form-control" name="second_surname" maxlength="20"
                        value="{{ old('second_surname') }}">
                    @if ($errors->has('second_surname'))
                        <div class="error-message">{{ $errors->first('second_surname') }}</div>
                    @endif
                </div>
            </div>
            <div class="form-row d-flex justify-content-between mb-3">
                <div class="form-group custom-div">
                    <label for="identification_number">Cedula de Identidad</label>
                    <input type="text" class="form-control" name="identification_number" maxlength="8"
                        value="{{ old('identification_number') }}">
                    @if ($errors->has('identification_number'))
                        <div class="error-message">{{ $errors->first('identification_number') }}</div>
                    @endif
                </div>
                <div class="form-group custom-div">
                    <label for="birthday_date">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" name="birthday_date" value="{{ old('birthday_date') }}">
                    @if ($errors->has('birthday_date'))
                        <div class="error-message">{{ $errors->first('birthday_date') }}</div>
                    @endif
                </div>
                <div class="form-group mb-3 custom-div">
                    <label for="civil_status">Estado Civil</label>
                    <select name="civil_status" id="civil_status" onchange="load_services(this);">
                        <option selected value="" hidden>Seleccionar</option>
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
                                value="1" {{ old('gender') == '1' ? 'checked' : '' }}>
                            <label class="form-check-label" for="genderF">Femenino</label>
                        </div>
                        <div class="form-check me-5">
                            <input type="radio" class="form-check-input" name="gender" class="custom-control-input"
                                value="2" {{ old('gender') == '2' ? 'checked' : '' }}>
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
                    <input type="text" class="form-control" name="email" maxlength="50" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <div class="error-message">{{ $errors->first('email') }}</div>
                    @endif
                </div>
                <div class="form-group custom-div">
                    <label for="cellphone_number">Numero de celular</label>
                    <input type="text" class="form-control" name="cellphone_number" maxlength="11"
                        value="{{ old('cellphone_number') }}">
                    @if ($errors->has('cellphone_number'))
                        <div class="error-message">{{ $errors->first('cellphone_number') }}</div>
                    @endif
                </div>
                <div class="form-group custom-div">
                    <label for="local_number">Numero local</label>
                    <input type="text" class="form-control" name="local_number" maxlength="11"
                        value="{{ old('local_number') }}">
                    @if ($errors->has('local_number'))
                        <div class="error-message">{{ $errors->first('local_number') }}</div>
                    @endif
                </div>
            </div>
            <div class="form-row d-flex justify-content-between mb-3">
                <div class="col-5 form-group">
                    <label for="address_1">Direccion 1</label>
                    <input type="text" class="form-control" name="address_1" value="{{ old('address_1') }}">
                    @if ($errors->has('address_1'))
                        <div class="error-message">{{ $errors->first('address_1') }}</div>
                    @endif
                </div>
                <div class="col-5 form-group">
                    <label for="address_2">Direccion 2</label>
                    <input type="text" class="form-control" name="address_2" value="{{ old('address_2') }}">
                    @if ($errors->has('address_2'))
                        <div class="error-message">{{ $errors->first('address_2') }}</div>
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
