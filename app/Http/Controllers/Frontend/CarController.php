<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the available cars.
     */
    public function index(Request $request)
    {
        // Filtering cars by type, brand, and max daily rent price
        $query = Car::where('availability', 1); // Only show available cars

        // Apply filters based on query parameters from the user
        if ($request->filled('car_type')) {
            $query->where('car_type', $request->car_type);
        }

        if ($request->filled('brand')) {
            $query->where('brand', $request->brand);
        }

        if ($request->filled('max_price')) {
            $query->where('daily_rent_price', '<=', $request->max_price);
        }

        // Get all filtered cars
        $cars = $query->paginate(10); // Paginate for better UX

        return view('frontend.rentals.index', compact('cars'));
    }

    /**
     * Display the specified car details.
     */
    public function show($id)
    {
        // Find the car by its ID or fail
        $car = Car::findOrFail($id);

        // Pass car data to the view
        return view('frontend.rentals.show', compact('car'));
    }

    /**
     * Book the car for the specified period.
     */
    public function book(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
        ]);

        // Fetch the car
        $car = Car::findOrFail($id);

        // Check if the car is available for the given dates
        if (!$car->availability) {
            return redirect()->back()->with('error', 'This car is currently unavailable.');
        }

        // Here you can add logic to check if the car is booked in the given date range (e.g., check bookings table)

        // If all validations pass, save the booking details
        // Booking logic should be implemented (perhaps in a Booking model or table)

        // For now, we'll just simulate a successful booking.
        return redirect()->back()->with('success', 'Car booked successfully from ' . $request->start_date . ' to ' . $request->end_date);
    }
}
