@extends('layouts.app')
@section('title', 'Booking')
@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow-sm"><div class="card-header bg-white"><h5 class="mb-0"><i class="fas fa-calendar-check me-2"></i>Formulir Booking</h5></div><div class="card-body">
                @if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
                <form method="POST" action="{{ route('booking.store') }}">
                    @csrf <input type="hidden" name="paket_wisata_id" value="{{ $paketWisata->id }}">
                    <div class="mb-3"><label class="form-label">Tanggal Keberangkatan</label><input type="date" class="form-control" name="tanggal_keberangkatan" value="{{ old('tanggal_keberangkatan') }}" min="{{ date('Y-m-d', strtotime('+1 day')) }}" required></div>
                    <div class="mb-3"><label class="form-label">Jumlah Orang</label><input type="number" class="form-control" name="jumlah_orang" value="{{ old('jumlah_orang', 1) }}" min="1" max="{{ $paketWisata->stok }}" required><small class="text-muted">Maks {{ $paketWisata->stok }} orang</small></div>
                    <div class="mb-3"><label class="form-label">Catatan</label><textarea class="form-control" name="catatan" rows="3">{{ old('catatan') }}</textarea></div>
                    <button type="submit" class="btn btn-primary btn-lg w-100"><i class="fas fa-check me-2"></i>Booking Sekarang</button>
                </form>
            </div></div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm"><div class="card-body">
                <img src="{{ $paketWisata->foto ? asset('storage/'.$paketWisata->foto) : 'https://via.placeholder.com/400x200?text=Wisata' }}" class="img-fluid rounded mb-3" alt="">
                <h5>{{ $paketWisata->nama_paket }}</h5>
                <p class="text-muted"><i class="fas fa-map-marker-alt me-1"></i>{{ $paketWisata->destinasi }}</p>
                <hr><div class="d-flex justify-content-between"><span>Harga/orang:</span><strong>Rp {{ number_format($paketWisata->harga, 0, ',', '.') }}</strong></div>
            </div></div>
        </div>
    </div>
</div>
@endsection
