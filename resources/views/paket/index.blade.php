@extends('layouts.app')
@section('title', 'Paket Wisata')
@section('content')
<div class="container py-4">
    <h2 class="fw-bold mb-4">Paket Wisata</h2>
    <div class="card mb-4 shadow-sm"><div class="card-body"><form method="GET" action="{{ route('paket.index') }}"><div class="row g-3"><div class="col-md-4"><input type="text" class="form-control" name="search" placeholder="Cari paket..." value="{{ request('search') }}"></div><div class="col-md-3"><select class="form-select" name="kategori"><option value="">Semua Kategori</option>@foreach($kategoriList as $k)<option value="{{ $k }}" {{ request('kategori') == $k ? 'selected' : '' }}>{{ ucfirst($k) }}</option>@endforeach</select></div><div class="col-md-2"><button type="submit" class="btn btn-primary w-100"><i class="fas fa-search me-1"></i>Cari</button></div><div class="col-md-2"><a href="{{ route('paket.index') }}" class="btn btn-outline-secondary w-100">Reset</a></div></div></form></div></div>
    <div class="row">
        @forelse($paketWisata as $paket)
            <div class="col-md-4 mb-4">
                <div class="card card-paket h-100 shadow-sm">
                    <img src="{{ $paket->foto ? asset('storage/'.$paket->foto) : 'https://via.placeholder.com/400x200?text=Wisata' }}" class="card-img-top" alt="{{ $paket->nama_paket }}">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2"><h5 class="card-title mb-0">{{ $paket->nama_paket }}</h5><span class="badge bg-primary">{{ ucfirst($paket->kategori) }}</span></div>
                        <p class="text-muted small"><i class="fas fa-map-marker-alt me-1"></i>{{ $paket->destinasi }}</p>
                        <p class="card-text">{{ Str::limit($paket->deskripsi, 80) }}</p>
                        <div class="d-flex justify-content-between align-items-center mb-2"><span class="harga">Rp {{ number_format($paket->harga, 0, ',', '.') }}</span><small class="text-muted">{{ $paket->durasi_hari }} Hari</small></div>
                        <div class="d-flex justify-content-between align-items-center"><span class="badge {{ $paket->isAvailable() ? 'bg-success' : 'bg-danger' }}">{{ $paket->isAvailable() ? 'Tersedia' : 'Penuh' }}</span></div>
                    </div>
                    <div class="card-footer bg-white border-0 pb-3"><a href="{{ route('paket.show', $paket) }}" class="btn btn-primary w-100">Lihat Detail</a></div>
                </div>
            </div>
        @empty <div class="col-12 text-center py-5"><p class="text-muted">Tidak ada paket wisata ditemukan.</p></div>
        @endforelse
    </div>
    <div class="d-flex justify-content-center">{{ $paketWisata->links() }}</div>
</div>
@endsection
