@extends('layouts.app')
@section('title', $paketWisata->nama_paket)
@section('content')
<div class="container py-4">
    <nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li><li class="breadcrumb-item"><a href="{{ route('paket.index') }}">Paket Wisata</a></li><li class="breadcrumb-item active">{{ $paketWisata->nama_paket }}</li></ol></nav>
    <div class="row">
        <div class="col-md-7"><img src="{{ $paketWisata->foto ? asset('storage/'.$paketWisata->foto) : 'https://via.placeholder.com/800x400?text=Wisata' }}" class="img-fluid rounded shadow-sm detail-hero w-100" alt="{{ $paketWisata->nama_paket }}"></div>
        <div class="col-md-5">
            <div class="card shadow-sm"><div class="card-body">
                <span class="badge bg-primary mb-2">{{ ucfirst($paketWisata->kategori) }}</span>
                <h3 class="fw-bold">{{ $paketWisata->nama_paket }}</h3>
                <p class="text-muted"><i class="fas fa-map-marker-alt me-1"></i>{{ $paketWisata->destinasi }}</p>
                <h4 class="text-primary fw-bold">Rp {{ number_format($paketWisata->harga, 0, ',', '.') }}<small class="text-muted">/orang</small></h4>
                <div class="d-flex align-items-center my-3"><i class="fas fa-calendar-alt me-3 text-primary"></i><div><strong>Durasi:</strong> {{ $paketWisata->durasi_hari }} Hari</div></div>
                <div class="d-flex align-items-center mb-3"><i class="fas fa-users me-3 text-primary"></i><div><strong>Stok:</strong> <span class="badge {{ $paketWisata->stok > 0 ? 'bg-success' : 'bg-danger' }}">{{ $paketWisata->stok }}</span></div></div>
                @if($paketWisata->isAvailable())<a href="{{ route('booking.create', $paketWisata) }}" class="btn btn-primary w-100 btn-lg mt-3"><i class="fas fa-shopping-cart me-2"></i>Pesan Sekarang</a>
                @else<button class="btn btn-secondary w-100 btn-lg mt-3" disabled>Tidak Tersedia</button>@endif
            </div></div>
        </div>
    </div>
    <div class="card mt-4 shadow-sm"><div class="card-header bg-white"><h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>Deskripsi</h5></div><div class="card-body"><p>{{ $paketWisata->deskripsi }}</p></div></div>
    <div class="card mt-4 shadow-sm"><div class="card-header bg-white"><h5 class="mb-0"><i class="fas fa-comments me-2"></i>Ulasan ({{ $paketWisata->total_reviews }})</h5></div><div class="card-body">
        @forelse($paketWisata->reviews as $r)
            <div class="d-flex mb-3 {{ !$loop->last ? 'border-bottom pb-3' : '' }}">
                <div class="flex-shrink-0"><div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width:45px;height:45px;">{{ substr($r->user->name, 0, 1) }}</div></div>
                <div class="flex-grow-1 ms-3"><div class="d-flex justify-content-between"><h6 class="mb-0">{{ $r->user->name }}</h6><small class="text-muted">{{ $r->created_at->diffForHumans() }}</small></div>
                <div class="rating-stars mb-1">@for($i=1;$i<=5;$i++)<i class="fas fa-star {{ $i <= $r->rating ? '' : 'far' }}" style="font-size:.8rem;"></i>@endfor</div>
                <p class="mb-0">{{ $r->komentar }}</p></div>
            </div>
        @empty <p class="text-muted text-center">Belum ada ulasan.</p>@endforelse
    </div></div>
</div>
@endsection
