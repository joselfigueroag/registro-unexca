<?php

namespace App\Models;

use App\Models\Capital;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'country_id'];

    protected $hidden = ['id'];

    public function capital()
    {
        return $this->hasOne(Capital::class);
    }
}
