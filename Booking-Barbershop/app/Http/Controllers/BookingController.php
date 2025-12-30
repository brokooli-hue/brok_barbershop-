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
            'no_hp' => 'required|max:13|min:10',
            'tanggal_booking' => 'required|date|after_or_equal:today',
            'jam_booking' => 'required',
        ], [
            'layanan_id.required' => 'Pilih layanan',
            'barber_id.required' => 'Pilih barber',
            'no_hp.max' => 'no hp maksimal 13 karakter.',
            'no_hp.min' => 'no hp minimal 10 karakter.',
            'tanggal_booking.date' => 'Tanggal tidak valid.',
            'tanggal_booking.after_or_equal' => 'Tanggal tidak boleh sebelum hari ini.',
            'jam_booking.required' => 'Isi jam booking',
        ]);

        $booking = new Booking();
        if (Auth::user()->role == 'admin') {
            $booking->user_id = $request->user_id;
        } else {
            $booking->user_id = Auth::user()->id;
        }
        $booking->no_booking = 'BK' . str_pad(Booking::max('id') + 1, 5, '0', STR_PAD_LEFT);
        $booking->layanan_id = $request->layanan_id;
        $booking->barber_id = $request->barber_id;
        $booking->no_hp = $request->no_hp;
        $booking->tanggal_booking = $request->tanggal_booking;
        $booking->jam_booking = $request->jam_booking;
        if ($request->barber_id) {
            if ($booking->barber->kuota > 0) {

                $booking->barber->decrement('kuota');
            } else {
                return redirect()->route('booking.create')->with('error', 'Kuota barber penuh, silakan pilih barber lain atau tanggal lain.');
            }
        }
        $booking->save();

        if (Auth::user()->role != 'admin') {
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
        if (Auth::user()->role != 'admin') {
            return redirect()->route('booking.my_bookings');
        }
        return redirect()->route('booking.index');
    }

    public function myBookings()
    {
        $userId = Auth::user()->id;
        $bookings = Booking::where('user_id', $userId)
            ->where('is_hidden_by_user', false)
            ->get();
        return view('user.myBooking', compact('bookings'));
    }

    public function destroyItems($id)
    {

        $booking = Auth::user()->bookings()->find($id);
        if (in_array($booking->status_booking, ['menunggu', 'konfirmasi'])) {
            return redirect()
                ->route('booking.my_bookings')
                ->with('error', 'Tidak dapat menghapus booking yang sedang menunggu atau dikonfirmasi.');
        }

        $booking->update([
            'is_hidden_by_user' => true,
        ]);

        return redirect()
            ->route('booking.my_bookings')
            ->with('success', 'Booking berhasil dihapus dari daftar Anda.');
    }

    public function cancelBooking($id, Request $request) {
        $booking = Auth::user()->bookings()->find($id);
        if (!$booking) {
            return redirect()
                ->route('booking.my_bookings')
                ->with('error', 'Booking tidak ditemukan.');
        }

        if (!in_array($booking->status_booking, ['menunggu', 'konfirmasi'])) {
            return redirect()
                ->route('booking.my_bookings')
                ->with('error', 'Hanya booking dengan status menunggu atau konfirmasi yang dapat dibatalkan.');
        }

        $booking->status_booking = $request->status_booking;
        $booking->save();

        // Kembalikan kuota barber
        $barber = $booking->barber;
        if ($barber) {
            $barber->increment('kuota');
        }

        return redirect()
            ->route('booking.my_bookings')
            ->with('success', 'Booking berhasil dibatalkan.');
    }
}
