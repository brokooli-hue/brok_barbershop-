@extends('layouts.base')
@section('content')
    <div class="d-flex row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>Input Booking</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('booking.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <!-- Pilih Customer -->
                            <div class="form-group mt-2">
                                <label class="form-label" for="user_id">Pilih Customer</label>
                                <select name="user_id" id="user_id" class="form-select">
                                    <option disabled selected>Pilih</option>
                                    @foreach ($users as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <!-- Pilih Layanan -->
                            <div class="form-group mt-2">
                                <label class="form-label" for="layanan_id">Pilih Layanan</label>
                                <select name="layanan_id" id="layanan_id" class="form-select">
                                    <option disabled selected>Pilih</option>
                                    @foreach ($layanan as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->nama_layanan }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('layanan_id')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Pilih Barber -->
                            <div class="form-group mt-2">
                                <label class="form-label" for="barber_id">Pilih Barber</label>
                                <select name="barber_id" id="barber_id" class="form-select">
                                    <option disabled selected>Pilih</option>
                                    @foreach ($barber as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->nama_barber }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('barber_id')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="no_hp">No HP</label>
                                <input type="text" name="no_hp" id="no_hp" class="form-control"
                                    placeholder="Masukkan No HP" value="{{ old('no_hp') }}">
                                @error('no_hp')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <!-- Tanggal Booking -->
                            <div class="form-group mt-2">
                                <label class="form-label" for="tanggal_booking">Tanggal Booking</label>
                                <input type="date" name="tanggal_booking" id="tanggal_booking" class="form-control"
                                    value="{{ old('tanggal_booking') }}">
                                @error('tanggal_booking')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Jam Booking -->
                            <div class="form-group mt-2">
                                <label class="form-label" for="jam_booking">Jam Booking</label>
                                <select id="jam_booking" name="jam_booking" class="form-select">
                                    <option value="">-- Pilih Waktu --</option>
                                    <option value="09:00">09:00 WIB</option>
                                    <option value="10:00">10:00 WIB</option>
                                    <option value="11:00">11:00 WIB</option>
                                    <option value="12:00">12:00 WIB</option>
                                    <option value="13:00">13:00 WIB</option>
                                    <option value="14:00">14:00 WIB</option>
                                    <option value="15:00">15:00 WIB</option>
                                    <option value="16:00">16:00 WIB</option>
                                    <option value="17:00">17:00 WIB</option>
                                    <option value="18:00">18:00 WIB</option>
                                    <option value="19:00">19:00 WIB</option>
                                    <option value="20:00">20:00 WIB</option>
                                    <option value="21:00">21:00 WIB</option>
                                </select>
                                @error('jam_booking')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mb-4 mt-3">
                            Tambah
                        </button>
                        <a href="{{ url('booking') }}" class="btn btn-secondary mb-4 mt-3">
                            Kembali
                        </a>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
