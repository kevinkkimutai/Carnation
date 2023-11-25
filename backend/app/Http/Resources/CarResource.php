<?php

namespace App\Http\Resources;

use App\Models\CarFeature;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $existingFeatures = $this->carFeatures()->pluck('car_feature_id')->toArray();
        $comfortFeatures = CarFeature::where('type', CarFeature::TYPE_COMFORT)->get();
        $safetyFeatures = CarFeature::where('type', CarFeature::TYPE_SAFETY)->get();

        $comfortCarFeatureList = [];
        $safetyCarFeatureList = [];

        foreach ($comfortFeatures as $feature) {
            $comfortCarFeatureList[] = [
                'id' => $feature->id,
                'name' => $feature->name,
                'type' => $feature->type,
                'has_feature' => in_array($feature->id, $existingFeatures),
                'created_at' => $feature->created_at,
                'updated_at' => $feature->updated_at,
            ];
        }

        foreach ($safetyFeatures as $feature) {
            $safetyCarFeatureList[] = [
                'id' => $feature->id,
                'name' => $feature->name,
                'type' => $feature->type,
                'has_feature' => in_array($feature->id, $existingFeatures),
                'created_at' => $feature->created_at,
                'updated_at' => $feature->updated_at,
            ];
        }
        return [
            "id" => $this->slug,
            "title" => $this->title,
            "slug" => $this->slug,
            "make_id" => $this->make_id,
            "make" => new CarMakeModelResource($this->make),
            "model_id" => $this->model_id,
            "model" => new CarModelMakeResource($this->model),
            "body_type" => new BodyTypeResource($this->bodyType),
            "year" => $this->year,
            "price" => number_format($this->price),
            "mileage" => $this->mileage,
            "cc" => $this->cc,
            "transmission" => $this->transmission,
            "color" => $this->color,
            "interior" => $this->interior,
            "drive_train" => $this->drive_train,
            "description" => $this->description,
            "availability" => $this->availability,
            "top_speed" => $this->top_speed,
            "fuel" => $this->fuel,
            "seat_number" => $this->seat_number,
            "doors" => $this->doors,
            "steering" => $this->steering,
            "steering_type" => $this->steering_type,
            "car_usage" => $this->car_usage,
            "submission_complete" => $this->submission_complete,
            "featured" => $this->featured,
            "youtube_url" => $this->youtube_url,
            "youtube_video_code" => $this->youtube_video_code,
            "featured_image" => env('AWS_BASE_URL') . $this->images->first()->image_url,
            "images" => CarImageResource::collection($this->images),
            "safety_features" => FeatureResource::collection($comfortCarFeatureList),
            "comfort_features" => FeatureResource::collection($safetyCarFeatureList),

        ];
    }
}
