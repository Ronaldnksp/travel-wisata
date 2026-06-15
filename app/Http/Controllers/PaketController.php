<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaketWisata;

class PaketController extends Controller
{
    public function index(Request $request)
    {
        $query = PaketWisata::where('status', 'aktif')->with('reviews');
        if ($request->kategori) $query->where('kategori', $request->kategori);
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('nama_paket', 'like', "%{$request->search}%")->orWhere('destinasi', 'like', "%{$request->search}%");
            });
        }
        $paketWisata = $query->latest()->paginate(9)->withQueryString();
        $kategoriList = ['pantai', 'gunung', 'budaya', 'kuliner', 'petualangan', 'lainnya'];
        return view('paket.index', compact('paketWisata', 'kategoriList'));
    }

    public function show(PaketWisata $paketWisata)
    {
        $paketWisata->load(['reviews' => function ($q) { $q->with('user')->latest(); }]);
        $relatedPaket = PaketWisata::where('kategori', $paketWisata->kategori)->where('id', '!=', $paketWisata->id)->where('status', 'aktif')->take(3)->get();
        return view('paket.show', compact('paketWisata', 'relatedPaket'));
    }
}
