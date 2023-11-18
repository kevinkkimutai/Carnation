<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use App\Models\CarFeatureItem;
use App\Models\CarImage;
use App\Models\CarMake;
use App\Models\BodyType;
use App\Models\CarModel;
use App\Models\Interior;
use App\Models\CarFeature;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bodyTypes = BodyType::all();
        $carMakes = CarMake::all();
        $carModels = CarModel::all();
        $interiors = Interior::all();
        $comfortFeatures = CarFeature::where('type', CarFeature::TYPE_COMFORT)->get();
        $safetyFeature = CarFeature::where('type', CarFeature::TYPE_SAFETY)->get();
        return view(
            "admin.inventory.create",
            compact("bodyTypes", "carMakes", "carModels", "interiors", "comfortFeatures", "safetyFeature")
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCarRequest $request)
    {
        try {
            // Validate all the request items
            $validatedData = $request->validated();

            // $validatedData->merge(['created_by_id' => auth()->id()]);
            $validatedData['created_by_id'] = auth()->id();


            // Create a new Car object in the database
            $car = Car::create($validatedData);


            // Create the comfort and safetu features
            foreach ($request->safety_features as $safetyFeature) {
                $createSafetuFeature = CarFeatureItem::create([
                    'car_id' => $car->id,
                    'car_feature_id' => $safetyFeature
                ]);
            }



            foreach ($request->comfort_features as $safetyFeature) {
                $createSafetuFeature = CarFeatureItem::create([
                    'car_id' => $car->id,
                    'car_feature_id' => $safetyFeature
                ]);
            }


            // Redirect to a specific route with a success message
            return redirect()->route("inventory.images", $car->slug)->with("success", "Vehicle created successfully.");
        } catch (\Exception $e) {
            // Handle the exception
            Log::info($e);
            return redirect()->back()->with("error", "An error occurred while storing the car.Please try again");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $details = Car::where("slug", $slug)->first();

        return view('admin.inventory.details', compact('details'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $details = Car::where("slug", $slug)->first();

        $bodyTypes = BodyType::all();
        $carMakes = CarMake::all();
        $carModels = CarModel::all();
        $interiors = Interior::all();
        $comfortFeatures = CarFeature::where('type', CarFeature::TYPE_COMFORT)->get();
        $safetyFeature = CarFeature::where('type', CarFeature::TYPE_SAFETY)->get();
        return view(
            "admin.inventory.create",
            compact("details", "bodyTypes", "carMakes", "carModels", "interiors", "comfortFeatures", "safetyFeature")
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCarRequest $request, Car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        //
    }

    public function images($slug)
    {

        $car = Car::where("slug", $slug)->first();

        return view('admin.inventory.images', [
            'details' => $car
        ]);
    }

    public function uploadImages(Request $request, ImageUploadService $imageUploadService, $slug)
    {
        Log::info($request->all());

        $vehicleDetails = Car::where('slug', $slug)->first();

        $vehicleDetails->update([
            'submission_complete' => true
        ]);


        $fileUrl = 'inventory/' . $slug;


        $file = $request->file;

        $uploadImage = $imageUploadService->uploadImage($fileUrl, $file);


        Log::info($uploadImage['success'] . $uploadImage['message']);

        // Add images to the car
        if ($uploadImage['success']) {
            $createCarImage = CarImage::create([
                'car_id' => $vehicleDetails->id,
                'image_url' => $uploadImage['url'],
                'status' => CarImage::STATUS_ACTIVE,
                'created_by_id' => auth()->id()
            ]);
            if (!$createCarImage) {
                Log::critical("Failed to store car image url" . $uploadImage['url'] . "Car slug" + $slug);
            }
        }


        return response()->json(["messages", "Successfully Uploaded"]);
    }
}
