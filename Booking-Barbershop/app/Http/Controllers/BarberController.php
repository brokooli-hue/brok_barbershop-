<?php

namespace App\Http\Controllers;

use App\Models\Barber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarberController extends Controller
{
    public function index()
    {
        $barber  = Barber::all();
        return view('barber.index', compact('barber'));
    }
    public function create()
    {
        return view('barber.create');
    }
    public function edit($id)
    {
        $barber = barber::findOrFail($id);
        return view('barber.edit', compact('barber'));
    }
    public function store(Request $request)
    {

        $request->validate([
            'nama_barber' => 'required',
            'gambar_barber' => 'required|image|mimes:jpg,jpeg,png'
        ]);

        $barber = new Barber();
        $barber->nama_barber = $request->nama_barber;
        $barber->kuota = 6; 
        $barber->kuota_reset = now('asia/makassar');

        if ($request->hasFile('gambar_barber')) {
            $path = $request->file('gambar_barber')->store('img', 'public');
            $barber->gambar_barber = $path;
        }

        $barber->save();
        return redirect()->route('barber.index');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barber' => 'required',
            'gambar_barber' => 'image|mimes:jpg,jpeg,png'
        ]);

        $barber = Barber::findOrFail($id);
        $barber->nama_barber = $request->nama_barber;

        if ($request->hasFile('gambar_barber')) {

            // hapus gambar lama
            if ($barber->gambar_barber && Storage::disk('public')->exists($barber->gambar_barber)) {
                Storage::disk('public')->delete($barber->gambar_barber);
            }

            // simpan gambar baru
            $path = $request->file('gambar_barber')->store('img', 'public');
            $barber->gambar_barber = $path;
        }

        $barber->save();
        return redirect()->route('barber.index');
    }

    public function destroy($id)
    {
        $barber = barber::findOrFail($id);
        $barber->delete();
        return redirect()->route('barber.index');
    }
}
