@extends('admin.layouts.master')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Manage Rentals</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow-sm border rounded p-4">
            <div class="d-flex justify-content-between mb-3">
                <h5 class="card-title">Rental Records</h5>
                <a href="{{ route('admin.rentals.create') }}" class="btn btn-primary">Add Rental</a>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Rental ID</th>
                            <th>Customer Name</th>
                            <th>Car Details</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rentals as $rental)
                            <tr>
                                <td>{{ $rental->id }}</td>
                                <td>{{ $rental->user->name }}</td>
                                <td>{{ $rental->car->name }}</td>
                                <td>{{ $rental->start_date }}</td>
                                <td>{{ $rental->end_date }}</td>
                                <td>
                                    @if ($rental->status === 'active')
                                        <span class="badge bg-success">Active</span>
                                    @elseif ($rental->status === 'completed')
                                        <span class="badge bg-info">Completed</span>
                                    @else
                                        <span class="badge bg-secondary">{{ ucfirst($rental->status) }}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.rentals.edit', $rental->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.rentals.destroy', $rental->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
