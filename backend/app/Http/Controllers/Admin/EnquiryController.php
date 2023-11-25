<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Enquiry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EnquiryController extends Controller
{
    public function messages()
    {
        $messages = Enquiry::orderBy('completed', 'ASC')->paginate(20);

        return view('admin.enquiries.list', compact('messages'));
    }

    public function complete($id)
    {
        $message = Enquiry::findOrFail($id);

        $message->update([
            'completed' => true,
            'completed_by_id' => auth()->id(),
            'completed_at' => Carbon::now()
        ]);


        return back()->with('success', 'Enquiry message marked as completed.');
    }
}
