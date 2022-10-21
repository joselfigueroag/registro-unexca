<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;

class ClinicalService extends Model
{
    use HasFactory;

    protected $fillable = ['department_id', 'name'];

    protected $hidden = ['id'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
