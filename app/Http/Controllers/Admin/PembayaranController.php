<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pembayaran;

class PembayaranController extends Controller
{
    public function index(Request $request)
    {
        $query = Pembayaran::with(['booking' => function ($q) { $q->with(['user', 'paketWisata']); }]);
        if ($request->status) $query->where('status', $request->status);
        return view('admin.pembayaran.index', ['pembayarans' => $query->latest()->paginate(10)->withQueryString()]);
    }

    public function verify(Pembayaran $pembayaran)
    {
        $pembayaran->update(['status' => 'diverifikasi']);
        $pembayaran->booking->update(['status' => 'dikonfirmasi']);
        return back()->with('success', 'Pembayaran diverifikasi.');
    }

    public function reject(Pembayaran $pembayaran)
    {
        $pembayaran->update(['status' => 'ditolak']);
        $pembayaran->booking->update(['status' => 'pending']);
        return back()->with('success', 'Pembayaran ditolak.');
    }
}
