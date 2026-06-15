<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $query = Booking::with(['user', 'paketWisata']);
        if ($request->status) $query->where('status', $request->status);
        if ($request->search) {
            $query->whereHas('user', function ($q) use ($request) { $q->where('name', 'like', "%{$request->search}%"); })
                ->orWhereHas('paketWisata', function ($q) use ($request) { $q->where('nama_paket', 'like', "%{$request->search}%"); });
        }
        return view('admin.booking.index', ['bookings' => $query->latest()->paginate(10)->withQueryString()]);
    }

    public function show(Booking $booking) { $booking->load(['user', 'paketWisata', 'pembayaran', 'review']); return view('admin.booking.show', compact('booking')); }

    public function confirm(Booking $booking)
    {
        if ($booking->status !== 'dibayar') return back()->with('error', 'Harus dibayar dulu.');
        $booking->update(['status' => 'dikonfirmasi']);
        return back()->with('success', 'Booking dikonfirmasi.');
    }

    public function complete(Booking $booking)
    {
        if ($booking->status !== 'dikonfirmasi') return back()->with('error', 'Harus dikonfirmasi dulu.');
        $booking->update(['status' => 'selesai']);
        return back()->with('success', 'Booking diselesaikan.');
    }

    public function cancel(Booking $booking)
    {
        if (in_array($booking->status, ['selesai', 'dibatalkan'])) return back()->with('error', 'Tidak bisa dibatalkan.');
        $booking->update(['status' => 'dibatalkan']);
        $booking->paketWisata->increment('stok', $booking->jumlah_orang);
        return back()->with('success', 'Booking dibatalkan.');
    }
}
