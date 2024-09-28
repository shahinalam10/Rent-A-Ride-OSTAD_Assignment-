@extends('frontend.master')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4 text-center">My Bookings</h1>

        {{-- Current Bookings Section --}}
        <h2 class="mb-4 text-primary">Current Bookings</h2>
        @if($currentRentals->isEmpty())
            <div class="alert alert-info text-center">No current bookings at the moment.</div>
        @else
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Car Name</th>
                            <th>Booking Period</th>
                            <th>Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($currentRentals as $rental)
                            <tr>
                                <td>{{ $rental->car->name }}</td>
                                <td>
                                    <strong>From:</strong> {{ $rental->start_date }} <br>
                                    <strong>To:</strong> {{ $rental->end_date }}
                                </td>
                                <td>
                                    <span class="badge 
                                        @if($rental->status == 'Booked') badge-success 
                                        @elseif($rental->status == 'Canceled') badge-danger 
                                        @else badge-secondary 
                                        @endif">
                                        {{ $rental->status }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    {{-- Allow cancellation if not canceled and booking hasn't started yet --}}
                                    @if($rental->status !== 'Canceled' && $rental->start_date > today())
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#cancelModal{{ $rental->id }}">
                                            Cancel Booking
                                        </button>

                                        <!-- Modal for cancel confirmation -->
                                        <div class="modal fade" id="cancelModal{{ $rental->id }}" tabindex="-1" role="dialog" aria-labelledby="cancelModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="cancelModalLabel">Cancel Booking</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to cancel the booking for <strong>{{ $rental->car->name }}</strong>?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <form action="{{ route('rentals.cancel', $rental->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger">Confirm Cancel</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <button class="btn btn-secondary btn-sm" disabled>Cannot Cancel</button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        {{-- Past Bookings Section --}}
        <h2 class="mt-5 mb-4 text-primary">Past Bookings</h2>
        @if($pastRentals->isEmpty())
            <div class="alert alert-info text-center">No past bookings to show.</div>
        @else
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Car Name</th>
                            <th>Booking Period</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-danger">
                        @foreach($pastRentals as $rental)
                            <tr>
                                <td>{{ $rental->car->name }}</td>
                                <td>
                                    <strong>From:</strong> {{ $rental->start_date }} <br>
                                    <strong>To:</strong> {{ $rental->end_date }}
                                </td>
                                <td>
                                    <span class="badge 
                                        @if($rental->status == 'Booked') badge-success
                                        @elseif($rental->status == 'Canceled') badge-danger
                                        @elseif($rental->status == 'Completed') badge-primary
                                        @else badge-secondary
                                        @endif">
                                        {{ $rental->status }}
                                    </span>
                                </td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    <!-- Include Bootstrap JS and dependencies if not already included -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
@endsection
