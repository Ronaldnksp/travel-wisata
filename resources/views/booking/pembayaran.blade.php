@extends('layouts.app')
@section('title', 'Pembayaran')
@section('content')
<div class="container py-4">
    <div class="row justify-content-center"><div class="col-md-8">
        <div class="card shadow-sm"><div class="card-header bg-white"><h5 class="mb-0">Pembayaran Booking #{{ $booking->id }}</h5></div><div class="card-body">
            <div class="alert alert-info"><strong>Paket:</strong> {{ $booking->paketWisata->nama_paket }} | <strong>Total:</strong> Rp {{ number_format($booking->total_harga, 0, ',', '.') }}</div>
            <form method="POST" action="{{ route('pembayaran.store', $booking) }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3"><label class="form-label">Jumlah Bayar</label><input type="number" class="form-control" name="jumlah_bayar" value="{{ $booking->total_harga }}" required></div>
                <div class="mb-3"><label class="form-label">Metode Bayar</label><select class="form-select" name="metode_bayar" required><option value="">Pilih</option><option>Transfer Bank BCA</option><option>Transfer Bank Mandiri</option><option>Transfer Bank BRI</option><option>E-Wallet GoPay</option><option>E-Wallet OVO</option></select></div>
                <div class="mb-3"><label class="form-label">Bukti Bayar</label><input type="file" class="form-control" name="bukti_bayar" accept="image/*" required><small class="text-muted">JPG/PNG, Maks 2MB</small></div>
                <button type="submit" class="btn btn-success btn-lg w-100"><i class="fas fa-paper-plane me-2"></i>Kirim Pembayaran</button>
            </form>
        </div></div>
    </div></div>
</div>
@endsection
