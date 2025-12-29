@extends('layouts.base')
@section('content')
    <div class="row">
        <!-- [ sample-page ] start -->
        <!-- Zero config table end -->
        <!-- Default ordering table start -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Data Booking</h5>
                        <a href="{{ url('booking/create') }}" class="btn btn-outline-primary">
                            Tambah Data
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="dt-responsive table-responsive">
                            <table id="order-table" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Layanan</th>
                                        <th>Barber</th>
                                        <th>E-mail</th>
                                        <th>No HP</th>
                                        <th>Tanggal</th>
                                        <th>Jam</th>
                                        <th>Status</th>
                                        <th>aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($booking as $b)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $b->user->name }}</td>
                                            <td>{{ $b->layanan->nama_layanan }}</td>
                                            <td>{{ $b->barber->nama_barber }}</td>
                                            <td>{{ $b->user->email }}</td>
                                            <td>{{ $b->no_hp }}</td>
                                            <td>{{ $b->tanggal_booking }}</td>
                                            <td>{{ $b->jam_booking }}</td>
                                            <td>{{ $b->status_booking }}</td>
                                            <td>
                                                <!-- Tombol Edit -->
                                                {{-- <a href="{{ route('booking.edit', $b->id) }}"
                                                    class="btn btn-warning btn-sm">
                                                    Edit
                                                </a> --}}

                                                <!-- Tombol Hapus -->

                                                @if ($b->status_booking == 'menunggu')
                                                    <div class="d-inline-flex gap-2">
                                                        <form action="{{ route('booking.update', $b->id) }}" method="POST"
                                                            style="display:inline-block;"
                                                            onsubmit="return confirm('Yakin ingin mengkonfirmasi booking ini?')">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="status_booking" value="konfirmasi">
                                                            <button type="submit" class="btn btn-success btn-sm">
                                                                Konfirmasi
                                                            </button>
                                                        </form>
                                                        <form action="{{ route('booking.update', $b->id) }} "
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="status_booking" value="batal">
                                                            <button type="submit" class="btn btn-danger btn-sm">
                                                                Batal
                                                            </button>
                                                        </form>
                                                    </div>
                                                @else
                                                    <form action="{{ route('booking.destroy', $b->id) }}" method="POST"
                                                        style="display:inline-block;"
                                                        onsubmit="return confirm('Yakin ingin menghapus barber ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            Hapus
                                                        </button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10" class="text-center">Data layanan belum ada</td>
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
