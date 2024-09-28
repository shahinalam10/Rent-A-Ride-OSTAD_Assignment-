<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon; // Import Carbon for date calculations

class RentalController extends Controller
{
    // Book a car
    public function book(Request $request, $id)
    {
        // Validate the rental dates
        $request->validate([
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // Find the car by ID
        $car = Car::findOrFail($id);

        // Check if the car is already booked for the selected date range
        $conflictingRentals = Rental::where('car_id', $car->id)
            ->where(function ($query) use ($request) {
                $query->whereBetween('start_date', [$request->start_date, $request->end_date])
                    ->orWhereBetween('end_date', [$request->start_date, $request->end_date])
                    ->orWhere(function($query) use ($request) {
                        $query->where('start_date', '<=', $request->start_date)
                              ->where('end_date', '>=', $request->end_date);
                    });
            })->exists();

        if ($conflictingRentals) {
            return redirect()->back()->with('error', 'Car is unavailable for the selected dates.');
        }

        // Calculate the number of rental days
        $startDate = Carbon::parse($request->start_date);
        $endDate = Carbon::parse($request->end_date);
        $rentalDays = $endDate->diffInDays($startDate) + 1; // +1 to include the last day

        // Calculate total cost
        $totalCost = $rentalDays * $car->daily_rent_price;

        // Create a new rental record
        $rental = new Rental();
        $rental->user_id = Auth::id(); // Current logged-in user
        $rental->car_id = $car->id; // The car being booked
        $rental->start_date = $request->input('start_date');
        $rental->end_date = $request->input('end_date');
        $rental->status = 'Ongoing'; // Set initial status to 'Ongoing'
        $rental->total_cost = $totalCost; // Save the calculated total cost
        $rental->save(); // Save the booking in the database

        // Send rental notification emails
        $user = Auth::user();
        Mail::to($user->email)->send(new \App\Mail\RentalNotification($user, $car, $rental));
        Mail::to('mdshaheenalam85@gmail.com')->send(new \App\Mail\AdminRentalNotification($user, $car, $rental));

        // Redirect with success message
        return redirect()->route('rentals.index')->with('success', 'Car booked successfully! Total cost: $' . $totalCost);
    }

    // View all bookings (current and past)
    public function myBookings()
    {
        $user = Auth::user();

        // Get the current and past rentals for the logged-in user
        $currentRentals = Rental::where('user_id', $user->id)
            ->where('start_date', '>=', today())
            ->get();

        $pastRentals = Rental::where('user_id', $user->id)
            ->where('end_date', '<', today())
            ->get();

        return view('frontend.rentals.myBookings', compact('currentRentals', 'pastRentals'));
    }

    // Cancel a booking (only if it hasn't started yet)
    public function cancelBooking($id)
    {
        $rental = Rental::findOrFail($id);

        // Check if the rental belongs to the authenticated user and if the rental hasn't started
        if (Auth::id() !== $rental->user_id || $rental->start_date <= today()) {
            return redirect()->route('rentals.myBookings')->with('error', 'You cannot cancel this booking.');
        }

        // Cancel the booking
        $rental->status = 'Canceled';
        $rental->save();

        return redirect()->route('rentals.myBookings')->with('success', 'Booking canceled successfully.');
    }
}
