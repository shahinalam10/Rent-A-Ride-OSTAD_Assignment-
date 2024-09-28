@extends('frontend.master')

@section('content')
<section class="bg-light py-5">
    <div class="container">
        <div class="row">
            <!-- Car Image Section -->
            <div class="col-md-6 mb-4">
                <img src="{{ asset('images/cars/' . $car->image) }}" class="img-fluid rounded" alt="Image of {{ $car->name }}">
            </div>

            <!-- Car Details Section -->
            <div class="col-md-6">
                <h2 class="mb-3">{{ $car->name }}</h2>
                <ul class="list-unstyled mb-4">
                    <li><strong>Brand:</strong> {{ $car->brand }}</li>
                    <li><strong>Model:</strong> {{ $car->model }}</li>
                    <li><strong>Type:</strong> {{ $car->car_type }}</li>
                    <li><strong>Year:</strong> {{ $car->year }}</li>
                    <li><strong>Daily Rent Price:</strong>{{ number_format($car->daily_rent_price, 2) }}<i class="fa-solid fa-bangladeshi-taka-sign"></i></li>
                </ul>

                <!-- Availability Status -->
                <div class="mt-3">
                    <span class="badge {{ $car->availability ? 'bg-success' : 'bg-danger' }} p-2">
                        {{ $car->availability ? 'Available' : 'Not Available' }}
                    </span>
                </div>

                <!-- Booking Form (Visible Only if Car is Available) -->
                @if($car->availability)
                    <form action="{{ route('rentals.book', $car->id) }}" method="POST" class="mt-4" id="bookingForm">
                        @csrf

                        <!-- Validation Errors -->
                        @if($errors->any())
                            <div class="alert alert-danger mb-3">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Rental Start Date -->
                        <div class="mb-3">
                            <label for="start_date" class="form-label">Rental Start Date</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" required>
                        </div>

                        <!-- Rental End Date -->
                        <div class="mb-3">
                            <label for="end_date" class="form-label">Rental End Date</label>
                            <input type="date" class="form-control" id="end_date" name="end_date" required>
                        </div>

                        <!-- Total Cost Display -->
                        <div class="mb-3">
                            <label for="total_cost" class="form-label">Total Cost</label>
                            <input type="text" class="form-control" id="total_cost" name="total_cost" readonly>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary w-100">Book Now</button>
                    </form>
                @else
                    <div class="mt-4">
                        <a href="{{ route('login', ['redirect_to' => request()->url()]) }}" class="btn btn-primary">Log in to Book</a>
                    </div>
                @endif

                <!-- Unavailability Message -->
                @if(!$car->availability)
                    <div class="alert alert-warning mt-4">
                        This car is currently unavailable for booking.
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const startDateInput = document.getElementById('start_date');
        const endDateInput = document.getElementById('end_date');
        const totalCostInput = document.getElementById('total_cost');
        const dailyRentPrice = {{ $car->daily_rent_price }}; // Car's daily rent price

        function calculateTotalCost() {
            const startDate = new Date(startDateInput.value);
            const endDate = new Date(endDateInput.value);

            if (startDate && endDate && startDate <= endDate) {
                const timeDifference = endDate - startDate;
                const rentalDays = Math.ceil(timeDifference / (1000 * 3600 * 24)) + 1; // Including both start and end day
                const totalCost = rentalDays * dailyRentPrice;
                totalCostInput.value = '' + totalCost.toFixed(2);
            } else {
                totalCostInput.value = '';
            }
        }

        // Calculate total cost when either date changes
        startDateInput.addEventListener('change', calculateTotalCost);
        endDateInput.addEventListener('change', calculateTotalCost);
    });
</script>
@endsection
