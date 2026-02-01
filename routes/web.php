<?php

use App\Http\Controllers\SalonController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/salon/{salon}', [SalonController::class, 'show'])->name('salon.profile');
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');

// Filament panels handle themselves via PanelProviders
