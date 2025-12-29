<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Booking - Brok Barbershop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f8f9fa;
            min-height: 100vh;
        }

        /* Navbar */
        .navbar {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            padding: 1rem 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0,0,0,0.3);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            color: #fff;
            font-size: 1.5rem;
            font-weight: bold;
            text-decoration: none;
        }

        .logo span {
            color: #e94560;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            list-style: none;
            align-items: center;
        }

        .nav-links a {
            color: #fff;
            text-decoration: none;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: #e94560;
        }

        .user-menu {
            position: relative;
        }

        .user-btn {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            padding: 8px 16px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .user-btn:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        /* Main Content */
        .main-content {
            margin-top: 80px;
            padding: 40px 2rem;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .page-header {
            margin-bottom: 30px;
        }

        .page-header h1 {
            color: #1a1a2e;
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .page-header p {
            color: #666;
        }

        /* Tabs */
        .tabs {
            display: flex;
            gap: 1rem;
            margin-bottom: 30px;
            border-bottom: 2px solid #e0e0e0;
            flex-wrap: wrap;
        }

        .tab-btn {
            padding: 12px 24px;
            background: none;
            border: none;
            color: #666;
            font-size: 1rem;
            cursor: pointer;
            border-bottom: 3px solid transparent;
            transition: all 0.3s;
            font-weight: 500;
        }

        .tab-btn:hover {
            color: #e94560;
        }

        .tab-btn.active {
            color: #e94560;
            border-bottom-color: #e94560;
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 30px;
        }

        .stat-card {
            background: #fff;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: #fff;
        }

        .stat-icon.pending { background: linear-gradient(135deg, #ffa500, #ff8c00); }
        .stat-icon.confirmed { background: linear-gradient(135deg, #2196f3, #1976d2); }
        .stat-icon.completed { background: linear-gradient(135deg, #28a745, #218838); }
        .stat-icon.cancelled { background: linear-gradient(135deg, #e94560, #d63851); }

        .stat-info h3 {
            color: #1a1a2e;
            font-size: 1.8rem;
            margin-bottom: 0.3rem;
        }

        .stat-info p {
            color: #666;
            font-size: 0.9rem;
        }

        /* Booking Cards */
        .booking-list {
            display: grid;
            gap: 1.5rem;
        }

        .booking-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .booking-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.12);
        }

        .booking-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem;
            border-bottom: 1px solid #f0f0f0;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .booking-id {
            font-weight: 600;
            color: #1a1a2e;
            font-size: 1.1rem;
        }

        .status-badge {
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .status-badge.pending {
            background: #fff3cd;
            color: #856404;
        }

        .status-badge.confirmed {
            background: #cce5ff;
            color: #004085;
        }

        .status-badge.completed {
            background: #d4edda;
            color: #155724;
        }

        .status-badge.cancelled {
            background: #f8d7da;
            color: #721c24;
        }

        .booking-body {
            padding: 1.5rem;
        }

        .booking-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .info-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }

        .info-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            background: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #e94560;
            flex-shrink: 0;
        }

        .info-content h4 {
            font-size: 0.85rem;
            color: #666;
            margin-bottom: 0.3rem;
        }

        .info-content p {
            color: #1a1a2e;
            font-weight: 600;
        }

        .booking-footer {
            padding: 1rem 1.5rem;
            background: #f8f9fa;
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 0.9rem;
            font-weight: 600;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #e94560, #d63851);
            color: #fff;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(233, 69, 96, 0.3);
        }

        .btn-secondary {
            background: #fff;
            color: #666;
            border: 2px solid #e0e0e0;
        }

        .btn-secondary:hover {
            border-color: #e94560;
            color: #e94560;
        }

        .btn-success {
            background: linear-gradient(135deg, #28a745, #218838);
            color: #fff;
        }

        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(40, 167, 69, 0.3);
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }

        .empty-state i {
            font-size: 4rem;
            color: #e0e0e0;
            margin-bottom: 1rem;
        }

        .empty-state h3 {
            color: #1a1a2e;
            margin-bottom: 0.5rem;
        }

        .empty-state p {
            color: #666;
            margin-bottom: 1.5rem;
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.7);
            z-index: 2000;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background: #fff;
            padding: 2rem;
            border-radius: 12px;
            max-width: 500px;
            width: 100%;
            animation: slideUp 0.3s;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .modal-header h3 {
            color: #1a1a2e;
        }

        .modal-close {
            background: none;
            border: none;
            font-size: 1.5rem;
            color: #666;
            cursor: pointer;
        }

        .modal-body {
            margin-bottom: 1.5rem;
        }

        .modal-footer {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .page-header h1 {
                font-size: 1.5rem;
            }

            .booking-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .booking-info {
                grid-template-columns: 1fr;
            }

            .tabs {
                overflow-x: auto;
                white-space: nowrap;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="index.html" class="logo">Brok<span>Barber</span></a>
            <ul class="nav-links">
                <li><a href="index.html">Home</a></li>
                <li><a href="index.html#services">Layanan</a></li>
                <li><a href="index.html#booking">Booking</a></li>
                <li><a href="riwayat-booking.html" style="color: #e94560;">Riwayat</a></li>
                <li class="user-menu">
                    <div class="user-btn">
                        <i class="fas fa-user-circle"></i>
                        <span>John Doe</span>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <!-- Page Header -->
            <div class="page-header">
                <h1><i class="fas fa-history"></i> Riwayat Booking</h1>
                <p>Kelola dan pantau semua booking Anda</p>
            </div>

            <!-- Stats Cards -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon pending">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="stat-info">
                        <h3 id="statPending">1</h3>
                        <p>Menunggu Konfirmasi</p>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon confirmed">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="stat-info">
                        <h3 id="statConfirmed">1</h3>
                        <p>Booking Aktif</p>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon completed">
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="stat-info">
                        <h3 id="statCompleted">1</h3>
                        <p>Sudah Selesai</p>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon cancelled">
                        <i class="fas fa-receipt"></i>
                    </div>
                    <div class="stat-info">
                        <h3 id="statTotal">3</h3>
                        <p>Total Booking</p>
                    </div>
                </div>
            </div>

            <!-- Tabs -->
            <div class="tabs">
                <button class="tab-btn active" data-tab="all">Semua Booking</button>
                <button class="tab-btn" data-tab="pending">Menunggu</button>
                <button class="tab-btn" data-tab="confirmed">Aktif</button>
                <button class="tab-btn" data-tab="completed">Selesai</button>
            </div>

            <!-- Booking List -->
            <div class="booking-list" id="bookingList">
                <!-- Booking Card 1 - Confirmed -->
                <div class="booking-card" data-status="confirmed">
                    <div class="booking-header">
                        <div class="booking-id">
                            <i class="fas fa-receipt"></i> #BK-20241230-001
                        </div>
                        <span class="status-badge confirmed">Booking Aktif</span>
                    </div>
                    <div class="booking-body">
                        <div class="booking-info">
                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="fas fa-scissors"></i>
                                </div>
                                <div class="info-content">
                                    <h4>Layanan</h4>
                                    <p>Haircut Premium</p>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="fas fa-calendar"></i>
                                </div>
                                <div class="info-content">
                                    <h4>Tanggal & Waktu</h4>
                                    <p>30 Des 2024 - 10:00 WIB</p>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="info-content">
                                    <h4>Barber</h4>
                                    <p>Rizky Pratama</p>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="fas fa-money-bill"></i>
                                </div>
                                <div class="info-content">
                                    <h4>Total Bayar</h4>
                                    <p>Rp 75.000</p>
                                </div>
                            </div>
                        </div>
                        <div style="background: #e8f5e9; padding: 12px; border-radius: 8px; margin-top: 15px; display: flex; align-items: center; gap: 10px;">
                            <i class="fas fa-info-circle" style="color: #28a745;"></i>
                            <span style="color: #155724; font-size: 0.9rem;">Booking Anda telah dikonfirmasi. Harap datang 10 menit sebelum jadwal.</span>
                        </div>
                    </div>
                    <div class="booking-footer">
                        <button class="btn btn-secondary" onclick="cancelBooking('BK-20241230-001')">
                            <i class="fas fa-times"></i> Batalkan
                        </button>
                        <button class="btn btn-primary" onclick="viewDetail('BK-20241230-001')">
                            <i class="fas fa-eye"></i> Lihat Detail
                        </button>
                    </div>
                </div>

                <!-- Booking Card 2 - Pending -->
                <div class="booking-card" data-status="pending">
                    <div class="booking-header">
                        <div class="booking-id">
                            <i class="fas fa-receipt"></i> #BK-20241231-002
                        </div>
                        <span class="status-badge pending">Menunggu Konfirmasi</span>
                    </div>
                    <div class="booking-body">
                        <div class="booking-info">
                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="fas fa-scissors"></i>
                                </div>
                                <div class="info-content">
                                    <h4>Layanan</h4>
                                    <p>Haircut Reguler</p>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="fas fa-calendar"></i>
                                </div>
                                <div class="info-content">
                                    <h4>Tanggal & Waktu</h4>
                                    <p>31 Des 2024 - 14:00 WIB</p>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div class="info-content">
                                    <h4>Durasi</h4>
                                    <p>30 menit</p>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="fas fa-money-bill"></i>
                                </div>
                                <div class="info-content">
                                    <h4>Total Bayar</h4>
                                    <p>Rp 50.000</p>
                                </div>
                            </div>
                        </div>
                        <div style="background: #fff3cd; padding: 12px; border-radius: 8px; margin-top: 15px; display: flex; align-items: center; gap: 10px;">
                            <i class="fas fa-hourglass-half" style="color: #856404;"></i>
                            <span style="color: #856404; font-size: 0.9rem;">Booking Anda sedang menunggu konfirmasi dari barbershop. Kami akan menghubungi Anda segera.</span>
                        </div>
                    </div>
                    <div class="booking-footer">
                        <button class="btn btn-secondary" onclick="cancelBooking('BK-20241231-002')">
                            <i class="fas fa-times"></i> Batalkan
                        </button>
                        <button class="btn btn-primary" onclick="viewDetail('BK-20241231-002')">
                            <i class="fas fa-eye"></i> Lihat Detail
                        </button>
                    </div>
                </div>

                <!-- Booking Card 3 - Completed -->
                <div class="booking-card" data-status="completed">
                    <div class="booking-header">
                        <div class="booking-id">
                            <i class="fas fa-receipt"></i> #BK-20241228-003
                        </div>
                        <span class="status-badge completed">Selesai</span>
                    </div>
                    <div class="booking-body">
                        <div class="booking-info">
                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="fas fa-scissors"></i>
                                </div>
                                <div class="info-content">
                                    <h4>Layanan</h4>
                                    <p>Paket Lengkap</p>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="fas fa-calendar"></i>
                                </div>
                                <div class="info-content">
                                    <h4>Tanggal & Waktu</h4>
                                    <p>28 Des 2024 - 15:00 WIB</p>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="info-content">
                                    <h4>Barber</h4>
                                    <p>Andi Wijaya</p>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="fas fa-money-bill"></i>
                                </div>
                                <div class="info-content">
                                    <h4>Total Bayar</h4>
                                    <p>Rp 200.000</p>
                                </div>
                            </div>
                        </div>
                        <div style="background: #d4edda; padding: 12px; border-radius: 8px; margin-top: 15px; display: flex; align-items: center; gap: 10px;">
                            <i class="fas fa-check-circle" style="color: #28a745;"></i>
                            <span style="color: #155724; font-size: 0.9rem;">Layanan telah selesai. Terima kasih telah menggunakan layanan kami!</span>
                        </div>
                    </div>
                    <div class="booking-footer">
                        <button class="btn btn-success" onclick="rateBooking('BK-20241228-003')">
                            <i class="fas fa-star"></i> Beri Rating & Ulasan
                        </button>
                        <button class="btn btn-secondary" onclick="bookAgain()">
                            <i class="fas fa-redo"></i> Booking Lagi
                        </button>
                    </div>
                </div>
            </div>

            <!-- Empty State (hidden by default) -->
            <div class="empty-state" id="emptyState" style="display: none;">
                <i class="fas fa-clipboard-list"></i>
                <h3>Belum Ada Booking</h3>
                <p>Anda belum memiliki riwayat booking. Yuk, booking sekarang!</p>
                <a href="index.html#booking" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Buat Booking Sekarang
                </a>
            </div>
        </div>
    </main>

    <!-- Modal Konfirmasi Batalkan -->
    <div class="modal" id="cancelModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Batalkan Booking</h3>
                <button class="modal-close" onclick="closeModal('cancelModal')">&times;</button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin membatalkan booking ini? Tindakan ini tidak dapat dibatalkan.</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" onclick="closeModal('cancelModal')">Tidak</button>
                <button class="btn btn-primary" onclick="confirmCancel()">Ya, Batalkan</button>
            </div>
        </div>
    </div>

    <script>
        // Tab functionality
        const tabBtns = document.querySelectorAll('.tab-btn');
        const bookingCards = document.querySelectorAll('.booking-card');
        const emptyState = document.getElementById('emptyState');
        const bookingList = document.getElementById('bookingList');

        // Update stats on page load
        function updateStats() {
            const pending = document.querySelectorAll('[data-status="pending"]').length;
            const confirmed = document.querySelectorAll('[data-status="confirmed"]').length;
            const completed = document.querySelectorAll('[data-status="completed"]').length;
            const total = pending + confirmed + completed;

            document.getElementById('statPending').textContent = pending;
            document.getElementById('statConfirmed').textContent = confirmed;
            document.getElementById('statCompleted').textContent = completed;
            document.getElementById('statTotal').textContent = total;
        }

        updateStats();

        tabBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                // Remove active class from all tabs
                tabBtns.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');

                const selectedTab = btn.dataset.tab;
                let visibleCount = 0;

                // Filter cards
                bookingCards.forEach(card => {
                    if (selectedTab === 'all' || card.dataset.status === selectedTab) {
                        card.style.display = 'block';
                        visibleCount++;
                    } else {
                        card.style.display = 'none';
                    }
                });

                // Show empty state if no cards visible
                if (visibleCount === 0) {
                    bookingList.style.display = 'none';
                    emptyState.style.display = 'block';
                } else {
                    bookingList.style.display = 'grid';
                    emptyState.style.display = 'none';
                }
            });
        });

        // Cancel booking
        let currentBookingId = null;

        function cancelBooking(bookingId) {
            currentBookingId = bookingId;
            document.getElementById('cancelModal').classList.add('active');
        }

        function confirmCancel() {
            console.log('Membatalkan booking:', currentBookingId);
            alert('Booking ' + currentBookingId + ' berhasil dibatalkan');
            closeModal('cancelModal');
            // Here you would typically make an API call to cancel the booking
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.remove('active');
        }

        function viewDetail(bookingId) {
            console.log('Melihat detail booking:', bookingId);
            alert('Menampilkan detail booking ' + bookingId);
            // Here you would typically navigate to a detail page or show a detail modal
        }

        function rateBooking(bookingId) {
            console.log('Rating booking:', bookingId);
            alert('Formulir rating untuk booking ' + bookingId);
            // Here you would typically show a rating modal
        }

        function bookAgain() {
            window.location.href = 'index.html#booking';
        }

        // Close modal when clicking outside
        document.querySelectorAll('.modal').forEach(modal => {
            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    modal.classList.remove('active');
                }
            });
        });
    </script>
</body>
</html>