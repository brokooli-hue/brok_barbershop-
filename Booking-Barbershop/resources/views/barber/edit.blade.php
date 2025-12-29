@extends('layouts.base')
@section('content')
    <div class="d-flex row justify-content-center">
        <div class="col-md-6 ">
            <div class="card">
                <div class="card-header">
                    <h5>Edit Barber</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <form action="{{ route('barber.update', $barber->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="form-label" for="nama_barber">Nama </label>
                                <input type="text" class="form-control" id="nama_barber" name="nama_barber"
                                    placeholder="Masukkan nama" autocomplete="off"
                                    value="{{ old('nama_barber', $barber->nama_barber) }}">
                                @error('nama_barber')
                                    <small class="text-danger mt-2">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="mt-2">
                                @if ($barber->gambar_barber)
                                    <img src="{{ asset('storage/' . $barber->gambar_barber) }}" alt="Foto Barber"
                                        width="100" class="rounded">
                                @else
                                    <p class="text-muted">Tidak ada foto tersedia.</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="form-label">Foto Barber</label>
                                <input type="file" name="gambar_barber" class="form-control mt-2" id="gambar_barber">
                            </div>
                            <button type="submit" class="btn btn-primary mb-4">Edit</button>
                            <a href="{{ url('barber') }}" class="btn btn-secondary mb-4">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
