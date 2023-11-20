<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends Controller
{
    public function contactUs(Request $request)
    {
        $validator = $validator = Validator::make($request->all(), [
            'first_name' => 'required|string',
            'last_name' => 'nullable|string',
            'phone' => 'required|string|min:10',
            'message' => 'required|string',

        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first(),
                'errors' => $validator->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $createContactUs = ContactUs::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'message' => $request->message,

        ]);

        if (!$createContactUs) {
            return response()->json([
                'message' => "An unexpected error occurred. Please reload the page and try again.",
            ], Response::HTTP_NOT_FOUND);

        }

        // TODO : Send an email to admin.
        return response()->json([
            'message' => "Message sent succesfully. Our team will reach you shortly.",
        ]);
    }
}
