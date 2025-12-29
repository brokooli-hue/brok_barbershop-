@extends('layouts.base')
@section('content')
    <div class="d-flex row justify-content-center">
        <div class="col-md-6 ">
            <div class="card">
                <div class="card-header">
                    <h5>Input Barber</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <form action="{{ route('barber.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="nama_barber">Nama </label>
                                <input type="text" class="form-control" id="nama_barber" name="nama_barber"
                                    placeholder="Masukkan nama" autocomplete="off" value="{{ old('nama_barber') }}">
                                @error('nama_barber')
                                    <small class="text-danger mt-2">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="gambar_barber" class="form-label">foto Barber</label>
                                <input type="file" name="gambar_barber" class="form-control" id="gambar_barber">
                                @error('gambar_barber')
                                    <small class="text-danger mt-2">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mb-4">Tambah</button>
                            <a href="{{ url('barber') }}" class="btn btn-secondary mb-4">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
