<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalBackground extends Model
{
    use HasFactory;

    protected $table = 'personal_background';

    protected $fillable = [
        'diabetes_p',
        'hypertension_p',
        'hiv_p',
        'allergies_p',
        'carcinomas_p',
        'surgeries_p',
        'heart_disease_p',
        'liver_disease_p',
        'nephropathy_p',
        'psychological_p',
        'neurological_p',
        'endocrine_p',
        'hematological_p',
        'autoimmune_p',
        'respiratory_p',
    ];
}
