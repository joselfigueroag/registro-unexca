<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;
use App\Models\ClinicalService;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id', 'department_id', 'clinical_service_id', 'description'];

    protected $hidden = ['id'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function clinical_service()
    {
        return $this->belongsTo(ClinicalService::class);
    }
}
