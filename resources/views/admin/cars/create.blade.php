@extends('admin.layouts.master')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Add New Car</h1>

        <div class="card shadow-sm border rounded p-4">
            <form action="{{ route('admin.cars.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name">Car Name</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="brand">Brand</label>
                        <input type="text" id="brand" name="brand" class="form-control" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="model">Model</label>
                        <input type="text" id="model" name="model" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="year">Year</label>
                        <input type="number" id="year" name="year" class="form-control" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="car_type">Car Type</label>
                        <input type="text" id="car_type" name="car_type" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="daily_rent_price">Daily Rent Price</label>
                        <input type="text" id="daily_rent_price" name="daily_rent_price" class="form-control" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="availability">Availability</label>
                        <select id="availability" name="availability" class="form-control" required>
                            <option value="1">Available</option>
                            <option value="0">Not Available</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="image">Car Image</label>
                        <input type="file" id="image" name="image" class="form-control">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
