@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="container py-4">
    <div class="row mb-4">
        <div class="col-md-3 mb-3"><div class="card stats-card bg-primary"><div class="d-flex justify-content-between align-items-center"><div><p class="mb-1">Total Booking</p><h3 class="mb-0 stats-number">{{ $stats['total_booking'] }}</h3></div><i class="fas fa-calendar-check stats-icon"></i></div></div></div>
        <div class="col-md-3 mb-3"><div class="card stats-card bg-warning"><div class="d-flex justify-content-between align-items-center"><div><p class="mb-1">Pending</p><h3 class="mb-0 stats-number">{{ $stats['pending'] }}</h3></div><i class="fas fa-clock stats-icon"></i></div></div></div>
        <div class="col-md-3 mb-3"><div class="card stats-card bg-info"><div class="d-flex justify-content-between align-items-center"><div><p class="mb-1">Dikonfirmasi</p><h3 class="mb-0 stats-number">{{ $stats['dikonfirmasi'] }}</h3></div><i class="fas fa-check-circle stats-icon"></i></div></div></div>
        <div class="col-md-3 mb-3"><div class="card stats-card bg-success"><div class="d-flex justify-content-between align-items-center"><div><p class="mb-1">Selesai</p><h3 class="mb-0 stats-number">{{ $stats['selesai'] }}</h3></div><i class="fas fa-check-double stats-icon"></i></div></div></div>
    </div>
    <div class="card shadow-sm">
        <div class="card-header bg-white"><h5 class="mb-0"><i class="fas fa-history me-2"></i>Riwayat Booking</h5></div>
        <div class="card-body">
            @if($bookings->isEmpty())<div class="text-center py-4"><p class="text-muted">Belum ada booking.</p><a href="{{ route('paket.index') }}" class="btn btn-primary">Pesan Sekarang</a></div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead><tr><th>No</th><th>Paket</th><th>Tanggal</th><th>Jumlah</th><th>Total</th><th>Status</th><th>Aksi</th></tr></thead>
                        <tbody>@foreach($bookings as $b)<tr><td>{{ $loop->iteration }}</td><td>{{ $b->paketWisata->nama_paket }}</td><td>{{ $b->tanggal_keberangkatan->format('d/m/Y') }}</td><td>{{ $b->jumlah_orang }}</td><td>Rp {{ number_format($b->total_harga, 0, ',', '.') }}</td><td><span class="badge bg-{{ $b->status_badge }}">{{ ucfirst($b->status) }}</span></td><td><a href="{{ route('booking.show', $b) }}" class="btn btn-sm btn-outline-primary"><i class="fas fa-eye"></i></a></td></tr>@endforeach</tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
