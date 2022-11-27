<?php

namespace App\Models;

use App\Models\Municipality;
use App\Models\State;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capital extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'state_id'];

    public function municipalities()
    {
        return $this->hasMany(Municipality::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
