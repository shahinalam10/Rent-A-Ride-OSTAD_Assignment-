@extends('admin.layouts.master')

@section('content')
    <div class="container mt-4 shadow-sm border rounded p-4 bg-white">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Create New Customer</h1>
        </div>

        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.customers.store') }}" method="POST">
            @csrf
            <div class="row">
                <!-- Customer Name -->
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter customer's name" value="{{ old('name') }}" required>
                </div>

                <!-- Customer Email -->
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter customer's email" value="{{ old('email') }}" required>
                </div>
            </div>

            <div class="row">
                <!-- Phone Number -->
                <div class="col-md-6 mb-3">
                    <label for="phone_number" class="form-label">Phone Number</label>
                    <input type="text" name="phone_number" id="phone_number" class="form-control" placeholder="Enter phone number" value="{{ old('phone_number') }}" required>
                </div>

                <!-- Address -->
                <div class="col-md-6 mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" name="address" id="address" class="form-control" placeholder="Enter address" value="{{ old('address') }}" required>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Create Customer</button>
            </div>
        </form>
    </div>
@endsection
