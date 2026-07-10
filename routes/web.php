<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;

// Rute Publik
Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/room', [FrontendController::class, 'room'])->name('frontend.room');
Route::get('/cara-pemesanan', [FrontendController::class, 'howToBook'])->name('frontend.how-to-book');
Route::get('/tentang-kami', [FrontendController::class, 'about'])->name('frontend.about');
Route::get('/kontak', [FrontendController::class, 'contact'])->name('frontend.contact');

// Rute Autentikasi Tamu (Guest)
Route::middleware('guest')->group(function () {
    Route::get('/login', [FrontendController::class, 'showLogin'])->name('login');
    Route::post('/login', [FrontendController::class, 'login']);
    Route::get('/register', [FrontendController::class, 'showRegister'])->name('register');
    Route::post('/register', [FrontendController::class, 'register']);
});

// Rute Terproteksi Auth
Route::middleware('auth')->group(function () {
    Route::post('/logout', [FrontendController::class, 'logout'])->name('logout');
    
    // Pemesanan
    Route::get('/pesan/{id_room}', [FrontendController::class, 'showBooking'])->name('booking.create');
    Route::post('/pesan/{id_room}', [FrontendController::class, 'booking'])->name('booking.store');
    
    // Riwayat
    Route::get('/riwayat', [FrontendController::class, 'history'])->name('booking.history');
});
