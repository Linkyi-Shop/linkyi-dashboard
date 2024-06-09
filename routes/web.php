<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ThemeController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {

    Route::get("/", [DashboardController::class, 'index'])->name("dashboard.index");

    Route::resource('theme', ThemeController::class)->except("delete");
    Route::get('theme/setStatus/{id}', [ThemeController::class, 'setStatus'])->name('theme.setStatus');

    Route::resource('store', StoreController::class)->only("show", "index");

    //> users

    //> profile
    Route::prefix('profile')->group(function () {
        Route::get('/', [DashboardController::class, 'profile'])->name('dashboard.profile');
        Route::post('/', [DashboardController::class, 'updateProfile'])->name('dashboard.profile');
        Route::get('/update-password', [DashboardController::class, 'changePassword'])->name('dashboard.update-password');
        Route::post('/update-password', [DashboardController::class, 'updatePassword'])->name('dashboard.update-password');
    });
});

Route::prefix('auth')->group(function () {
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::get('logout', function () {
        Auth()->logout();
        request()->session()->invalidate();
        request()->session()->flush();
        request()->session()->regenerateToken();
        return redirect()->route('login');
    })->name('logout');
});
