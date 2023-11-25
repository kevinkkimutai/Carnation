<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ContactController extends Controller
{
    public function messages()
    {
        $messages = ContactUs::orderBy('completed', 'ASC')->paginate(20);

        return view('admin.contact.list', compact('messages'));
    }

    public function complete($id)
    {
        $message = ContactUs::findOrFail($id);

        $message->update([
            'completed' => true,
            'completed_by_id' => auth()->id(),
            'completed_at' => Carbon::now()
        ]);


        return back()->with('success', 'Contact us message marked as completed.');
    }
}
