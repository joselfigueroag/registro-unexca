<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    use HasFactory;

    protected $table = 'contact_info';

    protected $fillable = [
        'patient_id',
        'parish_id',
        'email',
        'cellphone_number',
        'local_number',
        'principal_address',
        'secondary_address',
    ];

    protected $hidden = ['id'];
}
