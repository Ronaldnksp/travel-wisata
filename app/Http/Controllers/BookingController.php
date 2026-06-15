<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaketWisata;
use App\Models\Booking;

class BookingController extends Controller
{
    public function create(PaketWisata $paketWisata)
    {
        if (!$paketWisata->isAvailable()) return redirect()->route('paket.show', $paketWisata)->with('error', 'Paket tidak tersedia.');
        return view('booking.create', compact('paketWisata'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'paket_wisata_id' => 'required|exists:paket_wisata,id','tanggal_keberangkatan' => 'required|date|after:today',
            'jumlah_orang' => 'required|integer|min:1|max:50','catatan' => 'nullable|string',
        ]);
        $paket = PaketWisata::findOrFail($validated['paket_wisata_id']);
        if ($validated['jumlah_orang'] > $paket->stok) return back()->with('error', 'Stok tidak cukup.');
        $validated['user_id'] = auth()->id();
        $validated['total_harga'] = $paket->harga * $validated['jumlah_orang'];
        $validated['status'] = 'pending';
        $booking = Booking::create($validated);
        $paket->decrement('stok', $validated['jumlah_orang']);
        return redirect()->route('booking.show', $booking)->with('success', 'Booking berhasil!');
    }

    public function show(Booking $booking)
    {
        if ($booking->user_id !== auth()->id()) abort(403);
        $booking->load(['paketWisata', 'pembayaran', 'review']);
        return view('booking.show', compact('booking'));
    }

    public function cancel(Booking $booking)
    {
        if ($booking->user_id !== auth()->id()) abort(403);
        if ($booking->status !== 'pending') return back()->with('error', 'Hanya booking pending yang bisa dibatalkan.');
        $booking->update(['status' => 'dibatalkan']);
        $booking->paketWisata->increment('stok', $booking->jumlah_orang);
        return back()->with('success', 'Booking dibatalkan.');
    }
}
