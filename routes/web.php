<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PaketWisataController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\PembayaranController as AdminPembayaranController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/paket', [PaketController::class, 'index'])->name('paket.index');
Route::get('/paket/{paketWisata}', [PaketController::class, 'show'])->name('paket.show');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/booking/{paketWisata}', [BookingController::class, 'create'])->name('booking.create');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
    Route::get('/booking/{booking}/detail', [BookingController::class, 'show'])->name('booking.show');
    Route::post('/booking/{booking}/cancel', [BookingController::class, 'cancel'])->name('booking.cancel');
    Route::get('/booking/{booking}/bayar', [PembayaranController::class, 'create'])->name('pembayaran.create');
    Route::post('/booking/{booking}/bayar', [PembayaranController::class, 'store'])->name('pembayaran.store');
    Route::get('/booking/{booking}/review', [ReviewController::class, 'create'])->name('review.create');
    Route::post('/booking/{booking}/review', [ReviewController::class, 'store'])->name('review.store');
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('paket', PaketWisataController::class)->except(['show']);
    Route::get('/booking', [AdminBookingController::class, 'index'])->name('booking.index');
    Route::get('/booking/{booking}', [AdminBookingController::class, 'show'])->name('booking.show');
    Route::post('/booking/{booking}/confirm', [AdminBookingController::class, 'confirm'])->name('booking.confirm');
    Route::post('/booking/{booking}/complete', [AdminBookingController::class, 'complete'])->name('booking.complete');
    Route::post('/booking/{booking}/cancel', [AdminBookingController::class, 'cancel'])->name('booking.cancel');
    Route::get('/pembayaran', [AdminPembayaranController::class, 'index'])->name('pembayaran.index');
    Route::post('/pembayaran/{pembayaran}/verify', [AdminPembayaranController::class, 'verify'])->name('pembayaran.verify');
    Route::post('/pembayaran/{pembayaran}/reject', [AdminPembayaranController::class, 'reject'])->name('pembayaran.reject');
});
