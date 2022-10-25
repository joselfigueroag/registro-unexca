<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AdditionalInfo;
use App\Models\Appointment;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = ['clinic_history', 'first_name', 'second_name', 'first_surname', 'second_surname', 'gender', 'identification_number', 'birthday_date'];

    protected $hidden = ['id'];

    public function additional_info()
    {
        return $this->hasOne(AdditionalInfo::class);
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
