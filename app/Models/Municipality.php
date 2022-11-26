<?php

namespace App\Models;

use App\Models\Parish;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'capital_id'];

    protected $hidden = ['id'];

    public function parishes()
    {
        return $this->hasMany(Parish::class);
    }
}
