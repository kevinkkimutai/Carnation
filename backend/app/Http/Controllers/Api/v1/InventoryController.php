<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Car;
use App\Models\CarMake;
use App\Models\CarModel;
use App\Models\Enquiry;
use Illuminate\Http\Request;
use App\Http\Resources\CarResource;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class InventoryController extends Controller
{
    public function featured()
    {
        $featured = Car::where('featured', true)->where('submission_complete', true)->paginate(4);


        return CarResource::collection($featured);
    }


    public function inventory(Request $request)
    {
        // Check for 'type'
        // Check for 'category'
        $inventory = Car::where('submission_complete', true);
        if ($request->has('car_usage') && !empty($request->car_usage)) {
            Log::info('Car has type' . $request->car_usage);
            $inventory->where('car_usage', $request->car_usage);
        }
        if ($request->has('category') && !empty($request->category)) {
            Log::info('Car has category' . $request->category);
            $inventory->where('category', $request->category);
        }

        $inventory = $inventory->orderBy('id', 'desc')->paginate(4);

        return CarResource::collection($inventory);
    }


    public function details($slug)
    {
        $details = Car::where('slug', $slug)->firstOrFail();

        return new CarResource($details);
    }

    public function search(Request $request)
    {
        $inventory = Car::where('submission_complete', true);

        // Check for 'make' parameter
        if ($request->has('make') && !empty($request->make)) {
            Log::info('Car make: ' . $request->make);
            $make = CarMake::where('slug', $request->make)->first();
            $inventory->where('make_id', $make->id);
        }

        // Check for 'model' parameter
        if ($request->has('model') && !empty($request->model)) {
            Log::info('Car model: ' . $request->model);
            $model = CarModel::where('slug', $request->model)->first();
            $inventory->where('model_id', $model->id);
        }

        // Check for 'min_year' parameter
        if ($request->has('min_year') && !empty($request->min_year)) {
            Log::info('Minimum year: ' . $request->min_year);
            $inventory->where('year', '>=', $request->min_year);
        }

        // Check for 'max_year' parameter
        if ($request->has('max_year') && !empty($request->max_year)) {
            Log::info('Maximum year: ' . $request->max_year);
            $inventory->where('year', '<=', $request->max_year);
        }

        // Check for 'car_usage' parameter
        if ($request->has('car_usage') && !empty($request->car_usage)) {
            $inventory->where('car_usage', $request->car_usage);
        }

        // Check for 'min_price' parameter
        if ($request->has('min_price') && !empty($request->min_price)) {
            Log::info('Minimum price: ' . $request->min_price);
            $inventory->where('price', '>=', $request->min_price);
        }

        // Check for 'max_price' parameter
        if ($request->has('max_price') && !empty($request->max_price)) {
            Log::info('Maximum price: ' . $request->max_price);
            $inventory->where('price', '<=', $request->max_price);
        }


        $inventory = $inventory->orderBy('id', 'desc')->paginate(20);

        return CarResource::collection($inventory);

    }

    public function enquire(Request $request)
    {
        $validator = $validator = Validator::make($request->all(), [
            'first_name' => 'required|string',
            'last_name' => 'nullable|string',
            'phone' => 'required|string|min:10',
            'message' => 'required|string',
            'id' => 'required|string'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first(),
                'errors' => $validator->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $carDetails = Car::where('slug', $request->id)->first();

        if (!$carDetails) {
            return response()->json([
                'message' => "An unexpected error occurred. Please reload the page and try again.",
            ], Response::HTTP_NOT_FOUND);
        }


        $createEnquiry = Enquiry::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'message' => $request->message,
            'car_id' => $carDetails->id
        ]);

        if (!$createEnquiry) {

            return response()->json([
                'message' => "An unexpected error occurred. Please reload the page and try again.",
            ], Response::HTTP_NOT_FOUND);

        }
        return response()->json([
            'message' => "Enquiry logged. Our team will reach you shortly.",
        ]);
    }
}
