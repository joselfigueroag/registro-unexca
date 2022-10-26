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
        return match($this->method()){
            'POST' => $this->store_and_update(),
            'PUT', 'PATCH' => $this->store_and_update(),
            'DELETE' => $this->destroy(),
            default => $this->view()
        };
    }
    
    public function store_and_update()
    {
        return [
            'first_name' => 'required|alpha|max:20',
            'second_name' => 'alpha|max:20|nullable',
            'first_surname' => 'required|alpha|max:20',
            'second_surname' => 'alpha|max:20|nullable',
            'gender' => 'required',
            'identification_number' => 'numeric|nullable',
            'email' => 'email|nullable',
            'birthday_date' => 'required|date',

            'address_1' => 'required|max:100',
            'address_2' => 'max:100|nullable'
        ];
    }

    public function messages()
    {
        return [
            'gender.required' => 'Eleccion requerida',
        ];
    }

    // public function attributes()
    // {
    //     return [
    //         'first_name' => 'primer nombre',
    //     ];
    // }
}
