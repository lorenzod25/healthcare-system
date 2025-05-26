<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\AppointmentController;

//  Home Page (Public)
Route::get('/', function () {
    return view('welcome');
});

//  Dashboard - requires login and email verification
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//  Authenticated user routes
Route::middleware('auth')->group(function () {

    // Profile management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //  Healthcare System routes
    Route::resource('patients', PatientController::class);
    Route::resource('providers', ProviderController::class);
    Route::resource('appointments', AppointmentController::class);
});

//  Laravel Breeze Auth routes (login, register, etc.)
require __DIR__.'/auth.php';
