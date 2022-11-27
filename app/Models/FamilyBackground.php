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

    public function diabetes_f(){
        return $this->diabetes_f ? 'Si' : 'No';
    }
    
    public function hypertension_f(){
        return $this->hypertension_f ? 'Si' : 'No';
    }

    public function allergies_f(){
        return $this->allergies_f ? 'Si' : 'No';
    }

    public function asthma_f(){
        return $this->asthma_f ? 'Si' : 'No';
    }

    public function epilepsy_f(){
        return $this->epilepsy_f ? 'Si' : 'No';
    }

    public function obesity_f(){
        return $this->obesity_f ? 'Si' : 'No';
    }

    public function alcoholism_f(){
        return $this->alcoholism_f ? 'Si' : 'No';
    }
    
    public function carcinomas_f(){
        return $this->carcinomas_f ? 'Si' : 'No';
    }

    public function heart_disease_f(){
        return $this->heart_disease_f ? 'Si' : 'No';
    }

    public function liver_disease_f(){
        return $this->liver_disease_f ? 'Si' : 'No';
    }

    public function nephropathy_f(){
        return $this->nephropathy_f ? 'Si' : 'No';
    }

    public function psychological_f(){
        return $this->psychological_f ? 'Si' : 'No';
    }

    public function neurological_f(){
        return $this->neurological_f ? 'Si' : 'No';
    }

    public function endocrine_f(){
        return $this->endocrine_f ? 'Si' : 'No';
    }

    public function hematological_f(){
        return $this->hematological_f ? 'Si' : 'No';
    }

    public function autoimmune_f(){
        return $this->autoimmune_f ? 'Si' : 'No';
    }
}
