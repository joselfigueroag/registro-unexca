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

    public function diabetes_p(){
        return $this->diabetes_p ? 'Si' : 'No';
    }
    
    public function hypertension_p(){
        return $this->hypertension_p ? 'Si' : 'No';
    }

    public function hiv_p(){
        return $this->hiv_p ? 'Si' : 'No';
    }

    public function allergies_p(){
        return $this->allergies_p ? 'Si' : 'No';
    }

    public function carcinomas_p(){
        return $this->carcinomas_p ? 'Si' : 'No';
    }

    public function surgeries_p(){
        return $this->surgeries_p ? 'Si' : 'No';
    }

    public function heart_disease_p(){
        return $this->heart_disease_p ? 'Si' : 'No';
    }

    public function liver_disease_p(){
        return $this->liver_disease_p ? 'Si' : 'No';
    }

    public function nephropathy_p(){
        return $this->nephropathy_p ? 'Si' : 'No';
    }

    public function psychological_p(){
        return $this->psychological_p ? 'Si' : 'No';
    }

    public function neurological_p(){
        return $this->neurological_p ? 'Si' : 'No';
    }

    public function endocrine_p(){
        return $this->endocrine_p ? 'Si' : 'No';
    }
    
    public function hematological_p(){
        return $this->hematological_p ? 'Si' : 'No';
    }

    public function autoimmune_p(){
        return $this->autoimmune_p ? 'Si' : 'No';
    }

    public function respiratory_p(){
        return $this->respiratory_p ? 'Si' : 'No';
    }
}
