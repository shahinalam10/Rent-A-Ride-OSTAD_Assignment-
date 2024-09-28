<h1>Rental Confirmation</h1>
<p>Dear {{ $user->name }},</p>
<p>Thank you for booking a car with us. Here are your rental details:</p>
<ul>
    <li><strong>Car:</strong> {{ $car->name }}</li>
    <li><strong>Start Date:</strong> {{ $rental->start_date }}</li>
    <li><strong>End Date:</strong> {{ $rental->end_date }}</li>
</ul>
<p>We hope you enjoy your ride!</p>
