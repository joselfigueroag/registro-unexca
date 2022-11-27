<?php

namespace App\Models;

use App\Models\Capital;
use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'country_id'];

    public function capital()
    {
        return $this->hasOne(Capital::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
