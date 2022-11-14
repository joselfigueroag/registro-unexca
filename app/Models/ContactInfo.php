<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    use HasFactory;

    protected $table = 'contact_info';

    protected $fillable = ['patient_id', 'address_1', 'address_2', 'email', 'cellphone_number', 'local_number'];

    protected $hidden = ['id'];
}
