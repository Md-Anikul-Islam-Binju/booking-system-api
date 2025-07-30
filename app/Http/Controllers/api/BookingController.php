<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookingResource;
use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;

class BookingController extends Controller
{
   public function store(Request $request)
   {
         $validated = $request->validate([
              'service_id' => 'required|exists:services,id',
              'booking_date' => 'required',
         ]);

         $booking = new Booking();
         $booking->user_id = auth()->id();
         $booking->service_id = $validated['service_id'];
         $booking->booking_date = $validated['booking_date'];
         $booking->save();

         return response()->json([
              'message' => 'Booking created successfully',
              'booking' => $booking
         ], 201);
   }

    public function show(Request $request)
    {
        $bookings = Booking::where('user_id', auth()->id())
            ->with('service')
            ->get();

        if ($bookings->isEmpty()) {
            return response()->json([
                'message' => 'No bookings found for this user'
            ], 404);
        }

        return response()->json([
            'bookings' => BookingResource::collection($bookings)
        ], 200);
    }

    public function showAllBooking(Request $request)
    {
        $bookings = Booking::with(['service', 'user'])->get();

        if ($bookings->isEmpty()) {
            return response()->json([
                'message' => 'No bookings found'
            ], 404);
        }

        return response()->json([
            'bookings' => BookingResource::collection($bookings)
        ], 200);
    }

}
