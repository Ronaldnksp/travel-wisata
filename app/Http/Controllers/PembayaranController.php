<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Pembayaran;

class PembayaranController extends Controller
{
    public function create(Booking $booking)
    {
        if ($booking->user_id !== auth()->id() || $booking->status !== 'pending') abort(403);
        $booking->load('paketWisata');
        return view('booking.pembayaran', compact('booking'));
    }

    public function store(Request $request, Booking $booking)
    {
        if ($booking->user_id !== auth()->id() || $booking->status !== 'pending') abort(403);
        $validated = $request->validate([
            'jumlah_bayar' => 'required|numeric|min:0','metode_bayar' => 'required|string',
            'bukti_bayar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        $validated['booking_id'] = $booking->id;
        $validated['status'] = 'pending';
        if ($request->hasFile('bukti_bayar')) $validated['bukti_bayar'] = $request->file('bukti_bayar')->store('bukti_bayar', 'public');
        Pembayaran::create($validated);
        $booking->update(['status' => 'dibayar']);
        return redirect()->route('booking.show', $booking)->with('success', 'Pembayaran berhasil dikirim.');
    }
}
