@extends('layouts.base')
@section('content')
    <div class="row">
        <!-- Welcome Card -->
        <div class="col-12">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h3 class="text-white mb-2">
                                <i class="fas fa-cut"></i> Selamat Datang di Dashboard
                            </h3>
                            <p class="mb-0 opacity-75">
                                Sistem Booking Brok Barbershop - {{ date('d F Y') }}
                            </p>
                        </div>
                        <div class="col-md-4 text-md-end">
                            <i class="fas fa-chart-line" style="font-size: 4rem; opacity: 0.3;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="col-xl-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted mb-1">Total Barber</p>
                            <h3 class="mb-0">{{ count($barbers) ?? 0 }}</h3>
                            <small class="text-muted">
                                <i class="ti ti-users"></i> Barber aktif
                            </small>
                        </div>
                        <div class="bg-light-info rounded p-3">
                            <i class="ti ti-cut text-info" style="font-size: 2.5rem;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted mb-1">Total Layanan</p>
                            <h3 class="mb-0">{{ count($layanans) ?? 0 }}</h3>
                            <small class="text-muted">
                                <i class="ti ti-list"></i> Jenis layanan
                            </small>
                        </div>
                        <div class="bg-light-success rounded p-3">
                            <i class="ti ti-world text-success" style="font-size: 2.5rem;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted mb-1">Total Booking</p>
                            <h3 class="mb-0">{{ count($bookings) ?? 00 }}</h3>
                            <small class="text-muted">
                                <i class="ti ti-calendar"></i> Semua booking
                            </small>
                        </div>
                        <div class="bg-light-primary rounded p-3">
                            <i class="ti ti-calendar-event text-primary" style="font-size: 2.5rem;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Barber -->
        <div class="col-xl-6 col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>
                            <i class="ti ti-cut"></i> Data Barber
                        </h5>
                        <a href="{{ url('barber') }}" class="btn btn-sm btn-outline-primary">
                            Lihat Semua <i class="ti ti-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barber</th>
                                    <th>Foto</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($barber as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_barber }}</td>
                                        <td>
                                            @if ($item->gambar_barber)
                                                <img src="{{ asset('storage/' . $item->gambar_barber) }}"
                                                    alt="Foto Barber" class="rounded" width="40" height="40"
                                                    style="object-fit: cover;">
                                            @else
                                                <div class="bg-light-primary rounded d-flex align-items-center justify-content-center"
                                                    style="width: 40px; height: 40px;">
                                                    <i class="ti ti-user text-primary"></i>
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center py-4">
                                            <i class="ti ti-inbox" style="font-size: 2rem; opacity: 0.3;"></i>
                                            <p class="text-muted mt-2 mb-0">Belum ada data barber</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Layanan -->
        <div class="col-xl-6 col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>
                            <i class="ti ti-world"></i> Data Layanan
                        </h5>
                        <a href="{{ url('layanan') }}" class="btn btn-sm btn-outline-primary">
                            Lihat Semua <i class="ti ti-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Layanan</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($layanan ?? [] as $l)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $l->nama_layanan }}</td>
                                        <td>Rp {{ number_format($l->harga ?? 0, 0, ',', '.') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-4">
                                            <i class="ti ti-inbox" style="font-size: 2rem; opacity: 0.3;"></i>
                                            <p class="text-muted mt-2 mb-0">Belum ada data layanan</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Booking -->
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>
                            <i class="ti ti-calendar-time"></i> Data Booking Terbaru
                        </h5>
                        <a href="{{ url('booking') }}" class="btn btn-sm btn-outline-primary">
                            Lihat Semua <i class="ti ti-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Layanan</th>
                                    <th>Barber</th>
                                    <th>Tanggal</th>
                                    <th>Jam</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($booking ?? [] as $$item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $$item->user->name ?? 'N/A' }}</td>
                                        <td>{{ $$item->layanan->nama_layanan ?? 'N/A' }}</td>
                                        <td>{{ $$item->barber->nama_barber ?? 'N/A' }}</td>
                                        <td>{{ date('d/m/Y', strtotime($$item->tanggal_booking)) }}</td>
                                        <td>{{ $$item->jam_booking }}</td>
                                        <td>
                                            @if ($$item->status_booking == 'menunggu')
                                                <span class="badge bg-warning">
                                                    <i class="ti ti-clock"></i> Menunggu
                                                </span>
                                            @elseif($$item->status_booking == 'konfirmasi')
                                                <span class="badge bg-primary">
                                                    <i class="ti ti-check"></i> Dikonfirmasi
                                                </span>
                                            @elseif($$item->status_booking == 'selesai')
                                                <span class="badge bg-success">
                                                    <i class="ti ti-check-check"></i> Selesai
                                                </span>
                                            @else
                                                <span class="badge bg-danger">
                                                    <i class="ti ti-x"></i> Batal
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-4">
                                            <i class="ti ti-inbox" style="font-size: 2rem; opacity: 0.3;"></i>
                                            <p class="text-muted mt-2 mb-0">Belum ada data booking</p>
                                        </td>
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
