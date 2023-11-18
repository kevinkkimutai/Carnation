<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UpdatePasswordRequest;

class ProfileController extends Controller
{
    public function profile()
    {
        $details = User::find(auth()->id());
        return view("admin.profile.edit", compact("details"));
    }

    public function update(UpdateProfileRequest $request)
    {

        $validatedDate = $request->validated();
        $profile = User::find(auth()->id());

        // Update profile
        $updateProfile = $profile->update($validatedDate);


        if (!$updateProfile) {
            return back()->withInput()->with("error", "Failed to update profile. Please try again.");
        }

        return back()->withInput()->with("success", "Profile updated successfully.");

    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        dd($request->all());
        $validatedData = $request->valudate();




        $profile = User::find(auth()->id());

        if (Hash::check($request->password, $profile->password)) {
            return back()->withInput()->with("error", "Invalid old password.");
        }

        $updatePassword = $profile->update([
            'password' => Hash::make($request->new_password)
        ]);

        if (!$updatePassword) {
            return back()->withInput()->with("error", "Failed to update password. Please try again.");
        }

        return back()->withInput()->with("success", "Password updated successfully.");
    }
}
