<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClinicalServiceRequest extends FormRequest
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
        // dd($this);
        return match($this->method()){
            'POST' => [
                'name' => 'required|max:100|unique:clinical_services',
                'department' => 'required' 
            ],
        };
    }
    
    public function attributes()
    {
        return [
            'name' => 'Nombre del servicio clinico',
        ];
    }
}
