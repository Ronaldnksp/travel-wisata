@extends('layouts.admin')
@section('title', 'Dashboard Admin')
@section('content')
<div class="row mb-4">
    <div class="col-md-3 mb-3"><div class="card stats-card bg-primary"><div class="d-flex justify-content-between align-items-center"><div><p class="mb-1">Total Booking</p><h3 class="mb-0 stats-number">{{ $stats['total_booking'] }}</h3></div><i class="fas fa-calendar-check stats-icon"></i></div></div></div>
    <div class="col-md-3 mb-3"><div class="card stats-card bg-warning"><div class="d-flex justify-content-between align-items-center"><div><p class="mb-1">Pending</p><h3 class="mb-0 stats-number">{{ $stats['pending'] }}</h3></div><i class="fas fa-clock stats-icon"></i></div></div></div>
    <div class="col-md-3 mb-3"><div class="card stats-card bg-info"><div class="d-flex justify-content-between align-items-center"><div><p class="mb-1">Dibayar</p><h3 class="mb-0 stats-number">{{ $stats['dibayar'] }}</h3></div><i class="fas fa-credit-card stats-icon"></i></div></div></div>
    <div class="col-md-3 mb-3"><div class="card stats-card bg-success"><div class="d-flex justify-content-between align-items-center"><div><p class="mb-1">Pendapatan</p><h3 class="mb-0 stats-number">Rp {{ number_format($stats['total_pendapatan'], 0, ',', '.') }}</h3></div><i class="fas fa-money-bill-wave stats-icon"></i></div></div></div>
</div>
<div class="row">
    <div class="col-lg-8 mb-4">
        <div class="card shadow-sm"><div class="card-header bg-white d-flex justify-content-between"><h5 class="mb-0">Booking Terbaru</h5><a href="{{ route('admin.booking.index') }}" class="btn btn-sm btn-outline-primary">Lihat Semua</a></div>
        <div class="card-body"><div class="table-responsive"><table class="table table-hover table-sm"><thead><tr><th>User</th><th>Paket</th><th>Total</th><th>Status</th></tr></thead><tbody>@forelse($recentBookings as $b)<tr><td>{{ $b->user->name }}</td><td>{{ $b->paketWisata->nama_paket }}</td><td>Rp {{ number_format($b->total_harga, 0, ',', '.') }}</td><td><span class="badge bg-{{ $b->status_badge }}">{{ ucfirst($b->status) }}</span></td></tr>@empty<tr><td colspan="4" class="text-center">Belum ada booking</td></tr>@endforelse</tbody></table></div></div></div>
    </div>
    <div class="col-lg-4">
        <div class="card shadow-sm mb-4"><div class="card-header bg-white"><h5 class="mb-0">Pembayaran Pending</h5></div><div class="card-body">@forelse($pendingPayments as $p)<div class="d-flex justify-content-between align-items-center mb-2 {{ !$loop->last ? 'border-bottom pb-2' : '' }}"><div><strong>{{ $p->booking->user->name }}</strong><br><small class="text-muted">Rp {{ number_format($p->jumlah_bayar, 0, ',', '.') }}</small></div></div>@empty<p class="text-muted text-center">Tidak ada</p>@endforelse</div></div>
        <div class="card shadow-sm"><div class="card-header bg-white"><h5 class="mb-0">Paket Populer</h5></div><div class="card-body">@forelse($popularPackages as $p)<div class="d-flex justify-content-between align-items-center mb-2 {{ !$loop->last ? 'border-bottom pb-2' : '' }}"><div><strong>{{ $p->nama_paket }}</strong></div><span class="badge bg-primary">{{ $p->bookings_count }}</span></div>@empty<p class="text-muted text-center">Belum ada</p>@endforelse</div></div>
    </div>
</div>
@endsection
