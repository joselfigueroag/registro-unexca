<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habit extends Model
{
    use HasFactory;

    protected $fillable = [
        'smoker',
        'drink_liquor',
        'use_drugs',
        'drink_coffee',
        'treatment',
        'training',
    ];

    public function smoker(){
        return $this->smoker ? 'Si' : 'No';
    }
    
    public function drink_liquor(){
        return $this->drink_liquor ? 'Si' : 'No';
    }

    public function use_drugs(){
        return $this->use_drugs ? 'Si' : 'No';
    }

    public function drink_coffee(){
        return $this->drink_coffee ? 'Si' : 'No';
    }

    public function treatment(){
        return $this->treatment ? 'Si' : 'No';
    }

    public function training(){
        return $this->training ? 'Si' : 'No';
    }
}
