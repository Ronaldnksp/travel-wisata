@extends('layouts.admin')
@section('title', 'Booking #'.$booking->id)
@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card shadow-sm mb-4"><div class="card-header bg-white d-flex justify-content-between"><h5 class="mb-0">Booking #{{ $booking->id }}</h5><span class="badge bg-{{ $booking->status_badge }} fs-6">{{ ucfirst($booking->status) }}</span></div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6"><h6 class="text-muted">User</h6><p><strong>{{ $booking->user->name }}</strong></p><p class="text-muted small">{{ $booking->user->email }}</p></div>
                <div class="col-md-6"><h6 class="text-muted">Paket</h6><p><strong>{{ $booking->paketWisata->nama_paket }}</strong></p></div>
                <div class="col-md-6"><h6 class="text-muted">Tanggal</h6><p>{{ $booking->tanggal_keberangkatan->format('d F Y') }}</p></div>
                <div class="col-md-6"><h6 class="text-muted">Total</h6><p class="fs-4 fw-bold text-primary">Rp {{ number_format($booking->total_harga,0,',','.') }}</p></div>
            </div>
            <div class="mt-3">
                @if($booking->status==='dibayar')<form method="POST" action="{{ route('admin.booking.confirm',$booking) }}" class="d-inline">@csrf<button class="btn btn-success"><i class="fas fa-check me-2"></i>Konfirmasi</button></form>@endif
                @if($booking->status==='dikonfirmasi')<form method="POST" action="{{ route('admin.booking.complete',$booking) }}" class="d-inline">@csrf<button class="btn btn-primary"><i class="fas fa-check-double me-2"></i>Selesaikan</button></form>@endif
                @if(!in_array($booking->status,['selesai','dibatalkan']))<form method="POST" action="{{ route('admin.booking.cancel',$booking) }}" class="d-inline" onsubmit="return confirm('Yakin?')">@csrf<button class="btn btn-danger"><i class="fas fa-times me-2"></i>Batalkan</button></form>@endif
            </div>
        </div></div>
    </div>
    <div class="col-lg-4">
        <div class="card shadow-sm"><div class="card-body text-center"><img src="{{ $booking->paketWisata->foto ? asset('storage/'.$booking->paketWisata->foto) : 'https://via.placeholder.com/400x200?text=Wisata' }}" class="img-fluid rounded mb-3" alt=""><h5>{{ $booking->paketWisata->nama_paket }}</h5><p class="text-muted">{{ $booking->paketWisata->destinasi }}</p></div></div>
    </div>
</div>
@endsection
