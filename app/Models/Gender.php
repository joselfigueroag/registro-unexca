<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;

    protected $fillable = ['type'];

    protected $hidden = ['id'];

    public function clinical_service()
    {
        return $this->belongsTo(ClinicalService::class);
    }
}
