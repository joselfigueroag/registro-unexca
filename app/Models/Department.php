<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ClinicalService;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected $hidden = ['id'];

    public function clinical_services()
    {
        return $this->hasMany(ClinicalService::class);
    }
}
