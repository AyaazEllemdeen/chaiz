<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'make',
        'model',
        'car_mileage',
        'state',
        'zip',
        'email',
        'user_name',
        'user_number',
    ];
}
