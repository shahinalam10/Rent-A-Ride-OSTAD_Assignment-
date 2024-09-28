<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Rental;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Fetch the total number of cars
        $totalCars = Car::count();

        // Fetch the IDs of cars that are currently rented
        $rentedCarIds = Rental::pluck('car_id')->unique();
    
        // Count available cars excluding rented cars
        $availableCars = Car::where('availability', true)
                            ->whereNotIn('id', $rentedCarIds)
                            ->count();
    
        // Fetch the total number of rentals
        $totalRentals = Rental::count();
        // Calculate total earnings (assuming the 'price' field is in the 'rentals' table)
        $totalEarnings = Rental::sum('price');

        // Pass the data to the view
        return view('admin.dashboard', compact('totalCars', 'availableCars', 'totalRentals', 'totalEarnings'));
    }
}
