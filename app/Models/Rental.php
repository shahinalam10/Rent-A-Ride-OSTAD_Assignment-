<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    // The attributes that are mass assignable
    protected $fillable = [
        'user_id', 
        'car_id', 
        'start_date', 
        'end_date', 
        'status'
    ];

    // Define the relationship to the User (renter)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship to the Car
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
