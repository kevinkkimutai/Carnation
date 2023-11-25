<?php

use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\EnquiryController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\MigrateController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;


Route::get('migrate', [MigrateController::class, 'migrate']);


Route::prefix('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/login', [AuthController::class, 'login'])->name('admin.login');
    Route::post('/loginAction', [AuthController::class, 'loginAction'])->name('admin.login.action');
    Route::prefix('password')->group(function () {
        Route::get('/reset', [AuthController::class, 'resetPassword'])->name('admin.password.reset');
        Route::post('/reset/action', [AuthController::class, 'resetAction'])->name('admin.password.reset.action');
        Route::get('/new/{token}', [AuthController::class, 'newPassword'])->name('admin.password.new');
        Route::post('/newPassword', [AuthController::class, 'submitPassword'])->name('admin.password.new.submit');
    });

});

Route::middleware(['admin'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
    });
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'profile'])->name('profile');
        Route::post('/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::post('/password_update', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
    });

    Route::resource('users', UserController::class);
    Route::post('/users/update/{id}', [UserController::class, 'update'])->name('users.update');
    Route::get('/users/activate/{id}', [UserController::class, 'activate'])->name('users.activate');
    Route::get('/users/deactivate/{id}', [UserController::class, 'deactivate'])->name('users.deactivate');


    Route::get('/contact_us', [ContactController::class, 'messages'])->name('contactus');
    Route::get('/contact_us/{id}', [ContactController::class, 'complete'])->name('contactus.complete');
    Route::get('/enquiries', [EnquiryController::class, 'messages'])->name('enquiries');
    Route::get('/enquiries/{id}', [EnquiryController::class, 'complete'])->name('enquiries.complete');

    Route::prefix('admin')->group(function () {
        Route::resource('inventory', CarController::class);
        Route::get('inventory/feature/{id}', [CarController::class, 'feature'])->name('inventory.feature');
        Route::get('inventory/unfeature/{id}', [CarController::class, 'unfeature'])->name('inventory.unfeature');
        Route::get('inventory/images/{slug}', [CarController::class, 'images'])->name('inventory.images');
        Route::post('inventory/images/upload/{slug}', [CarController::class, 'uploadImages'])->name('inventory.images.upload');
        Route::post('inventory/update_submit/{slug}', [CarController::class, 'update'])->name('inventory.update.submit');
    });

});


Route::get('/', function () {
    return redirect()->route('dashboard');
});
