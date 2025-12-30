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
                <li><a href="#contact">Kontak</a></li>
                <li><a href="{{ route('booking.my_bookings') }}">Riwayat Booking</a></li>
                @if (Auth::check())
                    <li><a href="{{ route('logout') }}">Logout</a></li>
                @else
                    <li><a href="{{ route('login') }}">Login</a></li>
                @endif
            </ul>
        </div>
    </nav>

  @yield('content')
    

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

        const btnHidden = document.getElementById('btnHidden');
        const infoIcon = document.querySelector('.booking-card');
        btnHidden.addEventListener('click', function() {
            infoIcon.style.display = 'none';
        });
    </script>
</body>

</html>
