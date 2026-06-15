@extends('layouts.app')
@section('title', 'Beranda - Travel Wisata')
@section('content')
<section class="hero-section text-center">
    <div class="container"><h1>Jelajahi Keindahan Indonesia</h1><p class="lead mb-4">Temukan paket wisata terbaik untuk petualangan Anda</p><a href="{{ route('paket.index') }}" class="btn btn-light btn-lg px-5"><i class="fas fa-search me-2"></i>Lihat Paket Wisata</a></div>
</section>
<section class="py-5 bg-white">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3 col-6 mb-3"><div class="p-3"><i class="fas fa-map-marked-alt fa-3x text-primary mb-3"></i><h3 class="fw-bold">{{ $paketWisata->count() }}+</h3><p class="text-muted mb-0">Paket Wisata</p></div></div>
            <div class="col-md-3 col-6 mb-3"><div class="p-3"><i class="fas fa-map-pin fa-3x text-success mb-3"></i><h3 class="fw-bold">50+</h3><p class="text-muted mb-0">Destinasi</p></div></div>
            <div class="col-md-3 col-6 mb-3"><div class="p-3"><i class="fas fa-users fa-3x text-warning mb-3"></i><h3 class="fw-bold">1000+</h3><p class="text-muted mb-0">Wisatawan</p></div></div>
            <div class="col-md-3 col-6 mb-3"><div class="p-3"><i class="fas fa-star fa-3x text-danger mb-3"></i><h3 class="fw-bold">4.8</h3><p class="text-muted mb-0">Rating</p></div></div>
        </div>
    </div>
</section>
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5"><h2 class="fw-bold">Paket Wisata Terbaru</h2><p class="text-muted">Pilihan paket wisata terbaik untuk Anda</p></div>
        <div class="row">
            @forelse($paketWisata as $paket)
                <div class="col-md-4 mb-4">
                    <div class="card card-paket h-100 shadow-sm">
                        <img src="{{ $paket->foto ? asset('storage/'.$paket->foto) : 'https://via.placeholder.com/400x200?text=Wisata' }}" class="card-img-top" alt="{{ $paket->nama_paket }}">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-2"><h5 class="card-title mb-0">{{ $paket->nama_paket }}</h5><span class="badge bg-primary">{{ ucfirst($paket->kategori) }}</span></div>
                            <p class="text-muted small"><i class="fas fa-map-marker-alt me-1"></i>{{ $paket->destinasi }}</p>
                            <p class="card-text">{{ Str::limit($paket->deskripsi, 80) }}</p>
                            <div class="d-flex justify-content-between align-items-center"><span class="harga">Rp {{ number_format($paket->harga, 0, ',', '.') }}</span><small class="text-muted">{{ $paket->durasi_hari }} Hari</small></div>
                        </div>
                        <div class="card-footer bg-white border-0 pb-3"><a href="{{ route('paket.show', $paket) }}" class="btn btn-outline-primary w-100">Lihat Detail</a></div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5"><i class="fas fa-inbox fa-3x text-muted mb-3"></i><p class="text-muted">Belum ada paket wisata tersedia.</p></div>
            @endforelse
        </div>
        @if($paketWisata->count() > 0)<div class="text-center mt-4"><a href="{{ route('paket.index') }}" class="btn btn-primary btn-lg">Lihat Semua Paket <i class="fas fa-arrow-right ms-2"></i></a></div>@endif
    </div>
</section>
<section class="py-5 bg-white">
    <div class="container">
        <div class="text-center mb-5"><h2 class="fw-bold">Mengapa Memilih Kami?</h2></div>
        <div class="row">
            <div class="col-md-4 mb-4 text-center"><div class="p-4"><i class="fas fa-shield-alt fa-3x text-primary mb-3"></i><h5>Terpercaya</h5><p class="text-muted">Sudah melayani ribuan wisatawan</p></div></div>
            <div class="col-md-4 mb-4 text-center"><div class="p-4"><i class="fas fa-hand-holding-usd fa-3x text-success mb-3"></i><h5>Harga Terjangkau</h5><p class="text-muted">Harga kompetitif dengan fasilitas lengkap</p></div></div>
            <div class="col-md-4 mb-4 text-center"><div class="p-4"><i class="fas fa-headset fa-3x text-warning mb-3"></i><h5>Customer Service 24/7</h5><p class="text-muted">Siap membantu Anda kapan saja</p></div></div>
        </div>
    </div>
</section>
@endsection
