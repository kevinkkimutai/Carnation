<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'first_name',
        'last_name',
        'phone',
        'message',
        'completed',
        'completed_by_id',
        'completed_on'
    ];


    public function carDetails()
    {
        return $this->belongsTo(Car::class, 'car_id');
    }
}
