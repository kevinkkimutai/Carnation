<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\Admin\NewUserEmail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\UserCreateRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('id', '<>', auth()->id())->get();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserCreateRequest $request)
    {
        $validatedData = $request->validated();

        $password = Str::random(10);

        $validatedData['password'] = Hash::make($password);
        $validatedData['remember_token'] = bin2hex(openssl_random_pseudo_bytes(30));

        $user = User::create($validatedData);

        if (!$user) {
            return back()->withInput()->with('error', 'An unexpected error occurred. Please try again.');
        }

        Mail::to($user)->send(new NewUserEmail($user, $password));

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $details = User::find($id);

        return view('admin.users.edit', compact('details'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserCreateRequest $request, string $id)
    {
        $user = User::find($id);
        $validatedData = $request->validated();

        $update = $user->update($validatedData);

        if (!$update) {
            return back()->withInput()->with('error', 'An unexpected error occurred. Please try again.');
        }

        return back()->with('success', 'User updated successfully.');

    }


    public function activate($id)
    {
        $user = User::find($id);

        $update = $user->update(['is_active' => true]);

        if (!$update) {
            return back()->withInput()->with('error', 'An unexpected error occurred. Please try again.');
        }

        return back()->with('success', 'User activated successfully.');

    }

    public function deactivate($id)
    {
        $user = User::find($id);

        $update = $user->update(['is_active' => false]);

        if (!$update) {
            return back()->withInput()->with('error', 'An unexpected error occurred. Please try again.');
        }

        return back()->with('success', 'User de-activated successfully.');

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
