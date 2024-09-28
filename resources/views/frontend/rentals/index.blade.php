@extends('frontend.master') 

@section('title', 'Car Rentals') 
@section('content')
    <section class=" bg-light">
        <div class="container my-5"> <!-- Add bg-light class for off-white background -->
            <div id="customAlert" class="d-none"></div>
            <h1 class="text-center mb-4">Find Your Perfect Rental Car</h1>
    
            <!-- Filter Form Section -->
            <div class="card mb-4 shadow-sm">
                <div class="card-body p-3"> <!-- Adjust padding here -->
                    <form action="{{ route('rentals.index') }}" method="GET">
                        <div class="row g-2"> <!-- Use g-2 to reduce gap between columns -->
                            <div class="col-md-4">
                                <label for="type" class="form-label">Car Type</label>
                                <select name="type" id="type" class="form-select">
                                    <option value="">Select Car Type</option>
                                    <option value="SUV" {{ request('type') == 'SUV' ? 'selected' : '' }}>SUV</option>
                                    <option value="Sedan" {{ request('type') == 'Sedan' ? 'selected' : '' }}>Sedan</option>
                                    <option value="Hatchback" {{ request('type') == 'Hatchback' ? 'selected' : '' }}>Hatchback</option>
                                </select>
                            </div>
                
                            <div class="col-md-4">
                                <label for="brand" class="form-label">Brand</label>
                                <select name="brand" id="brand" class="form-select">
                                    <option value="">Select Brand</option>
                                    <option value="Toyota" {{ request('brand') == 'Toyota' ? 'selected' : '' }}>Toyota</option>
                                    <option value="Honda" {{ request('brand') == 'Honda' ? 'selected' : '' }}>Honda</option>
                                    <option value="BMW" {{ request('brand') == 'BMW' ? 'selected' : '' }}>BMW</option>
                                </select>
                            </div>
                
                            <div class="col-md-4">
                                <label for="max_price" class="form-label">Max Daily Rent Price</label>
                                <input type="number" name="max_price" id="max_price" class="form-control" placeholder="Enter max price" value="{{ request('max_price') }}">
                            </div>
                        </div>
                
                        <div class="text-end mt-2">
                            <button type="submit" class="btn btn-primary">Filter</button>
                            <a href="{{ route('rentals.index') }}" class="btn btn-secondary">Clear Filters</a>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="row">
                @foreach($cars as $car)
                    @php
                        $conflictingRentals = \App\Models\Rental::where('car_id', $car->id)
                        ->where('end_date', '>=', today()) // Check for future rentals
                        ->exists();
                    @endphp
            
                    <div class="col-lg-3 col-md-6 mb-4"> <!-- 4 cards per row -->
                        <div class="card h-100 shadow border-0 rounded" style="border: 1px solid #e0e0e0;">
                            <img src="{{ asset('images/cars/' . $car->image) }}" alt="{{ $car->name }}" class="card-img-top" style="height: 180px; object-fit: cover; border-radius: 0.25rem 0.25rem 0 0;">
                            
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title text-center text-dark" style="font-weight: 600;">{{ $car->name }}</h5>
                                <div class="flex-grow-1">
                                    <p class="card-text mb-2"><strong>Brand:</strong> <span class="text-muted">{{ $car->brand }}</span></p>
                                    <p class="card-text mb-2"><strong>Type:</strong> <span class="text-muted">{{ $car->car_type }}</span></p>
                                    <p class="card-text mb-2"><strong>Price:</strong> <span class="text-success">{{ number_format($car->daily_rent_price, 2) }}<i class="fa-solid fa-bangladeshi-taka-sign"></i>/day</span></p>
                                </div>
            
                                <div class="text-center mt-3">
                                    @if($conflictingRentals)
                                        <span class="badge bg-danger">Unavailable</span>
                                    @else
                                        <a href="{{ route('rentals.show', $car->id) }}" class="btn btn-primary" style="background-color: #007bff; border-color: #007bff;">View Details</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            

        </div>
    </section>
@endsection

<style>
    .card-body {
    padding: 1rem; /* Less padding for the card body */
}

.form-label {
    font-weight: 600; /* Bold labels for better readability */
}

.btn-primary {
    background-color: #007bff; /* Primary color */
    border-color: #007bff; /* Primary color */
}

.btn-secondary {
    background-color: #6c757d; /* Secondary color */
    border-color: #6c757d; /* Secondary color */
}

.text-end .btn {
    margin-left: 10px; /* Spacing between buttons */
}

    .alert-container {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background-color: rgba(0, 0, 0, 0.5); /* Dim background */
        z-index: 9999;
    }

    .alert-box {
        background-color: white;
        border-radius: 15px;
        padding: 40px;
        width: 300px;
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .icon-box {
        font-size: 80px;
        color: #28a745; /* Green color for success */
    }

    .alert-box p {
        font-size: 18px;
        color: #333;
        margin: 0;
        padding-top: 10px;
    }

    /* Animation for smooth appearance and disappearance */
    .alert-box {
        animation: fadeIn 0.5s ease-out, fadeOut 0.5s ease-in 4.5s;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes fadeOut {
        from { opacity: 1; }
        to { opacity: 0; }
    }
</style>

<script>
    // Function to display a custom success alert
    function showSuccessAlert(message) {
        const alertBox = document.getElementById('customAlert');

        // Create the alert content with message and a large checkmark icon
        alertBox.innerHTML = `
            <div class="alert-container d-flex align-items-center justify-content-center">
                <div class="alert-box text-center">
                    <div class="icon-box">
                        <i class="bi bi-check-circle-fill"></i>
                    </div>
                    <p class="mt-3">${message}</p>
                </div>
            </div>
        `;

        // Display the alert in the center of the page
        alertBox.classList.remove('d-none');
        alertBox.classList.add('d-block');

        // Auto-dismiss the alert after 5 seconds
        setTimeout(() => {
            closeAlert();
        }, 5000);
    }

    // Function to close the alert
    function closeAlert() {
        const alertBox = document.getElementById('customAlert');
        alertBox.classList.remove('d-block');
        alertBox.classList.add('d-none');
    }

    // Trigger the success alert after booking a car (if a success message exists)
    @if(session('success'))
        window.onload = function() {
            showSuccessAlert("{{ session('success') }}");
        };
    @endif
</script>
