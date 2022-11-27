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
}
