<?php

namespace App\Models;

use App\Models\ContactInfo;
use App\Models\Appointment;
use App\Models\Gender;
use App\Models\CivilStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'gender_id',
        'civil_status_id',
        'first_name',
        'second_name',
        'first_surname',
        'second_surname', 
        'birthday_date',
        'identification_number',
        'clinic_history',
    ];

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

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function civil_status()
    {
        return $this->belongsTo(CivilStatus::class);
    }
}
