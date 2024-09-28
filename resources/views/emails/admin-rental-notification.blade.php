<h2>Car Rental Notification</h2>
<p>Dear Admin,</p>
<p>The following car has been rented by a customer:</p>
<ul>
    <li><strong>Customer Name:</strong> {{ $user->name }}</li>
    <li><strong>Customer Email:</strong> {{ $user->email }}</li>
    <li><strong>Car:</strong> {{ $car->name }}</li>
    <li><strong>Start Date:</strong> {{ $rental->start_date }}</li>
    <li><strong>End Date:</strong> {{ $rental->end_date }}</li>
    <li><strong>Status:</strong> {{ $rental->status }}</li>
</ul>
