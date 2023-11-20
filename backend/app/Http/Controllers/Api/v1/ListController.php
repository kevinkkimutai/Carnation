<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\CarMake;
use App\Models\BodyType;
use App\Models\CarModel;
use App\Models\Interior;
use App\Models\CarFeature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MakeResource;
use App\Http\Resources\ModelResource;
use App\Http\Resources\FeatureResource;
use App\Http\Resources\BodyTypeResource;
use App\Http\Resources\InteriorResource;

class ListController extends Controller
{
    public function makes()
    {
        $makes = CarMake::all();

        return MakeResource::collection($makes);
    }

    public function models()
    {
        $models = CarModel::all();

        return ModelResource::collection($models);
    }

    public function makeModels($id)
    {
        $make = CarMake::find($id);

        return new MakeResource($make);
    }


    public function bodyTypes()
    {
        $bodyTypes = BodyType::all();


        return BodyTypeResource::collection($bodyTypes);
    }


    public function interiors()
    {
        $interiors = Interior::all();

        return InteriorResource::collection($interiors);
    }

    public function features()
    {
        $features = CarFeature::all();


        return FeatureResource::collection($features);
    }

}
