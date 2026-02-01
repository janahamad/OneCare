<?php

use Botble\BeautyServices\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Botble\BeautyServices\Http\Controllers', 'middleware' => ['web', 'core']], function () {
    Route::group(['prefix' => 'beauty-services', 'as' => 'beauty-services.'], function () {
        Route::post('bookings', [BookingController::class, 'store'])->name('bookings.store');
        Route::get('calendar-events/{provider_id}', [BookingController::class, 'getCalendarEvents'])->name('calendar-events');
    });

    // Provider Dashboard Routes (Simplified)
    Route::group(['prefix' => 'vendor', 'as' => 'vendor.', 'middleware' => ['vendor']], function () {
        Route::get('beauty-bookings', [BookingController::class, 'index'])->name('beauty-bookings.index');
    });
});
