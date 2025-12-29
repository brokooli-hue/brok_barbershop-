<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarberController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LayananController;
use App\Models\Layanan;
use Illuminate\Support\Facades\Route;


Route::get('/login', [AuthController::class, 'showLogin'])
    ->middleware('guest')
    ->name('login');
Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::post('/register/store', [AuthController::class, 'store'])->name('register.store');
Route::get('/register', [AuthController::class, 'register'])->name('register');


// proses login
Route::post('/login-proses', [AuthController::class, 'login'])
    ->name('login.process');

Route::middleware(['auth', 'web'])->group(function () {



    Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');
    Route::get('/my-bookings', [BookingController::class, 'myBookings'])->name('booking.my_bookings');
    // Route::resource('booking', BookingController::class);






    // proses logout
    Route::get('/logout', [AuthController::class, 'logout'])
        ->name('logout');
});

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/barber', [BarberController::class, 'index'])->name('barber.index');
    Route::get('/barber/create', [BarberController::class, 'create'])->name('barber.create');
    Route::post('/barber/store', [BarberController::class, 'store'])->name('barber.store');
    Route::get('/barber/edit/{id}', [BarberController::class, 'edit'])->name('barber.edit');
    Route::put('/barber/update/{id}', [BarberController::class, 'update'])->name('barber.update');
    Route::delete('/barber/destroy/{id}', [BarberController::class, 'destroy'])->name('barber.destroy');


    Route::get('/layanan', [LayananController::class, 'index'])->name('layanan.index');
    Route::get('/layanan/create', [LayananController::class, 'create'])->name('layanan.create');
    Route::post('/layanan/store', [LayananController::class, 'store'])->name('layanan.store');
    Route::get('/layanan/edit/{id}', [LayananController::class, 'edit'])->name('layanan.edit');
    Route::put('/layanan/update/{id}', [LayananController::class, 'update'])->name('layanan.update');
    Route::delete('/layanan/destroy/{id}', [LayananController::class, 'destroy'])->name('layanan.destroy');


    Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');
    Route::get('/booking/create', [BookingController::class, 'create'])->name('booking.create');
    Route::get('/booking/edit/{id}', [BookingController::class, 'edit'])->name('booking.edit');
    Route::put('/booking/update/{id}', [BookingController::class, 'update'])->name('booking.update');
    Route::delete('/booking/destroy/{id}', [BookingController::class, 'destroy'])->name('booking.destroy');
    Route::put('/booking/update/{id}', [BookingController::class, 'updateStatus'])->name('booking.update');


    // Route::get('/admin-only', function () {
    //     return 'Halaman ini hanya untuk admin';
    // })->name('admin.only');
});
