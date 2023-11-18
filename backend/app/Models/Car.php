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
        'submission_complete',
        'featured'
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

    public function carFeatureItems()
    {
        return $this->hasMany(CarFeatureItem::class, 'car_id');
    }

    public function make()
    {
        return $this->belongsTo(CarMake::class, 'make_id');
    }

    public function model()
    {
        return $this->belongsTo(CarModel::class, 'model_id');
    }

    public function bodyType()
    {
        return $this->belongsTo(BodyType::class, 'body_type', 'slug');
    }

    public function interiorType()
    {
        return $this->belongsTo(Interior::class, 'interior', 'slug');
    }

    public function carFeatures()
    {
        return $this->hasMany(CarFeatureItem::class, 'car_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
}
