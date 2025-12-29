<?php

namespace App\Http\Controllers;

use App\Models\Barber;
use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $layanan  = Layanan::all();
        $barber = Barber::all();
        return view('layanan.index', compact('layanan', 'barber'));
    }
    public function create()
    {
        $barber = Barber::all();
        return view('layanan.create', compact('barber'));
    }
    public function edit($id)
    {
        $layanan = Layanan::findOrFail($id);
        $barber = Barber::all();
        return view('layanan.edit', compact('layanan', 'barber'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_layanan' => 'required',
            'barber_id' => 'required',
            'harga' => 'required',
        ], [
            'nama_layanan.required' => 'Pilih layanan yang tersedia',
            'barber_id.required' => 'Isi nama barber',
            'harga.required' => 'Isi Harga'
        ]);
        $layanan = new Layanan();
        $layanan->nama_layanan = $request->nama_layanan;
        $layanan->barber_id = $request->barber_id;
        $layanan->harga = $request->harga;
        $layanan->save();
        return redirect()->route('layanan.index');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_layanan' => 'required',
            'barber_id' => 'required',
            'harga' => 'required',
        ], [
            'nama_layanan.required' => 'Pilih layanan yang tersedia',
            'barber_id.required' => 'Isi nama barber',
            'harga.required' => 'Isi Harga'
        ]);
        $layanan =Layanan::findOrFail($id);
        $layanan->nama_layanan = $request->nama_layanan;
        $layanan->barber_id = $request->barber_id;
        $layanan->harga = $request->harga;
        $layanan->update();
        return redirect()->route('layanan.index');
    }
    public function destroy($id)
    {
        $layanan = Layanan::findOrFail($id);
        $layanan->delete();
        return redirect()->route('layanan.index');
    }
}
