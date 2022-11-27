<?php

namespace App\Models;

use App\Models\Municipality;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parish extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'municipality_id'];

    protected $hidden = ['id'];

    public function municipality()
    {
        return $this->belongsTo(Municipality::class);
    }
}
