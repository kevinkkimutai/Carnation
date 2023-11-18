<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarFeatureItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'car_feature_id',
        'available',
    ];
}
