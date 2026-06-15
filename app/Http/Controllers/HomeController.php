<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaketWisata;
use App\Models\Booking;

class HomeController extends Controller
{
    public function index()
    {
        $paketWisata = PaketWisata::where('status', 'aktif')->with('reviews')->latest()->take(6)->get();
        return view('home.index', compact('paketWisata'));
    }

    public function dashboard()
    {
        $user = auth()->user();
        $bookings = Booking::where('user_id', $user->id)->with('paketWisata')->latest()->get();
        $stats = [
            'total_booking' => Booking::where('user_id', $user->id)->count(),
            'pending' => Booking::where('user_id', $user->id)->where('status', 'pending')->count(),
            'dikonfirmasi' => Booking::where('user_id', $user->id)->where('status', 'dikonfirmasi')->count(),
            'selesai' => Booking::where('user_id', $user->id)->where('status', 'selesai')->count(),
        ];
        return view('home.dashboard', compact('bookings', 'stats'));
    }
}
