<?php

namespace Botble\BeautyServices\Services;

use Botble\BeautyServices\Models\Booking;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BookingAvailabilityService
{
    /**
     * Check if a specific provider is available for a requested time slot.
     * 
     * Logic: A booking is valid ONLY if there are no existing confirmed bookings
     * where (RequestedStartTime < ExistingEndTime) AND (RequestedEndTime > ExistingStartTime).
     */
    public function isAvailable(int $providerId, string $startTime, string $endTime): bool
    {
        $requestedStart = Carbon::parse($startTime);
        $requestedEnd = Carbon::parse($endTime);

        // 1. Check for overlapping bookings
        $overlapCount = DB::table('beauty_bookings')
            ->where('provider_id', $providerId)
            ->whereIn('status', ['confirmed', 'pending']) // Count pending as well to be safe
            ->where(function ($query) use ($requestedStart, $requestedEnd) {
                $query->where('start_time', '<', $requestedEnd)
                      ->where('end_time', '>', $requestedStart);
            })
            ->count();

        if ($overlapCount > 0) {
            return false;
        }

        // 2. Check against provider working hours (Optional but recommended)
        // This assumes business_hours is stored in the stores table as a JSON or separate table
        if (!$this->isWithinWorkingHours($providerId, $requestedStart, $requestedEnd)) {
            return false;
        }

        return true;
    }

    /**
     * Placeholder for checking if the requested time is within the provider's business hours.
     */
    protected function isWithinWorkingHours(int $providerId, Carbon $start, Carbon $end): bool
    {
        // For now, assume always available or implement logic to fetch from 'stores' table
        // Example logic:
        // $store = DB::table('stores')->where('id', $providerId)->first();
        // $hours = json_decode($store->business_hours, true);
        // ... validate day of week and time range ...
        
        return true; 
    }
}
