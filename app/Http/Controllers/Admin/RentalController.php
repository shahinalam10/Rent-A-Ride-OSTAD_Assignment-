<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rental;
use App\Models\User;
use App\Models\Car;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function index() {
        // Fetch only rentals for users (non-admin)
        $rentals = Rental::whereHas('user', function($query) {
            $query->where('usertype', 'user');
        })->get();

        return view('admin.rentals.index', compact('rentals'));
    }

    public function create() {
        $users = User::where('usertype', 'user')->get();
        $cars = Car::where('availability', true)->get(); // Fetch available cars
        return view('admin.rentals.create', compact('users', 'cars'));
    }

    public function store(Request $request) {
        $request->validate([
            'user_id' => 'required|exists:users,id', // Ensure the user exists
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        Rental::create($request->all());

        return redirect()->route('admin.rentals.index')->with('success', 'Rental created successfully');
    }

    public function edit($id)
    {
        $rental = Rental::findOrFail($id);
        $users = User::all(); // You can filter users if necessary
        $cars = Car::where('availability', true)->get(); // Fetch available cars
        return view('admin.rentals.edit', compact('rental', 'users', 'cars'));
    }

    public function update(Request $request, $id)
    {
    // Validate the incoming request, including the status field
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'car_id' => 'required|exists:cars,id',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'status' => 'required|in:Ongoing,Completed,Canceled', // Add status validation
    ]);

    // Find the rental by ID
    $rental = Rental::findOrFail($id);

    // Update the rental details
    $rental->user_id = $request->input('user_id');
    $rental->car_id = $request->input('car_id');
    $rental->start_date = $request->input('start_date');
    $rental->end_date = $request->input('end_date');
    $rental->status = $request->input('status'); // Update status

    // Save the updated rental
    $rental->save();

    // Redirect back with a success message
    return redirect()->route('admin.rentals.index')->with('success', 'Rental updated successfully.');
    }


    public function destroy($id) {
        Rental::destroy($id);
        return redirect()->route('admin.rentals.index')->with('success', 'Rental deleted successfully');
    }
}
