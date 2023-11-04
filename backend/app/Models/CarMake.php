<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarMake extends Model
{
    use HasFactory;
    protected $fillable = [
        'slug',
        'name'
    ];

    public function carModels()
    {
        return $this->hasMany(CarMake::class, 'car_make_id');
    }

    // Vehicles
}
