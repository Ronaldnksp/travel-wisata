@extends('layouts.app')
@section('title', 'Detail Booking')
@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow-sm"><div class="card-header bg-white d-flex justify-content-between align-items-center"><h5 class="mb-0">Booking #{{ $booking->id }}</h5><span class="badge bg-{{ $booking->status_badge }} fs-6">{{ ucfirst($booking->status) }}</span></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6"><h6 class="text-muted">Paket</h6><p class="fw-bold">{{ $booking->paketWisata->nama_paket }}</p></div>
                    <div class="col-md-6"><h6 class="text-muted">Destinasi</h6><p>{{ $booking->paketWisata->destinasi }}</p></div>
                    <div class="col-md-6"><h6 class="text-muted">Tanggal</h6><p>{{ $booking->tanggal_keberangkatan->format('d F Y') }}</p></div>
                    <div class="col-md-6"><h6 class="text-muted">Jumlah</h6><p>{{ $booking->jumlah_orang }} orang</p></div>
                    <div class="col-md-6"><h6 class="text-muted">Total</h6><p class="fs-4 fw-bold text-primary">Rp {{ number_format($booking->total_harga, 0, ',', '.') }}</p></div>
                </div>
                @if($booking->status === 'pending')
                    <div class="mt-3"><a href="{{ route('pembayaran.create', $booking) }}" class="btn btn-success"><i class="fas fa-credit-card me-2"></i>Bayar</a>
                    <form method="POST" action="{{ route('booking.cancel', $booking) }}" class="d-inline" onsubmit="return confirm('Yakin?')">@csrf<button type="submit" class="btn btn-danger"><i class="fas fa-times me-2"></i>Batalkan</button></form></div>
                @endif
            </div></div>
            @if($booking->pembayaran)
                <div class="card shadow-sm mt-3"><div class="card-header bg-white"><h5 class="mb-0">Pembayaran</h5></div><div class="card-body">
                    <p><strong>Jumlah:</strong> Rp {{ number_format($booking->pembayaran->jumlah_bayar, 0, ',', '.') }}</p>
                    <p><strong>Metode:</strong> {{ $booking->pembayaran->metode_bayar }}</p>
                    <p><strong>Status:</strong> <span class="badge bg-{{ $booking->pembayaran->status === 'diverifikasi' ? 'success' : 'warning' }}">{{ ucfirst($booking->pembayaran->status) }}</span></p>
                </div></div>
            @endif
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm"><div class="card-body text-center">
                <img src="{{ $booking->paketWisata->foto ? asset('storage/'.$booking->paketWisata->foto) : 'https://via.placeholder.com/400x200?text=Wisata' }}" class="img-fluid rounded mb-3" alt="">
                <h5>{{ $booking->paketWisata->nama_paket }}</h5>
                <p class="text-muted">{{ $booking->paketWisata->destinasi }}</p>
            </div></div>
            @if($booking->status === 'selesai' && !$booking->review)
                <div class="card shadow-sm mt-3"><div class="card-body text-center"><i class="fas fa-star fa-3x text-warning mb-3"></i><h5>Beri Ulasan</h5><a href="{{ route('review.create', $booking) }}" class="btn btn-warning"><i class="fas fa-pen me-2"></i>Tulis Review</a></div></div>
            @endif
            @if($booking->review)
                <div class="card shadow-sm mt-3"><div class="card-header bg-white"><h6 class="mb-0">Ulasan Anda</h6></div><div class="card-body"><div class="rating-stars mb-2">@for($i=1;$i<=5;$i++)<i class="fas fa-star {{ $i <= $booking->review->rating ? '' : 'far' }}"></i>@endfor</div><p class="mb-0">{{ $booking->review->komentar }}</p></div></div>
            @endif
        </div>
    </div>
</div>
@endsection
