<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyBackground extends Model
{
    use HasFactory;

    protected $table = 'family_background';

    protected $fillable = [
        'diabetes_f',
        'hypertension_f',
        'allergies_f',
        'asthma_f',
        'epilepsy_f',
        'obesity_f',
        'alcoholism_f',
        'carcinomas_f',
        'heart_disease_f',
        'liver_disease_f',
        'nephropathy_f',
        'psychological_f',
        'neurological_f',
        'endocrine_f',
        'hematological_f',
        'autoimmune_f',
    ];
}
