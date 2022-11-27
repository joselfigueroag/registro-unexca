@extends('layouts.app')

@section('content')
    <div class="container">
        <form class="p-3 border border-primary rounded" action="/patients/create" method="POST">
            @csrf
            <div class="mb-3">
                <h3><u>Informacion personal</u></h3>
            </div>
            <div class="form-row d-flex mb-3">
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
            <div class="form-row d-flex mb-3">
                <div class="form-group custom-div">
                    <label for="identification_number">Cedula de Identidad</label>
                    <input type="text" class="form-control" name="identification_number" maxlength="15"
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
                <div class="form-group custom-div">
                    <label for="civil_status">Estado Civil</label>
                    <select name="civil_status" id="civil_status">
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
            <div class="form-row d-flex mb-3">
                <div class="form-group custom-div">
                    <label for="blood_type">Grupo Sanguineo</label>
                    <select name="blood_type" id="blood_type">
                        <option selected value="" hidden>Seleccionar</option>
                        @foreach ($blood_types as $blood_type)
                            <option value="{{ $blood_type->id }}">{{ $blood_type->group }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group custom-div">
                    <label>Donador de Organos</label>
                    <div class="d-flex">
                        <div class="form-check me-5">
                            <input type="radio" class="form-check-input" name="organ_donor" class="custom-control-input"
                                value="t" {{ old('organ_donor') == 't' ? 'checked' : '' }}>
                            <label class="form-check-label" for="organ_donorY">Si</label>
                        </div>
                        <div class="form-check me-5">
                            <input type="radio" class="form-check-input" name="organ_donor"
                                class="custom-control-input" value="t" {{ old('organ_donor') == 't' ? 'checked' : '' }}>
                            <label class="form-check-label" for="organ_donorN">No</label>
                        </div>
                    </div>
                    @if ($errors->has('organ_donor'))
                        <div class="error-message">{{ $errors->first('organ_donor') }}</div>
                    @endif
                </div>
            </div>
            <hr size="10" class="mt-0">
            <div class="mb-3">
                <h3><u>Informacion de contacto</u></h3>
            </div>
            <div class="form-row d-flex mb-3">
                <div class="form-group custom-div">
                    <label for="email">Correo Electronico</label>
                    <input type="text" class="form-control" name="email" maxlength="50"
                        value="{{ old('email') }}">
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
            <hr size="10" class="mt-0">
            <div class="mb-3">
                <h3><u>Direccion</u></h3>
            </div>
            <div class="form-row d-flex mb-3">
                <div class="form-group custom-div-dir-structure">
                    <label for="country">Pais</label>
                    <select name="country" id="country">
                        <option selected value="" hidden>Seleccionar</option>
                        @foreach ($countries as $country)
                            <option value="">{{ $country->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('country'))
                        <div class="error-message">{{ $errors->first('country') }}</div>
                    @endif
                </div>
                <div class="form-group custom-div-dir-structure">
                    <label for="state">Estado</label>
                    <select name="state" id="state">
                        <option selected value="" hidden>Seleccionar</option>
                        @foreach ($countries as $country)
                            @foreach ($country->states as $state)
                                <option value="">{{ $state->name }}</option>
                            @endforeach
                        @endforeach
                    </select>
                    @if ($errors->has('state'))
                        <div class="error-message">{{ $errors->first('state') }}</div>
                    @endif
                </div>
                <div class="form-group custom-div-dir-structure">
                    <label for="capital">Capital</label>
                    <select name="capital" id="capital">
                        <option selected value="" hidden>Seleccionar</option>
                        @foreach ($countries as $country)
                            @foreach ($country->states as $state)
                                <option value="">{{ $state->capital->name }}</option>
                            @endforeach
                        @endforeach
                    </select>
                    @if ($errors->has('capital'))
                        <div class="error-message">{{ $errors->first('capital') }}</div>
                    @endif
                </div>
                <div class="form-group custom-div-dir-structure">
                    <label for="municipality">Municipio</label>
                    <select name="municipality" id="municipality">
                        <option selected value="" hidden>Seleccionar</option>
                        @foreach ($countries as $country)
                            @foreach ($country->states as $state)
                                @foreach ($state->capital->municipalities as $municipality)
                                    <option value="">{{ $municipality->name }}</option>
                                @endforeach
                            @endforeach
                        @endforeach
                    </select>
                    @if ($errors->has('municipality'))
                        <div class="error-message">{{ $errors->first('municipality') }}</div>
                    @endif
                </div>
                <div class="form-group custom-div-dir-structure">
                    <label for="parish">Parroquia</label>
                    <select name="parish" id="parish">
                        <option selected value="" hidden>Seleccionar</option>
                        @foreach ($countries as $country)
                            @foreach ($country->states as $state)
                                @foreach ($state->capital->municipalities as $municipality)
                                    @foreach ($municipality->parishes as $parish)
                                        <option value="{{ $parish->id }}">{{ $parish->name }}</option>
                                    @endforeach
                                @endforeach
                            @endforeach
                        @endforeach
                    </select>
                    @if ($errors->has('parish'))
                        <div class="error-message">{{ $errors->first('parish') }}</div>
                    @endif
                </div>
            </div>
            <div class="form-row d-flex mb-3">
                <div class="form-group custom-div-address">
                    <label for="principal_address">Direccion Principal</label>
                    <input type="text" class="form-control" name="principal_address"
                        value="{{ old('principal_address') }}">
                    @if ($errors->has('principal_address'))
                        <div class="error-message">{{ $errors->first('principal_address') }}</div>
                    @endif
                </div>
                <div class="form-group custom-div-address">
                    <label for="secondary_address">Direccion Secundaria</label>
                    <input type="text" class="form-control" name="secondary_address"
                        value="{{ old('secondary_address') }}">
                    @if ($errors->has('secondary_address'))
                        <div class="error-message">{{ $errors->first('secondary_address') }}</div>
                    @endif
                </div>
            </div>
            <hr size="10" class="mt-0">
            <div class="mb-3">
                <h3><u>Informacion Medica</u></h3>
            </div>
            <div>
                <div class="p-3 border rounded">
                    <div>
                        <h6>Habitos<h6>
                    </div>
                    <div class="d-flex flex-wrap">
                        <div class="form-check custom-div">
                            <label class="form-check-label" for="smoker">
                                Fuma
                            </label>
                            <input class="form-check-input" type="checkbox" name="smoker" id="smoker"
                                value="{{ 'checked' ? 't' : 'f' }}">
                        </div>
                        <div class="form-check custom-div">
                            <label class="form-check-label" for="drink_liquor">
                                Consume bebidas alcoholicas
                            </label>
                            <input class="form-check-input" type="checkbox" name="drink_liquor" id="drink_liquor"
                                value="{{ 'checked' ? 't' : 'f' }}">
                        </div>
                        <div class="form-check custom-div">
                            <label class="form-check-label" for="use_drugs">
                                Usa drogas
                            </label>
                            <input class="form-check-input" type="checkbox" name="use_drugs" id="use_drugs"
                                value="{{ 'checked' ? 't' : 'f' }}">
                        </div>
                        <div class="form-check custom-div">
                            <label class="form-check-label" for="drink_coffee">
                                Toma cafe
                            </label>
                            <input class="form-check-input" type="checkbox" name="drink_coffee" id="drink_coffee"
                                value="{{ 'checked' ? 't' : 'f' }}">
                        </div>
                        <div class="form-check custom-div">
                            <label class="form-check-label" for="treatment">
                                Cumple con tratamiento
                            </label>
                            <input class="form-check-input" type="checkbox" name="treatment" id="treatment"
                                value="{{ 'checked' ? 't' : 'f' }}">
                        </div>
                        <div class="form-check custom-div">
                            <label class="form-check-label" for="training">
                                Hace ejercicio
                            </label>
                            <input class="form-check-input" type="checkbox" name="training" id="training"
                                value="{{ 'checked' ? 't' : 'f' }}">
                        </div>
                    </div>
                    <hr size="10" class="mt-0 mb-0">
                    <div>
                        <h6>Antecedentes Familiares<h6>
                    </div>
                    <div class="d-flex flex-wrap">
                        <div class="form-check custom-div">
                            <label class="form-check-label" for="diabetes_f">
                                Diabetes
                            </label>
                            <input class="form-check-input" type="checkbox" name="diabetes_f" id="diabetes_f"
                                value="{{ 'checked' ? 't' : 'f' }}">
                        </div>
                        <div class="form-check custom-div">
                            <label class="form-check-label" for="hypertension_f">
                                Hipertension
                            </label>
                            <input class="form-check-input" type="checkbox" name="hypertension_f" id="hypertension_f"
                                value="{{ 'checked' ? 't' : 'f' }}">
                        </div>
                        <div class="form-check custom-div">
                            <label class="form-check-label" for="allergies_f">
                                Alergias
                            </label>
                            <input class="form-check-input" type="checkbox" name="allergies_f" id="allergies_f"
                                value="{{ 'checked' ? 't' : 'f' }}">
                        </div>
                        <div class="form-check custom-div">
                            <label class="form-check-label" for="asthma_f">
                                Asma
                            </label>
                            <input class="form-check-input" type="checkbox" name="asthma_f" id="asthma_f"
                                value="{{ 'checked' ? 't' : 'f' }}">
                        </div>
                        <div class="form-check custom-div">
                            <label class="form-check-label" for="epilepsy_f">
                                Epilepsia
                            </label>
                            <input class="form-check-input" type="checkbox" name="epilepsy_f" id="epilepsy_f"
                                value="{{ 'checked' ? 't' : 'f' }}">
                        </div>
                        <div class="form-check custom-div">
                            <label class="form-check-label" for="obesity_f">
                                Obesidad
                            </label>
                            <input class="form-check-input" type="checkbox" name="obesity_f" id="obesity_f"
                                value="{{ 'checked' ? 't' : 'f' }}">
                        </div>
                        <div class="form-check custom-div">
                            <label class="form-check-label" for="alcoholism_f">
                                Alcoholismo
                            </label>
                            <input class="form-check-input" type="checkbox" name="alcoholism_f" id="alcoholism_f"
                                value="{{ 'checked' ? 't' : 'f' }}">
                        </div>
                        <div class="form-check custom-div">
                            <label class="form-check-label" for="carcinomas_f">
                                Carcinomas
                            </label>
                            <input class="form-check-input" type="checkbox" name="carcinomas_f" id="carcinomas_f"
                                value="{{ 'checked' ? 't' : 'f' }}">
                        </div>
                        <div class="form-check custom-div">
                            <label class="form-check-label" for="heart_disease_f">
                                Cardiopatias
                            </label>
                            <input class="form-check-input" type="checkbox" name="heart_disease_f" id="heart_disease_f"
                                value="{{ 'checked' ? 't' : 'f' }}">
                        </div>
                        <div class="form-check custom-div">
                            <label class="form-check-label" for="liver_disease_f">
                                Hepatopatias
                            </label>
                            <input class="form-check-input" type="checkbox" name="liver_disease_f" id="liver_disease_f"
                                value="{{ 'checked' ? 't' : 'f' }}">
                        </div>
                        <div class="form-check custom-div">
                            <label class="form-check-label" for="nephropathy_f">
                                Nefropatias
                            </label>
                            <input class="form-check-input" type="checkbox" name="nephropathy_f" id="nephropathy_f"
                                value="{{ 'checked' ? 't' : 'f' }}">
                        </div>
                        <div class="form-check custom-div">
                            <label class="form-check-label" for="psychological_f">
                                Enf. Psicologicas
                            </label>
                            <input class="form-check-input" type="checkbox" name="psychological_f" id="psychological_f"
                                value="{{ 'checked' ? 't' : 'f' }}">
                        </div>
                        <div class="form-check custom-div">
                            <label class="form-check-label" for="neurological_f">
                                Enf. Neurologicas
                            </label>
                            <input class="form-check-input" type="checkbox" name="neurological_f" id="neurological_f"
                                value="{{ 'checked' ? 't' : 'f' }}">
                        </div>
                        <div class="form-check custom-div">
                            <label class="form-check-label" for="endocrine_f">
                                Enf. Endocrinas
                            </label>
                            <input class="form-check-input" type="checkbox" name="endocrine_f" id="endocrine_f"
                                value="{{ 'checked' ? 't' : 'f' }}">
                        </div>
                        <div class="form-check custom-div">
                            <label class="form-check-label" for="hematological_f">
                                Enf. Hematologicas
                            </label>
                            <input class="form-check-input" type="checkbox" name="hematological_f" id="hematological_f"
                                value="{{ 'checked' ? 't' : 'f' }}">
                        </div>
                        <div class="form-check custom-div">
                            <label class="form-check-label" for="autoimmune_f">
                                Enf. Autoinmunes
                            </label>
                            <input class="form-check-input" type="checkbox" name="autoimmune_f" id="autoimmune_f"
                                value="{{ 'checked' ? 't' : 'f' }}">
                        </div>
                    </div>
                    <hr size="10" class="mt-0 mb-0">
                    <div>
                        <h6>Antecedentes Personales<h6>
                    </div>
                    <div class="d-flex flex-wrap">
                        <div class="form-check custom-div">
                            <label class="form-check-label" for="diabetes_p">
                                Diabetes
                            </label>
                            <input class="form-check-input" type="checkbox" name="diabetes_p" id="diabetes_p"
                                value="{{ 'checked' ? 't' : 'f' }}">
                        </div>
                        <div class="form-check custom-div">
                            <label class="form-check-label" for="hypertension_p">
                                Hipertension
                            </label>
                            <input class="form-check-input" type="checkbox" name="hypertension_p" id="hypertension_p"
                                value="{{ 'checked' ? 't' : 'f' }}">
                        </div>
                        <div class="form-check custom-div">
                            <label class="form-check-label" for="hiv_p">
                                VIH/Sida
                            </label>
                            <input class="form-check-input" type="checkbox" name="hiv_p" id="hiv_p"
                                value="{{ 'checked' ? 't' : 'f' }}">
                        </div>
                        <div class="form-check custom-div">
                            <label class="form-check-label" for="allergies_p">
                                Alergias
                            </label>
                            <input class="form-check-input" type="checkbox" name="allergies_p" id="allergies_p"
                                value="{{ 'checked' ? 't' : 'f' }}">
                        </div>
                        <div class="form-check custom-div">
                            <label class="form-check-label" for="carcinomas_p">
                                Carcinomas
                            </label>
                            <input class="form-check-input" type="checkbox" name="carcinomas_p" id="carcinomas_p"
                                value="{{ 'checked' ? 't' : 'f' }}">
                        </div>
                        <div class="form-check custom-div">
                            <label class="form-check-label" for="surgeries_p">
                                Cirugias previas
                            </label>
                            <input class="form-check-input" type="checkbox" name="surgeries_p" id="surgeries_p"
                                value="{{ 'checked' ? 't' : 'f' }}">
                        </div>
                        <div class="form-check custom-div">
                            <label class="form-check-label" for="heart_disease_p">
                                Cardiopatias
                            </label>
                            <input class="form-check-input" type="checkbox" name="heart_disease_p" id="heart_disease_p"
                                value="{{ 'checked' ? 't' : 'f' }}">
                        </div>
                        <div class="form-check custom-div">
                            <label class="form-check-label" for="liver_disease_p">
                                Hepatopatias
                            </label>
                            <input class="form-check-input" type="checkbox" name="liver_disease_p" id="liver_disease_p"
                                value="{{ 'checked' ? 't' : 'f' }}">
                        </div>
                        <div class="form-check custom-div">
                            <label class="form-check-label" for="nephropathy_p">
                                Nefropatias
                            </label>
                            <input class="form-check-input" type="checkbox" name="nephropathy_p" id="nephropathy_p"
                                value="{{ 'checked' ? 't' : 'f' }}">
                        </div>
                        <div class="form-check custom-div">
                            <label class="form-check-label" for="psychological_p">
                                Enf. Psicologicas
                            </label>
                            <input class="form-check-input" type="checkbox" name="psychological_p" id="psychological_p"
                                value="{{ 'checked' ? 't' : 'f' }}">
                        </div>
                        <div class="form-check custom-div">
                            <label class="form-check-label" for="neurological_p">
                                Enf. Neurologicas
                            </label>
                            <input class="form-check-input" type="checkbox" name="neurological_p" id="neurological_p"
                                value="{{ 'checked' ? 't' : 'f' }}">
                        </div>
                        <div class="form-check custom-div">
                            <label class="form-check-label" for="endocrine_p">
                                Enf. Endocrinas
                            </label>
                            <input class="form-check-input" type="checkbox" name="endocrine_p" id="endocrine_p"
                                value="{{ 'checked' ? 't' : 'f' }}">
                        </div>
                        <div class="form-check custom-div">
                            <label class="form-check-label" for="hematological_p">
                                Enf. Hematologicas
                            </label>
                            <input class="form-check-input" type="checkbox" name="hematological_p" id="hematological_p"
                                value="{{ 'checked' ? 't' : 'f' }}">
                        </div>
                        <div class="form-check custom-div">
                            <label class="form-check-label" for="autoimmune_p">
                                Enf. Autoinmunes
                            </label>
                            <input class="form-check-input" type="checkbox" name="autoimmune_p" id="autoimmune_p"
                                value="{{ 'checked' ? 't' : 'f' }}">
                        </div>
                        <div class="form-check custom-div">
                            <label class="form-check-label" for="respiratory_p">
                                Enf. Respiratorias
                            </label>
                            <input class="form-check-input" type="checkbox" name="respiratory_p" id="respiratory_p"
                                value="{{ 'checked' ? 't' : 'f' }}">
                        </div>
                    </div>
                </div>
            </div>
            <hr size="10">
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary mr-auto" type="submit">Guardar</button>
            </div>
        </form>
    </div>
@endsection
