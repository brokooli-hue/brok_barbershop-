  @extends('user.layouts.base')
  @section('content')
      <!-- Main Content -->
      <main class="main-content">
          <div class="container">
              <!-- Page Header -->
              <div class="page-header">
                  <h1><i class="fas fa-history"></i> Riwayat Booking</h1>
                  <p>Kelola dan pantau semua booking Anda</p>
              </div>

              {{-- <div class="stats-grid">
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

              <div class="tabs">
                  <button class="tab-btn active" data-tab="all">Semua Booking</button>
                  <button class="tab-btn" data-tab="pending">Menunggu</button>
                  <button class="tab-btn" data-tab="confirmed">Aktif</button>
                  <button class="tab-btn" data-tab="completed">Selesai</button>
              </div> --}}
              <!-- Booking List -->
              <div class="booking-list" id="bookingList">
                  @forelse ($bookings as $item)
                      @if ($item->status_booking == 'konfirmasi')
                          <!-- Booking Card 1 - Confirmed -->
                          <div class="booking-card" data-status="confirmed">
                              <div class="booking-header">
                                  <div class="booking-id">
                                      <i class="fas fa-receipt"></i> #{{ $item->no_booking }}
                                  </div>
                                  <span class="status-badge confirmed">{{ $item->status_booking }}</span>
                              </div>
                              <div class="booking-body">
                                  <div class="booking-info">
                                      <div class="info-item">
                                          <div class="info-icon">
                                              <i class="fas fa-scissors"></i>
                                          </div>
                                          <div class="info-content">
                                              <h4>Layanan</h4>
                                              <p>{{ $item->layanan->nama_layanan }}</p>
                                          </div>
                                      </div>
                                      <div class="info-item">
                                          <div class="info-icon">
                                              <i class="fas fa-calendar"></i>
                                          </div>
                                          <div class="info-content">
                                              <h4>{{ $item->tanggal_booking }}</h4>
                                              <p>{{ $item->jam_booking }}</p>
                                          </div>
                                      </div>
                                      <div class="info-item">
                                          <div class="info-icon">
                                              <i class="fas fa-user"></i>
                                          </div>
                                          <div class="info-content">
                                              <h4>Barber</h4>
                                              <p>{{ $item->barber->nama_barber }}</p>
                                          </div>
                                      </div>
                                      <div class="info-item">
                                          <div class="info-icon">
                                              <i class="fas fa-money-bill"></i>
                                          </div>
                                          <div class="info-content">
                                              <h4>Total Bayar</h4>
                                              <p>Rp {{ number_format($item->layanan->harga, 0, ',', '.') }}</p>
                                          </div>
                                      </div>
                                  </div>
                                  <div
                                      style="background: #e8f5e9; padding: 12px; border-radius: 8px; margin-top: 15px; display: flex; align-items: center; gap: 10px;">
                                      <i class="fas fa-info-circle" style="color: #28a745;"></i>
                                      <span style="color: #155724; font-size: 0.9rem;">Booking Anda telah dikonfirmasi.
                                          Harap
                                          datang 10 menit sebelum jadwal.</span>
                                  </div>
                              </div>
                          </div>
                      @elseif ($item->status_booking == 'selesai')
                          <!-- Booking Card 3 - Completed -->
                          <div class="booking-card" data-status="completed">
                              <div class="booking-header">
                                  <div class="booking-id">
                                      <i class="fas fa-receipt"></i> #{{ $item->no_booking }}
                                  </div>
                                  <span class="status-badge completed">{{ $item->status_booking }}</span>
                              </div>
                              <div class="booking-body">
                                  <div class="booking-info">
                                      <div class="info-item">
                                          <div class="info-icon">
                                              <i class="fas fa-scissors"></i>
                                          </div>
                                          <div class="info-content">
                                              <h4>Layanan</h4>
                                              <p>{{ $item->layanan->nama_layanan }}</p>
                                          </div>
                                      </div>
                                      <div class="info-item">
                                          <div class="info-icon">
                                              <i class="fas fa-calendar"></i>
                                          </div>
                                          <div class="info-content">
                                              <h4>{{ $item->tanggal_booking }}</h4>
                                              <p>{{ $item->jam_booking }}</p>
                                          </div>
                                      </div>
                                      <div class="info-item">
                                          <div class="info-icon">
                                              <i class="fas fa-user"></i>
                                          </div>
                                          <div class="info-content">
                                              <h4>Barber</h4>
                                              <p>{{ $item->barber->nama_barber }}</p>
                                          </div>
                                      </div>
                                      <div class="info-item">
                                          <div class="info-icon">
                                              <i class="fas fa-money-bill"></i>
                                          </div>
                                          <div class="info-content">
                                              <h4>Total Bayar</h4>
                                              <p>Rp {{ number_format($item->layanan->harga, 0, ',', '.') }}</p>
                                          </div>
                                      </div>
                                  </div>
                                  <div
                                      style="background: #d4edda; padding: 12px; border-radius: 8px; margin-top: 15px; display: flex; align-items: center; gap: 10px;">
                                      <i class="fas fa-check-circle" style="color: #28a745;"></i>
                                      <span style="color: #155724; font-size: 0.9rem;">Layanan telah selesai. Terima kasih
                                          telah
                                          menggunakan layanan kami!</span>
                                  </div>
                              </div>
                              <div class="booking-footer">
                                  <a href="{{ route('home') }}" class="btn btn-secondary">
                                      <i class="fas fa-redo"></i> Booking Lagi
                                  </a>
                                  <form action="{{ route('booking.delete_by_user', $item->id) }}" method="POST"
                                      style="display:inline-block;"
                                      onsubmit="return confirm('Yakin ingin menyembunyikan booking ini dari riwayat?')">
                                      @csrf
                                      @method('PUT')
                                      <input type="hidden" name="is_hidden_by_user" value="true">
                                      <button class="btn btn-primary" onclick="return">
                                          <i class="fas fa-trash"></i> Hapus dari Riwayat
                                      </button>
                                  </form>
                              </div>
                          </div>
                      @elseif ($item->status_booking == 'batal')
                          <!-- Booking Card 4 - Cancelled -->
                          <div class="booking-card" data-status="cancelled">
                              <div class="booking-header">
                                  <div class="booking-id">
                                      <i class="fas fa-receipt"></i> #{{ $item->no_booking }}
                                  </div>
                                  <span class="status-badge cancelled">{{ $item->status_booking }}</span>
                              </div>
                              <div class="booking-body">
                                  <div class="booking-info">
                                      <div class="info-item">
                                          <div class="info-icon">
                                              <i class="fas fa-scissors"></i>
                                          </div>
                                          <div class="info-content">
                                              <h4>Layanan</h4>
                                              <p>{{ $item->layanan->nama_layanan }}</p>
                                          </div>
                                      </div>
                                      <div class="info-item">
                                          <div class="info-icon">
                                              <i class="fas fa-calendar"></i>
                                          </div>
                                          <div class="info-content">
                                              <h4>{{ $item->tanggal_booking }}</h4>
                                              <p>{{ $item->jam_booking }}</p>
                                          </div>
                                      </div>
                                      <div class="info-item">
                                          <div class="info-icon">
                                              <i class="fas fa-money-bill"></i>
                                          </div>
                                          <div class="info-content">
                                              <h4>Total Bayar</h4>
                                              <p>Rp {{ number_format($item->layanan->harga, 0, ',', '.') }}</p>
                                          </div>
                                      </div>
                                  </div>
                                  <div
                                      style="background: #f8d7da; padding: 12px; border-radius: 8px; margin-top: 15px; display: flex; align-items: center; gap: 10px;">
                                      <i class="fas fa-times-circle" style="color: #721c24;"></i>
                                      <span style="color: #721c24; font-size: 0.9rem;">Booking ini telah dibatalkan. Barber
                                          Dan
                                          Tidak Tersedia.Silahkan Pilih Barber Dan Layanan Yang ada. Jika ada
                                          pertanyaan, silakan hubungi kami.</span>
                                  </div>
                              </div>
                              <div class="booking-footer">
                                  <a href="{{ route('home') }}" class="btn btn-secondary">
                                      <i class="fas fa-redo"></i> Booking Lagi
                                  </a>
                                  <form action="{{ route('booking.delete_by_user', $item->id) }}" method="POST"
                                      style="display:inline-block;"
                                      onsubmit="return confirm('Yakin ingin menyembunyikan booking ini dari riwayat?')">
                                      @csrf
                                      @method('PUT')
                                      <input type="hidden" name="is_hidden_by_user" value="true">
                                      <button class="btn btn-primary" onclick="return">
                                          <i class="fas fa-trash"></i> Hapus dari Riwayat
                                      </button>
                                  </form>
                              </div>
                          </div>
                      @else
                          <!-- Booking Card 2 - Pending -->
                          <div class="booking-card" data-status="pending">
                              <div class="booking-header">
                                  <div class="booking-id">
                                      <i class="fas fa-receipt"></i> #{{ $item->no_booking }}
                                  </div>
                                  <span class="status-badge pending">{{ $item->status_booking }}</span>
                              </div>
                              <div class="booking-body">
                                  <div class="booking-info">
                                      <div class="info-item">
                                          <div class="info-icon">
                                              <i class="fas fa-scissors"></i>
                                          </div>
                                          <div class="info-content">
                                              <h4>Layanan</h4>
                                              <p>{{ $item->layanan->nama_layanan }}</p>
                                          </div>
                                      </div>
                                      <div class="info-item">
                                          <div class="info-icon">
                                              <i class="fas fa-calendar"></i>
                                          </div>
                                          <div class="info-content">
                                              <h4>{{ $item->tanggal_booking }}</h4>
                                              <p>{{ $item->jam_booking }}</p>
                                          </div>
                                      </div>
                                      {{-- <div class="info-item">
                                          <div class="info-icon">
                                              <i class="fas fa-clock"></i>
                                          </div>
                                          <div class="info-content">
                                              <h4>Durasi</h4>
                                              <p>30 menit</p>
                                          </div>
                                      </div> --}}
                                      <div class="info-item">
                                          <div class="info-icon">
                                              <i class="fas fa-money-bill"></i>
                                          </div>
                                          <div class="info-content">
                                              <h4>Total Bayar</h4>
                                              <p>Rp {{ number_format($item->layanan->harga, 0, ',', '.') }}</p>
                                          </div>
                                      </div>
                                  </div>
                                  <div
                                      style="background: #fff3cd; padding: 12px; border-radius: 8px; margin-top: 15px; display: flex; align-items: center; gap: 10px;">
                                      <i class="fas fa-hourglass-half" style="color: #856404;"></i>
                                      <span style="color: #856404; font-size: 0.9rem;">Booking Anda sedang menunggu
                                          konfirmasi
                                          dari barbershop. Kami akan menghubungi Anda segera.</span>
                                  </div>
                              </div>
                              <div class="booking-footer">
                                  <form action="{{ route('booking.cancel_by_user', $item->id) }}" method="POST"
                                      style="display:inline-block;"
                                      onsubmit="return confirm('Yakin ingin membatalkan  bookingan ini?')">
                                      @csrf
                                      @method('PUT')
                                      <input type="hidden" name="status_booking" value="batal">
                                      <button class="btn btn-secondary">
                                          <i class="fas fa-times"></i> Batalkan
                                      </button>
                                  </form>
                              </div>
                          </div>
                      @endif
                  @empty
                      <!-- Empty State -->
                      <div class="empty-state">
                          <i class="fas fa-clipboard-list"></i>
                          <h3>Belum Ada Booking</h3>
                          <p>Anda belum memiliki riwayat booking. Yuk, booking sekarang!</p>
                          <button class="btn btn-primary" onclick="location.href='{{ route('home') }}'">
                              <i class="fas fa-plus-circle"></i> Buat Booking
                          </button>
                      </div>
              </div>
              @endforelse
          </div>
          </div>
      </main>
  @endsection
