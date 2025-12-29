<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brok Barbershop - Potong Rambut Profesional</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('style/style.css') }}">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="{{ route('home') }}" class="logo">Brok<span>Barber</span></a>
            <ul class="nav-links">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="#services">Layanan</a></li>
                <li><a href="#gallery">Barber</a></li>
                <li><a href="#booking">Booking</a></li>
                <li><a href="#contact">Kontak</a></li>
                <li><a href="#bookingan">Bookingan</a></li>
                @if (Auth::check())
                    <li><a href="{{ route('logout') }}">Logout</a></li>
                @else
                    <li><a href="{{ route('login') }}">Login</a></li>
                @endif
            </ul>
        </div>
    </nav>

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
                <input type="hidden" id="status_booking" name="status_booking" value="menunggu">

                <button type="submit" class="btn-submit"><i class="fas fa-check"></i> Konfirmasi Booking</button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact">
        <div class="footer-content">
            <div class="footer-section">
                <h3>Brok Barbershop</h3>
                <p>Barbershop profesional dengan layanan terbaik untuk penampilan maksimal Anda.</p>
                <div class="social-links">
                    <a href="https://www.facebook.com"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.x.com"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.whatsapp.com"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>

            <div class="footer-section">
                <h3>Jam Operasional</h3>
                <p>Senin - Jumat: 09:00 - 20:00</p>
                <p>Sabtu: 09:00 - 21:00</p>
                <p>Minggu: 10:00 - 18:00</p>
            </div>

            <div class="footer-section">
                <h3>Kontak</h3>
                <p><i class="fas fa-map-marker-alt"></i> Jl. TransSulawesi Buana Sari, Tolai</p>
                <p><i class="fas fa-phone"></i> +62 857-3478-7890</p>
                <p><i class="fas fa-envelope"></i> info@brokbarber.com</p>
            </div>

            <div class="footer-section">
                <h3>Link Cepat</h3>
                <a href="#home">Home</a>
                <a href="#services">Layanan</a>
                <a href="#booking">Booking</a>
                <a href="#gallery">Gallery</a>
                <a href="#bookingan">Bookingan</a>
            </div>
        </div>

        <div class="copyright">
            <p>&copy; 2026 Brok Barbershop. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- Modal Konfirmasi -->
    <div class="modal" id="successModal">
        <div class="modal-content">
            <i class="fas fa-check-circle"></i>
            <h2>Booking Berhasil!</h2>
            <p>Terima kasih telah melakukan booking. Kami akan menghubungi Anda segera untuk konfirmasi.</p>
            <button class="btn-close" onclick="closeModal()">Tutup</button>
        </div>
    </div>

      <div class="modal" id="warningModal">
        <div class="modal-warning modal-content">
            <i class="fas fa-exclamation-triangle"></i>
            <h2>Perhatian!</h2>
            <p>Periksa kembali data yang telah Anda masukkan.</p>
            <button class="btn-close" onclick="closeModal()">Tutup</button>
        </div>
    </div>

    <script>
        const dateInput = document.getElementById('date');
        const today = new Date().toISOString().split('T')[0];
        dateInput.min = today;

        document.getElementById('bookingForm').addEventListener('submit', function(e) {
            // e.preventDefault();
            const formData = {
                phone: document.getElementById('phone').value,
                nama_layanan: document.getElementById('nama_layanan').value,
                date: document.getElementById('date').value,
                time: document.getElementById('time').value,
            };
            
            // console.log(formData);
            if (!formData.phone || !formData.nama_layanan || !formData.date || !formData.time) {
                document.getElementById('warningModal').classList.add('active');
                setTimeout(() => {
                    document.getElementById('warningModal').classList.remove('active');
                }, 5000);
                e.preventDefault();
            } else {
                document.getElementById('successModal').classList.add('active');
                setTimeout(() => {
                    document.getElementById('successModal').classList.remove('active');
                }, 5000);
                // this.reset();
            }
        });

        function closeModal() {
            document.getElementById('successModal').classList.remove('active');
            document.getElementById('warningModal').classList.remove('active');
        }

        // Smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>

</html>
