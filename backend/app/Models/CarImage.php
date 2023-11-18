<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarImage extends Model
{
    use HasFactory;

    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';

    protected $fillable = [
        'car_id',
        'image_url',
        'status', // boolean active/inactive
        'order', // Order 1 is featured
        'created_by_id'
    ];


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $currentMax = CarImage::where('car_id', $model->car_id)->max('order');
            $model->order = $currentMax + 1;
        });

    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id');
    }
}
