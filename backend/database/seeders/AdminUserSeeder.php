<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $check = User::where('role', User::ROLE_ADMIN)->first();
        if (!$check) {
            // Create admin
            User::create([
                'first_name' => "Admin",
                'last_name' => "Admin",
                'email' => "admin@gmail.com",
                'phone' => "254705758788",
                'role' => User::ROLE_ADMIN,
                'password' => Hash::make("@carnation123@"),
            ]);
        }
    }
}
