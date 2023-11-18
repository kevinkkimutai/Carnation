<?php

namespace App\Http\Controllers\Admin;

use App\Mail\AdminPasswordResetMail;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return view("admin.auth.login");
    }
    public function loginAction(Request $request)
    {

        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $userdata = array(
            'email' => $request->input('email'),
            'password' => $request->input('password')
        );
        if (Auth::attempt($userdata)) {

            $twoFactorCode = 4455;

            info($twoFactorCode);


            User::where('id', Auth::id())->update([
                'last_login' => Carbon::now(),
            ]);



            return redirect()->route('dashboard');

        } else {
            // validation not successful, send back to form
            return back()->withInput()->with('error', 'Invalid Credentials');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('admin.login')->with('success', 'You successfully logged out.');
    }
    public function resetPassword()
    {
        return view('admin.auth.password_reset');
    }
    //Password reset action
    public function resetAction(Request $request)
    {
        // Creating Rules for Email and Password
        $validatedData = $request->validate([
            'email' => 'required|email'
        ]);

        $verify = User::where('email', $request->input('email'))->first();
        if (!isset($verify)) {
            return back()->withInput()->with('error', 'Email is not registered to an account.');
        }



        $newToken = bin2hex(openssl_random_pseudo_bytes(30));

        $updateUser = User::where('email', $request->input('email'))->update([
            'remember_token' => $newToken
        ]);
        if (!$updateUser) {
            return back()->withInput()->with('error', 'An unexpected error occurred.Please try again.');
        }

        $user = User::where('email', $request->input('email'))->first();

        Mail::to($verify)->send(new AdminPasswordResetMail($user));

        return redirect()->back()->withInput()->with('success', 'A password reset email has been sent to your email account.');

    }
    //New password view
    public function newPassword($token)
    {
        $verifyToken = User::where('remember_token', $token)->first();

        if (!isset($verifyToken)) {
            return redirect()->route('admin.password.reset')->with('error', 'Your reset token has expired.');
        }
        return view('admin.auth.password', [
            'details' => $verifyToken
        ]);
    }
    //Submitting the new password
    public function submitPassword(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'token' => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $newToken = bin2hex(openssl_random_pseudo_bytes(30));

        $updatePassword = User::where('email', $request->input('email'))->where('remember_token', $request->input('token'));
        if (!$updatePassword) {
            return redirect()->route('admin.password.new', $request->input('token'))->with('success', 'Your reset token has expired.');
        }

        $update = User::where('email', $request->input('email'))->update([
            'password' => Hash::make($request->input('password')),
            'remember_token' => $newToken
        ]);

        if (!$update) {
            return redirect()->route('admin.password.reset')->with('error', 'Your reset token has expired.');
        }

        return redirect()->route('admin.login')->with('success', 'Password reset successfully.');

    }
}
