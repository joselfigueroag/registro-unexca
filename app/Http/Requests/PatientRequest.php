<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {   
        return [
            'first_name' => 'required|alpha|max:20',
            'second_name' => 'alpha|max:20|nullable',
            'first_surname' => 'required|alpha|max:20',
            'second_surname' => 'alpha|max:20|nullable',
            'gender' => 'required',
            'identification_number' => 'required|numeric|unique:patients',
            'birthday_date' => 'required|date',
            'principal_address' => 'required|max:100',
        ];
    }
    
    public function attributes()
    {
        return [
            'first_name' => 'Primer nombre',
            'second_name' => 'Segundo nombre',
            'first_surname' => 'Primer apellido',
            'second_surname' => 'Segundo apellido',
            'gender' => 'Genero',
            'identification_number' => 'Numero de cedula',
            'birthday_date' => 'Fecha de nacimiento',
            'principal_address' => 'Direccion principal',
        ];
    }
}
