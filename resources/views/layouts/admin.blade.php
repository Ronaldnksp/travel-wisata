<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin - @yield('title', 'Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div class="d-flex">
        <div class="sidebar bg-dark text-white" style="width:250px;min-height:100vh;">
            <div class="p-3">
                <h5 class="text-center mb-4"><i class="fas fa-mountain-sun me-2"></i>Travel Wisata</h5>
                <hr class="text-secondary">
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link text-white {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link text-white {{ request()->routeIs('admin.paket.*') ? 'active' : '' }}" href="{{ route('admin.paket.index') }}"><i class="fas fa-map-marked-alt me-2"></i>Paket Wisata</a></li>
                    <li class="nav-item"><a class="nav-link text-white {{ request()->routeIs('admin.booking.*') ? 'active' : '' }}" href="{{ route('admin.booking.index') }}"><i class="fas fa-calendar-check me-2"></i>Booking</a></li>
                    <li class="nav-item"><a class="nav-link text-white {{ request()->routeIs('admin.pembayaran.*') ? 'active' : '' }}" href="{{ route('admin.pembayaran.index') }}"><i class="fas fa-credit-card me-2"></i>Pembayaran</a></li>
                    <li class="nav-item mt-3"><a class="nav-link text-white" href="{{ route('home') }}"><i class="fas fa-home me-2"></i>Lihat Website</a></li>
                    <li class="nav-item"><form action="{{ route('logout') }}" method="POST">@csrf<button type="submit" class="nav-link text-white border-0 bg-transparent text-start w-100"><i class="fas fa-sign-out-alt me-2"></i>Logout</button></form></li>
                </ul>
            </div>
        </div>
        <div class="flex-grow-1">
            <div class="bg-primary text-white p-3"><h4 class="mb-0">@yield('title', 'Dashboard')</h4></div>
            <div class="p-4">
                @if(session('success'))<div class="alert alert-success alert-dismissible fade show">{{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>@endif
                @if(session('error'))<div class="alert alert-danger alert-dismissible fade show">{{ session('error') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>@endif
                @yield('content')
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
