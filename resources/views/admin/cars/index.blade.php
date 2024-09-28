@extends('admin.layouts.master')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Manage Cars</h1>

        <div class="mb-3">
            <a href="{{ route('admin.cars.create') }}" class="btn btn-primary">Add New Car</a>
        </div>

        @if($cars->count())
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Car Name</th>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>Year</th>
                        <th>Car Type</th>
                        <th>Daily Rent Price</th>
                        <th>Availability</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cars as $car)
                        <tr>
                            <td>{{ $car->name }}</td>
                            <td>{{ $car->brand }}</td>
                            <td>{{ $car->model }}</td>
                            <td>{{ $car->year }}</td>
                            <td>{{ $car->car_type }}</td>
                            <td>{{ number_format($car->daily_rent_price, 2) }} <i class="fa-solid fa-bangladeshi-taka-sign"></i></td>
                            <td>
                                <span class="badge-dark {{ $car->availability ? 'badge-success' : 'badge-danger' }}">
                                    {{ $car->availability ? 'Available' : 'Not Available' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.cars.edit', $car->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                <form action="{{ route('admin.cars.destroy', $car->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this car?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center">No cars available at the moment.</p>
        @endif
    </div>
@endsection
