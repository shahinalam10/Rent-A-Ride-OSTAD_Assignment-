<?php

use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\CarController as FrontendCarController;
use App\Http\Controllers\Frontend\RentalController;
use App\Http\Controllers\Admin\CarController as AdminCarController;
use App\Http\Controllers\Admin\RentalController as AdminRentalController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

// Public route
Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

Route::get('/rentals', [FrontendCarController::class, 'index'])->name('rentals.index');
Route::get('/rentals/car-details/{id}', [FrontendCarController::class, 'show'])->name('rentals.show');

// User Dashboard Route (for general users, not admins)
Route::get('/dashboard', function () {
    return redirect()->route('rentals.myBookings'); // Redirect to /my-bookings route
})->middleware(['auth', 'verified', 'is_user'])->name('dashboard');

// Middleware for authenticated users (general users)
Route::middleware('auth')->group(function () {
    // Rental Booking Route (for users, not admins)
    Route::post('/rentals/{id}/book', [RentalController::class, 'book'])->name('rentals.book');
    
    // Route for viewing user bookings
    Route::get('/my-bookings', [RentalController::class, 'myBookings'])->name('rentals.myBookings');


    // Route for canceling a booking
    Route::post('/rentals/{id}/cancel', [RentalController::class, 'cancelBooking'])->name('rentals.cancel');


    // Profile routes for authenticated users
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Middleware (Admin Dashboard Route)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('cars', [AdminCarController::class, 'index'])->name('admin.cars.index');
    Route::get('cars/create', [AdminCarController::class, 'create'])->name('admin.cars.create');
    Route::post('cars', [AdminCarController::class, 'store'])->name('admin.cars.store');
    Route::get('cars/{id}/edit', [AdminCarController::class, 'edit'])->name('admin.cars.edit');
    Route::put('cars/{id}', [AdminCarController::class, 'update'])->name('admin.cars.update');
    Route::delete('cars/{id}', [AdminCarController::class, 'destroy'])->name('admin.cars.destroy');

    // Rental management routes
    Route::get('/admin/rentals', [AdminRentalController::class, 'index'])->name('admin.rentals.index');
    Route::get('/admin/rentals/create', [AdminRentalController::class, 'create'])->name('admin.rentals.create');
    Route::post('/admin/rentals', [AdminRentalController::class, 'store'])->name('admin.rentals.store');
    Route::get('/admin/rentals/{id}/edit', [AdminRentalController::class, 'edit'])->name('admin.rentals.edit');
    Route::put('/admin/rentals/{id}', [AdminRentalController::class, 'update'])->name('admin.rentals.update');
    Route::delete('/admin/rentals/{id}', [AdminRentalController::class, 'destroy'])->name('admin.rentals.destroy');
    Route::put('/admin/rentals/{id}/status', [AdminRentalController::class, 'updateStatus'])->name('admin.rentals.updateStatus');

     // Customer management routes
     Route::get('/admin/customers', [CustomerController::class, 'index'])->name('admin.customers.index');
     Route::get('/admin/customers/create', [CustomerController::class, 'create'])->name('admin.customers.create');
     Route::post('/admin/customers', [CustomerController::class, 'store'])->name('admin.customers.store');
     Route::get('/admin/customers/{id}/edit', [CustomerController::class, 'edit'])->name('admin.customers.edit');
     Route::put('/admin/customers/{id}', [CustomerController::class, 'update'])->name('admin.customers.update');
     Route::delete('/admin/customers/{id}', [CustomerController::class, 'destroy'])->name('admin.customers.destroy');
});

// Email Test Route
Route::get('/test-email', function () {
    Mail::raw('This is a test email from your Laravel app!', function ($message) {
        $message->to('recipient_email@gmail.com') // Change to your recipient email
                ->subject('Test Email');
    });
    return 'Email sent!';
});

// Auth routes
require __DIR__.'/auth.php';
