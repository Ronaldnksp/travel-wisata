<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Booking, PaketWisata, User, Pembayaran};

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_booking' => Booking::count(),'pending' => Booking::where('status', 'pending')->count(),
            'dibayar' => Booking::where('status', 'dibayar')->count(),'selesai' => Booking::where('status', 'selesai')->count(),
            'total_paket' => PaketWisata::count(),'total_user' => User::where('role', 'user')->count(),
            'total_pendapatan' => Pembayaran::where('status', 'diverifikasi')->sum('jumlah_bayar'),
        ];
        $recentBookings = Booking::with(['user', 'paketWisata'])->latest()->take(10)->get();
        $pendingPayments = Pembayaran::where('status', 'pending')->with(['booking' => function ($q) { $q->with('user'); }])->latest()->take(5)->get();
        $popularPackages = PaketWisata::withCount('bookings')->orderByDesc('bookings_count')->take(5)->get();
        return view('admin.dashboard', compact('stats', 'recentBookings', 'pendingPayments', 'popularPackages'));
    }
}
