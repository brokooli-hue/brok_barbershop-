<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Brok Barbershop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('style/auth.css') }}">
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="card-header">
                <div class="logo-wrapper">
                    <div class="logo-icon">
                        <i class="fas fa-cut"></i>
                    </div>
                </div>
                <h2>Brok Barbershop</h2>
                <p>Masuk ke akun Anda</p>
            </div>

            <div class="card-body">
                <!-- Alert Error (contoh) -->
                <div class="alert alert-danger" style="display: none;" id="alertError">
                    <i class="fas fa-exclamation-circle"></i>
                    <span id="errorMessage">Email atau password salah</span>
                </div>

                <!-- Alert Success (contoh) -->
                <div class="alert alert-success" style="display: none;" id="alertSuccess">
                    <i class="fas fa-check-circle"></i>
                    <span id="successMessage">Registrasi berhasil! Silakan login.</span>
                </div>

                <form id="loginForm" action="{{ route('login.process') }}" method="POST">
                    <!-- CSRF Token (untuk Laravel) -->
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label for="email">
                            <i class="fas fa-envelope"></i> Email
                        </label>
                        <div class="input-wrapper">
                            <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                class="form-control" 
                                placeholder="nama@email.com"
                                value="{{ old('email') }}"
                                required
                            >
                            <i class="fas fa-envelope input-icon"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">
                            <i class="fas fa-lock"></i> Password
                        </label>
                        <div class="input-wrapper">
                            <input 
                                type="password" 
                                id="password" 
                                name="password" 
                                class="form-control" 
                                placeholder="Masukkan password"
                                required
                            >
                            <i class="fas fa-lock input-icon"></i>
                            <i class="fas fa-eye password-toggle" id="togglePassword"></i>
                        </div>
                    </div>

                    <div class="form-options">
                        <label class="remember-me">
                            <input type="checkbox" name="remember" id="remember">
                            <span>Ingat saya</span>
                        </label>
                        <a href="#" class="forgot-password">Lupa password?</a>
                    </div>

                    <button type="submit" class="btn-login" id="btnLogin">
                        <i class="fas fa-sign-in-alt"></i> Masuk
                    </button>
                </form>

                <div class="divider">atau</div>

                <div class="register-link">
                    Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a>
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
        const passwordInput = document.getElementById('password');

        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            // Toggle icon
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });

        // Form submission with loading state
        const loginForm = document.getElementById('loginForm');
        const btnLogin = document.getElementById('btnLogin');

        loginForm.addEventListener('submit', function(e) {
            // Uncomment ini jika ingin test tanpa backend
            // e.preventDefault();
            
            btnLogin.classList.add('loading');
            btnLogin.innerHTML = '<i class="fas fa-sign-in-alt"></i> Memproses...';
        });

        // Demo: Show alerts (remove in production)
        // Uncomment untuk testing tampilan alert
        /*
        setTimeout(() => {
            document.getElementById('alertError').style.display = 'flex';
        }, 1000);
        */

        // Check for URL parameters (for Laravel redirects)
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