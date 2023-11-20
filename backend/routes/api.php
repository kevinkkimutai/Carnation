<?php

use App\Http\Controllers\Api\v1\ContactController;
use App\Http\Controllers\Api\v1\InventoryController;
use App\Http\Controllers\Api\v1\ListController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('v1')->group(function () {
    Route::prefix('inventory')->group(function () {
        Route::prefix('list')->group(function () {
            Route::get('/makes', [ListController::class, 'makes']);
            Route::get('/models', [ListController::class, 'models']);
            Route::get('/makes/{id}', [ListController::class, 'makeModels']);
            Route::get('/body_types', [ListController::class, 'bodyTypes']);
            Route::get('/interiors', [ListController::class, 'interiors']);
            Route::get('/features', [ListController::class, 'features']);
        });
        Route::get('/featured', [InventoryController::class, 'featured']);
        Route::get('/', [InventoryController::class, 'inventory']);
        Route::get('/details/{slug}', [InventoryController::class, 'details']);
        Route::get('/search', [InventoryController::class, 'search']);
        Route::post('/enquire', [InventoryController::class, 'enquire']);
    });

    Route::post('/contact_us', [ContactController::class, 'contactUs']);
});
