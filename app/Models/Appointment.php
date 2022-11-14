<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ClinicalService;
use App\Models\Patient;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['patient_id', 'department_id', 'clinical_service_id', 'description'];

    protected $hidden = ['id'];

    public function clinical_service()
    {
        return $this->belongsTo(ClinicalService::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
