@extends('layouts.base')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Data Barber</h5>
                        <a href="{{ url('barber/create') }}" class="btn btn-outline-primary">
                            Tambah Data
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="dt-responsive table-responsive">
                        <table id="order-table" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barber</th>
                                    <th>Foto Barber</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($barber as $b)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $b->nama_barber }}</td>
                                        <td>
                                            @if ($b->gambar_barber)
                                            <a href="{{ asset('storage/' . $b->gambar_barber) }}">
                                                <img src="{{ asset('storage/' . $b->gambar_barber) }}" alt="Foto Barber"
                                                    width="50" class="rounded">
                                            </a>
                                            @else
                                                <p class="text-muted">Tidak ada foto tersedia.</p>
                                            @endif
                                        </td>
                                        <td>
                                            <!-- Tombol Edit -->
                                            <a href="{{ route('barber.edit', $b->id) }}" class="btn btn-warning btn-sm">
                                                Edit
                                            </a>

                                            <!-- Tombol Hapus -->
                                            <form action="{{ route('barber.destroy', $b->id) }}" method="POST"
                                                style="display:inline-block;"
                                                onsubmit="return confirm('Yakin ingin menghapus barber ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Data barber belum ada</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
