<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarFeature extends Model
{
    use HasFactory;

    const TYPE_COMFORT = 'comfort';
    const TYPE_SAFETY = 'safety';

    protected $fillable = [
        'name',
        'type'
    ];
}
