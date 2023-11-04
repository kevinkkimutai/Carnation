<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'name',
        'car_make_id'
    ];

    public function carMake()
    {
        return $this->belongsTo(CarMake::class, 'car_make_id');
    }
}
