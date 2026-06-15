<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Review;

class ReviewController extends Controller
{
    public function create(Booking $booking)
    {
        if ($booking->user_id !== auth()->id() || $booking->status !== 'selesai') abort(403);
        if ($booking->review) return redirect()->route('booking.show', $booking)->with('error', 'Sudah memberikan review.');
        $booking->load('paketWisata');
        return view('review.create', compact('booking'));
    }

    public function store(Request $request, Booking $booking)
    {
        if ($booking->user_id !== auth()->id() || $booking->status !== 'selesai') abort(403);
        $validated = $request->validate(['rating' => 'required|integer|min:1|max:5','komentar' => 'required|string']);
        $validated['user_id'] = auth()->id();
        $validated['paket_wisata_id'] = $booking->paket_wisata_id;
        $validated['booking_id'] = $booking->id;
        Review::create($validated);
        return redirect()->route('booking.show', $booking)->with('success', 'Review berhasil!');
    }
}
