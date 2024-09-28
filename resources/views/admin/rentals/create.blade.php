@extends('admin.layouts.master')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Add Rental</h1>

        <div class="card shadow-sm border rounded p-4">
            <form action="{{ route('admin.rentals.store') }}" method="POST">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user_id">Select User</label>
                            <select name="user_id" class="form-control" required>
                                <option value="" disabled selected>Choose a user</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="car_id">Select Car</label>
                            <select name="car_id" class="form-control" required>
                                <option value="" disabled selected>Select a car</option>
                                @foreach ($cars as $car)
                                    <option value="{{ $car->id }}">{{ $car->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="start_date">Start Date</label>
                            <input type="date" name="start_date" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="end_date">End Date</label>
                            <input type="date" name="end_date" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Create Rental</button>
                </div>
            </form>
        </div>
    </div>
@endsection
