<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car; // Assuming you have a Car model

class PageController extends Controller
{
    public function index()
    {
        $cars = Car::all(); // You can add more filtering logic if needed
        
        // Pass the cars data to the view
        return view('frontend.home.home', compact('cars'));
    }
    public function about()
    {
        return view('frontend.about.about');
    }
    public function contact()
    {
        return view('frontend.contact.contact');
    }
}
