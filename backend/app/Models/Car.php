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
        'featured',
        'youtube_url',
        'youtube_video_code'
    ];


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = Str::slug($model->title) . uniqid();
            $model->category = 'internal';
            if ($model->youtube_url) {
                $model->youtube_video_code = $model->getYoutubeCode($model->youtube_url);
            }
        });

    }

    public function getYoutubeCode($url)
    {
        // Regular expression to match YouTube video URL
        $pattern = '/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/';

        // Use preg_match to find the video ID in the URL
        preg_match($pattern, $url, $matches);

        // Return the video ID or null if not found
        return isset($matches[1]) ? $matches[1] : null;
    }

    public function images()
    {
        return $this->hasMany(CarImage::class)->orderBy('order', 'ASC');
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
