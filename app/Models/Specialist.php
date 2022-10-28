<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialist extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 
        'second_name', 
        'first_surname', 
        'second_surname', 
        'gender', 
        'identification_number', 
        'birthday_date', 
        'email',
        'address',
        'department',
        'clinical_service'
    ];

    public function departments(){
        return $this->hasOne(Department::class);
    }
}
