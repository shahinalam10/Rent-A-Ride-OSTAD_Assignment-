@extends('admin.layouts.master')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Edit Rental</h1>

        <div class="card shadow-sm border rounded p-4">
            <form action="{{ route('admin.rentals.update', $rental->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user_id">Customer</label>
                            <select name="user_id" id="user_id" class="form-control" required>
                                <option value="" disabled>Select a customer</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ $rental->user_id == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="car_id">Car</label>
                            <select name="car_id" id="car_id" class="form-control" required>
                                <option value="" disabled>Select a car</option>
                                @foreach ($cars as $car)
                                    <option value="{{ $car->id }}" {{ $rental->car_id == $car->id ? 'selected' : '' }}>
                                        {{ $car->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="start_date">Start Date</label>
                            <input type="date" name="start_date" class="form-control" value="{{ $rental->start_date }}" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="end_date">End Date</label>
                            <input type="date" name="end_date" class="form-control" value="{{ $rental->end_date }}" required>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="Ongoing" {{ $rental->status == 'Ongoing' ? 'selected' : '' }}>Ongoing</option>
                        <option value="Completed" {{ $rental->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                        <option value="Canceled" {{ $rental->status == 'Canceled' ? 'selected' : '' }}>Canceled</option>
                    </select>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Update Rental</button>
                </div>
            </form>
        </div>
    </div>
@endsection
