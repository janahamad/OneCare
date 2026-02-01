<?php

namespace App\Services;

use App\Models\Booking;
use Carbon\Carbon;

class BookingAvailabilityService
{
    /**
     * Check if a specific salon is available for a requested time slot.
     */
    public function isAvailable(int $salonId, string $startTime, string $endTime): bool
    {
        $requestedStart = Carbon::parse($startTime);
        $requestedEnd = Carbon::parse($endTime);

        // Check for overlapping bookings
        $overlapCount = Booking::where('salon_id', $salonId)
            ->whereIn('status', ['confirmed', 'pending'])
            ->where(function ($query) use ($requestedStart, $requestedEnd) {
                $query->where('start_time', '<', $requestedEnd)
                      ->where('end_time', '>', $requestedStart);
            })
            ->count();

        return $overlapCount === 0;
    }
}
