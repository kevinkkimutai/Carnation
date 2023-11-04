<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'make_id',
        'model_id',
        'body_type',
        'year',
        'price',
        'mileage',
        'cc',
        'transmission',
        'color',
        'interior',
        'drive_train',
        'description',
        'availability',
        // available,sold,en-route
        'top_speed',
        'fuel',
        // petrol,diesel,
        'is_hybrid',
        'seat_number',
        'doors',
        'steering',
        'car_usage',
        'category',
        'created_by_id'
    ];
}
