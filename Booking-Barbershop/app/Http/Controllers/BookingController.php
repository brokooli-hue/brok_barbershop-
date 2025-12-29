<?php

namespace App\Http\Controllers;

use App\Models\Barber;
use App\Models\Booking;
use App\Models\Layanan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        $layanan = Layanan::all();
        $barber  = Barber::all();
        $booking = Booking::all();
        return view('booking.index', compact('layanan', 'barber', 'booking'));
    }
    public function create()
    {
        $layanan = Layanan::all();
        $barber = Barber::all();
        $users = User::all();
        return view('booking.create', compact('layanan', 'barber', 'users'));
    }

    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        $layanan = Layanan::all();
        $barber = Barber::all();
        return view('booking.edit', compact('booking', 'layanan', 'barber'));
    }

public function store(Request $request)
{
    $request->validate([
        'layanan_id' => 'required',
        'barber_id' => 'required',
        'no_hp' => 'required',
        'tanggal_booking' => 'required',
        'jam_booking' => 'required',
    ], [
        'layanan_id.required' => 'Pilih layanan',
        'barber_id.required' => 'Pilih barber',
        'no_hp.required' => 'Isi nomor HP',
        'tanggal_booking.required' => 'Isi tanggal booking',
        'jam_booking.required' => 'Isi jam booking',
    ]);

    $booking = new Booking();
    if(Auth::user()->role == 'admin'){
        $booking->user_id = $request->user_id;
    } else {
        $booking->user_id = Auth::user()->id;
    }
    $booking->layanan_id = $request->layanan_id;
    $booking->barber_id = $request->barber_id;
    $booking->no_hp = $request->no_hp;
    $booking->tanggal_booking = $request->tanggal_booking;
    $booking->jam_booking = $request->jam_booking;
    $booking->save();

    if(Auth::user()->role != 'admin'){
        return redirect()->route('home')
            ->with('success', 'Booking berhasil ditambahkan');
    }
    return redirect()->route('booking.index')
        ->with('success', 'Booking berhasil ditambahkan');
}


public function update(Request $request, $id)
{
    $request->validate([
        'user_id' => 'required',
        'layanan_id' => 'required',
        'barber_id' => 'required',
        'no_hp' => 'required',
        'tanggal_booking' => 'required',
        'jam_booking' => 'required',
    ]);

    $booking = Booking::findOrFail($id);
    $booking->user_id = $request->user_id;
    $booking->layanan_id = $request->layanan_id;
    $booking->barber_id = $request->barber_id;
    $booking->no_hp = $request->no_hp;
    $booking->tanggal_booking = $request->tanggal_booking;
    $booking->jam_booking = $request->jam_booking;
    $booking->update();

    return redirect()->route('booking.index');
}

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
        return redirect()->route('booking.index');
    }
    public function updateStatus($id, Request $request)
    {
        $booking = Booking::findOrFail($id);
        $booking->status_booking = $request->status_booking;
        $booking->update();
        return redirect()->route('booking.index');
    }

    public function myBookings()
    {
        $userId = Auth::user()->id;
        $bookings = Booking::where('user_id', $userId)->get();
        return view('user.myBooking', compact('bookings'));
    }
}
