<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'top_speed',
        'fuel',
        'steering_type',
        'seat_number',
        'doors',
        'steering',
        'car_usage',
        'category',
        'created_by_id',
        'submission_complete'
    ];


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = Str::slug($model->title) . uniqid();
            $model->category = 'internal';
        });

    }

    public function images()
    {
        return $this->hasMany(CarImage::class);
    }
}
