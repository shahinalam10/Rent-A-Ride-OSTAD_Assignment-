<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Models\Car;
use App\Models\Rental;

class RentalNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $car;
    public $rental;

    /**
     * Create a new message instance.
     */
    public function __construct(User $user, Car $car, Rental $rental)
    {
        $this->user = $user;
        $this->car = $car;
        $this->rental = $rental;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Rental Notification')
                    ->view('emails.rental_notification') // Make sure this matches the Blade file name
                    ->with([
                        'user' => $this->user,
                        'car' => $this->car,
                        'rental' => $this->rental,
                    ]);
    }
}
