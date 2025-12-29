<?php

namespace App\Http\Controllers;

use App\Models\Barber;
use App\Models\Booking;
use App\Models\Layanan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function  home() {

        $barber = Barber::all();
        $layanan = Layanan::all();
        $booking = Booking::all();
        return view('user.home', compact('barber', 'layanan', 'booking'));
    }
}
