@extends('user.layouts.base')
@section('content')
    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="container">
            <h1>Selamat Datang di <span style="color: #e94560;">Brok Barbershop</span></h1>
            <p>Potong rambut profesional dengan gaya terkini dan pelayanan terbaik</p>
            <a href="#booking" class="btn-primary"><i class="fas fa-calendar-check"></i> Book Sekarang</a>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services">
        <div class="container">
            <h2 class="section-title">Layanan Kami</h2>
            <p class="section-subtitle">Berbagai pilihan layanan untuk penampilan terbaik Anda</p>
            <div class="services-grid">
                @foreach ($layanan as $item)
                    <div class="service-card">
                        <div class="service-icon"><i class="fas fa-cut"></i></div>
                        <h3>{{ $item->nama_layanan }}</h3>
                        <p>{{ $item->deskripsi }}</p>
                        <div class="service-price">Rp {{ number_format($item->harga, 0, ',', '.') }}</div>
                        {{-- <div class="service-duration"><i class="far fa-clock"></i> {{ $item->durasi }} menit</div> --}}
                    </div>
                @endforeach
            </div>
        </div>
        </div>
    </section>

    <!-- Gallery Section (Barber) -->
    <section id="gallery" class="gallery">
        <div class="container">
            <h2 class="section-title">Barber Kami</h2>
            <p class="section-subtitle">Profesional & berpengalaman</p>

            <div class="gallery-grid">
                @foreach ($barber as $item)
                    <div class="gallery-item">
                        <img src="{{ asset('storage/' . $item->gambar_barber) }}" alt="{{ $item->nama_barber }}"
                            style="
                            width: 100%;
                            height: 100%;
                            object-fit: cover;
                            border-radius: 10px;
                        ">
                        <div
                            style="
                        position: absolute;
                        bottom: 0;
                        width: 100%;
                        background: rgba(0,0,0,0.6);
                        color: #fff;
                        padding: 10px;
                        text-align: center;
                        font-weight: bold;
                    ">
                            {{ $item->nama_barber }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Booking Section -->
    <section id="booking" class="booking">
        <div class="container">
            <h2 class="section-title">Booking Online</h2>
            <p class="section-subtitle">Jadwalkan kunjungan Anda sekarang</p>

            <form class="booking-form" action="{{ route('booking.store') }}" method="POST" id="bookingForm">
                @csrf

                <div class="form-group">
                    <label for="phone"><i class="fas fa-phone"></i> No. Telepon *</label>
                    <input type="tel" id="phone" name="no_hp" placeholder="08xxxxxxxxxx">
                </div>

                <div class="form-group">
                    <label for="barber_id"><i class="fas fa-user"></i> Barber</label>
                    <select id="barber_id" name="barber_id">
                        <option value="">-- Pilih Barber --</option>
                        @foreach ($barber as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_barber }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="nama_layanan"><i class="fas fa-scissors"></i> Pilih Layanan *</label>
                    <select id="nama_layanan" name="layanan_id">
                        <option value="">-- Pilih Layanan --</option>
                        @foreach ($layanan as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_layanan }} - Rp
                                {{ number_format($item->harga, 0, ',', '.') }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="date"><i class="fas fa-calendar"></i> Tanggal *</label>
                    <input type="date" id="date" name="tanggal_booking">
                </div>

                <div class="form-group">
                    <label for="time"><i class="fas fa-clock"></i> Waktu *</label>
                    <select id="time" name="jam_booking">
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
                </div>
                <div class="submit">
                    @if (Auth::check())
                        <button type="submit" class="btn-submit"><i class="fas fa-check"></i> Konfirmasi Booking</button>
                    @else
                        <a href="{{ route('login') }}" class="btn-submit"><i class="fas fa-sign-in-alt"></i> Login untuk
                            Booking</a>
                    @endif

                </div>


                <input type="hidden" id="status_booking" name="status_booking" value="menunggu">
            </form>
        </div>
    </section>
@endsection
