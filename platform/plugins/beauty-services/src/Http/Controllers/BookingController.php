<?php

namespace Botble\BeautyServices\Http\Controllers;

use Botble\Base\Http\Controllers\BaseController;
use Botble\BeautyServices\Services\BookingAvailabilityService;
use Botble\BeautyServices\Models\Booking;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookingController extends BaseController
{
    protected $availabilityService;

    public function __construct(BookingAvailabilityService $availabilityService)
    {
        $this->availabilityService = $availabilityService;
    }

    /**
     * Handle the booking request.
     */
    public function store(Request $request)
    {
        $request->validate([
            'provider_id' => 'required|exists:stores,id',
            'service_id'  => 'required|exists:beauty_services,id',
            'start_time'  => 'required|date|after:now',
        ]);

        $service = \DB::table('beauty_services')->where('id', $request->service_id)->first();
        $startTime = Carbon::parse($request->start_time);
        $endTime = $startTime->copy()->addMinutes($service->duration_minutes);

        if (!$this->availabilityService->isAvailable($request->provider_id, $startTime->toDateTimeString(), $endTime->toDateTimeString())) {
            return response()->json([
                'error' => true,
                'message' => __('This time slot is no longer available. Please choose another time.'),
            ], 422);
        }

        // Logic to create booking
        // $booking = Booking::create([...]);

        return response()->json([
            'error' => false,
            'message' => __('Booking successfully created!'),
        ]);
    }

    /**
     * Provider Dashboard Calendar Feed.
     */
    public function getCalendarEvents(Request $request, int $providerId)
    {
        // Fetch bookings for FullCalendar.js
        $bookings = \DB::table('beauty_bookings')
            ->where('provider_id', $providerId)
            ->get()
            ->map(function ($booking) {
                return [
                    'id'    => $booking->id,
                    'title' => 'Booking #' . $booking->id,
                    'start' => $booking->start_time,
                    'end'   => $booking->end_time,
                    'color' => $this->getStatusColor($booking->status),
                ];
            });

        return response()->json($bookings);
    }

    protected function getStatusColor(string $status): string
    {
        return match ($status) {
            'pending'   => '#ffc107',
            'confirmed' => '#28a745',
            'cancelled' => '#dc3545',
            default     => '#6c757d',
        };
    }
}
