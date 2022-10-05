<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionalInfo extends Model
{
    use HasFactory;

    protected $table = 'additional_info';

    protected $fillable = ['patient_id', 'address_1', 'address_2'];

    protected $hidden = ['id'];
}
