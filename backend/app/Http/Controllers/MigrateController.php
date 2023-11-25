<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class MigrateController extends Controller
{
    public function migrate()
    {
        // Run migrations
        Artisan::call('migrate');

        // Optionally, you can seed the database after migrations
        // Artisan::call('db:seed');

        // You can return a response indicating the migration status
        return response()->json(['message' => 'Migrations successfully executed']);
    }
}
