@extends('layouts.base')
@section('content')
    <div class="d-flex row justify-content-center">
        <div class="col-md-6 ">
            <div class="card">
                <div class="card-header">
                    <h5>Input Layanan</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('layanan.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group">
                                <label class="form-label" for="nama_layanan">Pilih Layanan</label>
                                <select name="nama_layanan" id="nama_layanan" class="form-select" id="inputGroupSelect02">
                                    <option disabled selected>Pilih</option>
                                    <option value="cukur rambut">Cukur Rambut</option>
                                    <option value="cuci rambut">Cuci Rambut</option>
                                    <option value="coloring rambut">Coloring Rambut</option>
                                    <option value="bleaching rambut">Bleaching Rambut</option>
                                    <option value="potong jenggot">Potong Jenggot</option>
                                    <option value="corn rambut">Corn Rambut</option>
                                    <option value="styling rambut">Styling Rambut</option>
                                    <option value="desain rambut">Desain Rambut</option>
                                    <option value="massage">Massage</option>
                                </select>
                            </div>
                            {{-- <div class="form-group">
                                <label class="form-label" for="barber_id">Barber</label>
                                <select name="barber_id" id="barber_id" class="form-select" id="inputGroupSelect02">
                                    <option disabled selected>Pilih</option>
                                    @foreach ($barber as $item)
                                        <option value="{{ $item->id }}">
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
                                    placeholder="Masukkan Harga" autocomplete="off" value="{{ old('harga') }}">
                                @error('harga')
                                    <small class="text-danger mt-2">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mb-4">Tambah</button>
                        <a href="{{ url('layanan') }}" class="btn btn-secondary mb-4">Kembali</a>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
