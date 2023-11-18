<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreCarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'make_id' => 'required|integer',
            'model_id' => 'required|integer',
            'body_type' => 'required|string',
            'seat_number' => 'required|integer',
            'year' => 'required|numeric|digits:4',
            'price' => 'required|numeric',
            'mileage' => 'required|numeric',
            'cc' => 'required|numeric',
            'interior' => 'required|string',
            'transmission' => 'required|string',
            'color' => 'required|string',
            'drive_train' => 'required|string',
            'description' => 'required',
            'availability' => 'required|string',
            'top_speed' => 'required|numeric',
            'fuel' => 'required|string',
            'steering_type' => 'required|string',
            'doors' => 'required|integer',
            'steering' => 'required|string',
            'car_usage' => 'required|string',
            'safety_features' => 'required|array',
            'comfort_features' => 'required|array'
        ];
    }
}
