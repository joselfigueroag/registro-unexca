<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
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
            // 'PUT' => [
            //     'name' => 'required|max:100|unique:departments'
            // ],
            'POST' => [
                'name' => 'required|max:100|unique:departments'
                // 'name_department' => 'required|max:100|unique:departments'
            ],
        };
    }
    
    public function attributes()
    {
        return [
            'name' => 'nombre del departamento',
        ];
    }
    
}
