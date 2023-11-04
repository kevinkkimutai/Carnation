<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;



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
    Route::middleware(['admin'])->group(function () {
        Route::get('/', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
    });

});

Route::get('/', function () {
    return redirect()->route('admin.dashboard');
});
