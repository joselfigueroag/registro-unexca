<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;

class ClinicalService extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $fillable = ['department_id', 'name'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
