<?php

namespace App\Models;

use App\Models\ContactInfo;
use App\Models\Appointment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['clinic_history', 'first_name', 'second_name', 'first_surname', 'second_surname', 'gender', 'identification_number', 'birthday_date'];

    protected $hidden = ['id'];

    public function contact_info()
    {
        return $this->hasOne(ContactInfo::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function getFullNameAttribute()
    {
        return "{$this['first_name']} {$this['first_surname']}";
    }
}
