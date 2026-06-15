<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaketWisata;
use Illuminate\Support\Facades\Storage;

class PaketWisataController extends Controller
{
    public function index() { return view('admin.paket.index', ['paketWisata' => PaketWisata::latest()->paginate(10)]); }
    public function create() { return view('admin.paket.create'); }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_paket' => 'required|string|max:255','deskripsi' => 'required|string','destinasi' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0','durasi_hari' => 'required|integer|min:1','foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'kategori' => 'required|in:pantai,gunung,budaya,kuliner,petualangan,lainnya','stok' => 'required|integer|min:0','status' => 'required|in:aktif,nonaktif',
        ]);
        if ($request->hasFile('foto')) $validated['foto'] = $request->file('foto')->store('wisata', 'public');
        PaketWisata::create($validated);
        return redirect()->route('admin.paket.index')->with('success', 'Paket berhasil ditambahkan.');
    }

    public function edit(PaketWisata $paket) { return view('admin.paket.edit', compact('paket')); }

    public function update(Request $request, PaketWisata $paket)
    {
        $validated = $request->validate([
            'nama_paket' => 'required|string|max:255','deskripsi' => 'required|string','destinasi' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0','durasi_hari' => 'required|integer|min:1','foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'kategori' => 'required|in:pantai,gunung,budaya,kuliner,petualangan,lainnya','stok' => 'required|integer|min:0','status' => 'required|in:aktif,nonaktif',
        ]);
        if ($request->hasFile('foto')) {
            if ($paket->foto) Storage::disk('public')->delete($paket->foto);
            $validated['foto'] = $request->file('foto')->store('wisata', 'public');
        }
        $paket->update($validated);
        return redirect()->route('admin.paket.index')->with('success', 'Paket berhasil diperbarui.');
    }

    public function destroy(PaketWisata $paket)
    {
        if ($paket->foto) Storage::disk('public')->delete($paket->foto);
        $paket->delete();
        return redirect()->route('admin.paket.index')->with('success', 'Paket berhasil dihapus.');
    }
}
