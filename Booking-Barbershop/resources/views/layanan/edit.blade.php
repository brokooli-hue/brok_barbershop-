@extends('layouts.base')
@section('content')
    <div class="d-flex row justify-content-center">
        <div class="col-md-6 ">
            <div class="card">
                <div class="card-header">
                    <h5>Edit Layanan</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('layanan.update', $layanan->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="form-group">
                                <label class="form-label" for="nama_layanan">Pilih Layanan</label>
                                <select name="nama_layanan" id="nama_layanan" class="form-select" id="inputGroupSelect02">
                                    <option disabled selected>Pilih</option>
                                    <option value="cukur rambut"
                                        {{ old('nama_layanan', $layanan->nama_layanan) == 'cukur rambut' ? 'Selected' : '' }}>
                                        Cukur Rambut</option>
                                    <option
                                        value="cuci rambut"{{ old('nama_layanan', $layanan->nama_layanan) == 'cuci rambut' ? 'Selected' : '' }}>
                                        Cuci Rambut</option>
                                    <option
                                        value="styling rambut"{{ old('nama_layanan', $layanan->nama_layanan) == 'styling rambut' ? 'Selected' : '' }}>
                                        Styling Rambut</option>
                                </select>
                                @error('nama_layanan')
                                    <small class="text-danger mt-2">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            {{-- <div class="form-group">
                                <label class="form-label" for="barber_id">Barber</label>
                                <select name="barber_id" id="barber_id" class="form-select" id="inputGroupSelect02">
                                    <option disabled selected>Pilih</option>
                                    @foreach ($barber as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('barber_id', $layanan->barber_id) == $item->id ? 'Selected' : '' }}>
                                            {{ $item->nama_barber }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('barber_id')
                                    <small class="text-danger mt-2">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div> --}}
                            <div class="form-group">
                                <label class="form-label" for="harga">Harga </label>
                                <input type="text" class="form-control" id="harga" name="harga"
                                    placeholder="Masukkan Harga" autocomplete="off"
                                    value="{{ old('harga', $layanan->harga) }}">
                                @error('harga')
                                    <small class="text-danger mt-2">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mb-4">Edit</button>
                        <a href="{{ url('layanan') }}" class="btn btn-secondary mb-4">Kembali</a>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
