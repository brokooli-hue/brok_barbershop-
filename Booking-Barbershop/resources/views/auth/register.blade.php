<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Brok Barbershop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('style/register.css') }}">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
</head>

<body>
    <div class="register-container">
        <div class="register-card">
            <div class="card-header">
                <div class="logo-wrapper">
                    <div class="logo-icon">
                        <i class="fas fa-cut"></i>
                    </div>
                </div>
                <h2>Brok Barbershop</h2>
                <p>Daftar akun baru</p>
            </div>

            <div class="card-body">
                <!-- Alert Error -->
                <div class="alert alert-danger" style="display: none;" id="alertError">
                    <i class="fas fa-exclamation-circle"></i>
                    <span id="errorMessage">Terjadi kesalahan, silakan coba lagi</span>
                </div>

                <!-- Alert Success -->
                <div class="alert alert-success" style="display: none;" id="alertSuccess">
                    <i class="fas fa-check-circle"></i>
                    <span id="successMessage">Registrasi berhasil! Silakan login.</span>
                </div>
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <form id="registerForm" action="{{ route('register.store') }}" method="POST">
                    <!-- CSRF Token (untuk Laravel) -->
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label for="name">
                            <i class="fas fa-user"></i> Nama Lengkap<span class="required">*</span>
                        </label>
                        <div class="input-wrapper">
                            <input type="text" id="name" name="name" class="form-control"
                                placeholder="Masukkan nama lengkap" value="{{ old('name') }}" required>
                            <input type="hidden" name="role" value="user">
                            <i class="fas fa-user input-icon"></i>
                        </div>
                        <div class="error-message" id="nameError">Nama lengkap wajib diisi</div>
                    </div>

                    <div class="form-group">
                        <label for="email">
                            <i class="fas fa-envelope"></i> Email<span class="required">*</span>
                        </label>
                        <div class="input-wrapper">
                            <input type="email" id="email" name="email" class="form-control"
                                placeholder="nama@email.com" value="{{ old('email') }}" required>
                            <i class="fas fa-envelope input-icon"></i>
                        </div>
                        <div class="error-message" id="emailError">Email tidak valid</div>
                    </div>

                    <div class="form-group">
                        <label for="password">
                            <i class="fas fa-lock"></i> Password<span class="required">*</span>
                        </label>
                        <div class="input-wrapper">
                            <input type="password" id="password" name="password" class="form-control"
                                placeholder="Minimal 8 karakter" required>
                            <i class="fas fa-lock input-icon"></i>
                            <i class="fas fa-eye password-toggle" id="togglePassword"></i>
                        </div>
                        <div class="password-strength">
                            <div class="password-strength-bar" id="strengthBar"></div>
                        </div>
                        <div class="password-strength-text" id="strengthText"></div>
                        <div class="error-message" id="passwordError">Password minimal 8 karakter</div>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">
                            <i class="fas fa-lock"></i> Konfirmasi Password<span class="required">*</span>
                        </label>
                        <div class="input-wrapper">
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="form-control" placeholder="Ketik ulang password" required>
                            <i class="fas fa-lock input-icon"></i>
                            <i class="fas fa-eye password-toggle" id="togglePasswordConfirm"></i>
                        </div>
                        <div class="error-message" id="confirmError">Password tidak cocok</div>
                    </div>

                    <div class="terms-checkbox">
                        <input type="checkbox" id="terms" name="terms" required>
                        <label for="terms">
                            Saya setuju dengan <a href="#">Syarat & Ketentuan</a> serta <a
                                href="#">Kebijakan Privasi</a>
                        </label>
                    </div>

                    <button type="submit" class="btn-register" id="btnRegister">
                        <i class="fas fa-user-plus"></i> Daftar Sekarang
                    </button>
                </form>

                <div class="divider">atau</div>

                <div class="login-link">
                    Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a>
                </div>
            </div>
        </div>

        <div class="back-home">
            <a href="{{ url('/home') }}">
                <i class="fas fa-arrow-left"></i> Kembali ke Beranda
            </a>
        </div>
    </div>

    <script>
        // Toggle password visibility
        const togglePassword = document.getElementById('togglePassword');
        const togglePasswordConfirm = document.getElementById('togglePasswordConfirm');
        const passwordInput = document.getElementById('password');
        const passwordConfirmInput = document.getElementById('password_confirmation');

        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });

        togglePasswordConfirm.addEventListener('click', function() {
            const type = passwordConfirmInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordConfirmInput.setAttribute('type', type);
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });

        // Password strength checker
        const strengthBar = document.getElementById('strengthBar');
        const strengthText = document.getElementById('strengthText');

        passwordInput.addEventListener('input', function() {
            const password = this.value;
            let strength = 0;

            if (password.length >= 8) strength += 25;
            if (password.match(/[a-z]/)) strength += 25;
            if (password.match(/[A-Z]/)) strength += 25;
            if (password.match(/[0-9]/)) strength += 25;

            strengthBar.style.width = strength + '%';

            if (strength <= 25) {
                strengthBar.style.background = '#e94560';
                strengthText.textContent = 'Lemah';
                strengthText.style.color = '#e94560';
            } else if (strength <= 50) {
                strengthBar.style.background = '#ffa500';
                strengthText.textContent = 'Cukup';
                strengthText.style.color = '#ffa500';
            } else if (strength <= 75) {
                strengthBar.style.background = '#2196f3';
                strengthText.textContent = 'Baik';
                strengthText.style.color = '#2196f3';
            } else {
                strengthBar.style.background = '#28a745';
                strengthText.textContent = 'Kuat';
                strengthText.style.color = '#28a745';
            }
        });

        // Form validation
        const registerForm = document.getElementById('registerForm');
        const btnRegister = document.getElementById('btnRegister');

        // Real-time validation
        const nameInput = document.getElementById('name');
        const emailInput = document.getElementById('email');

        nameInput.addEventListener('blur', function() {
            if (this.value.trim().length < 3) {
                this.parentElement.parentElement.classList.add('error');
            } else {
                this.parentElement.parentElement.classList.remove('error');
            }
        });

        emailInput.addEventListener('blur', function() {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(this.value)) {
                this.parentElement.parentElement.classList.add('error');
            } else {
                this.parentElement.parentElement.classList.remove('error');
            }
        });

        passwordConfirmInput.addEventListener('input', function() {
            if (this.value !== passwordInput.value) {
                this.parentElement.parentElement.classList.add('error');
            } else {
                this.parentElement.parentElement.classList.remove('error');
            }
        });

        // Form submission
        registerForm.addEventListener('submit', function(e) {
            // Validation
            let isValid = true;

            if (nameInput.value.trim().length < 3) {
                nameInput.parentElement.parentElement.classList.add('error');
                isValid = false;
            }

            if (passwordInput.value.length < 8) {
                passwordInput.parentElement.parentElement.classList.add('error');
                isValid = false;
            }

            if (passwordConfirmInput.value !== passwordInput.value) {
                passwordConfirmInput.parentElement.parentElement.classList.add('error');
                isValid = false;
            }

            if (!isValid) {
                e.preventDefault();
                return;
            }

            // Uncomment ini jika ingin test tanpa backend
            // e.preventDefault();

            btnRegister.classList.add('loading');
            btnRegister.innerHTML = '<i class="fas fa-user-plus"></i> Memproses...';
        });

        // Check for URL parameters
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('error')) {
            const alertError = document.getElementById('alertError');
            const errorMessage = document.getElementById('errorMessage');
            errorMessage.textContent = urlParams.get('error');
            alertError.style.display = 'flex';
        }
        if (urlParams.get('success')) {
            const alertSuccess = document.getElementById('alertSuccess');
            const successMessage = document.getElementById('successMessage');
            successMessage.textContent = urlParams.get('success');
            alertSuccess.style.display = 'flex';
        }
    </script>
</body>

</html>
