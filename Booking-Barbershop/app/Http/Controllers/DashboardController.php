<?php

namespace App\Http\Controllers;

use App\Models\Barber;
use App\Models\Booking;
use App\Models\Layanan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $barber = Barber::paginate(3);
        $layanan = Layanan::paginate(3);
        $bookings = Booking::all();
        $barbers = Barber::all();
        $layanans = Layanan::all();
        $booking = Booking::where('status_booking', '!=', 'selesai')
                    ->where('status_booking', '!=', 'batal')
                    ->paginate(3);

        return view('dashboard', compact('barber', 'layanan', 'booking', 'bookings', 'layanans', 'barbers'));
    }


}
