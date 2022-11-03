<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ClinicalService;
use App\Models\Specialist;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected $hidden = ['id'];

    public function clinical_services()
    {
        return $this->hasMany(ClinicalService::class);
    }

    public function specialists()
    {
        return $this->hasMany(Specialist::class);
    }
}
