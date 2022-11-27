<?php

namespace App\Models;

use App\Models\Capital;
use App\Models\Parish;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'capital_id'];

    public function parishes()
    {
        return $this->hasMany(Parish::class);
    }

    public function capital()
    {
        return $this->belongsTo(Capital::class);
    }
}
