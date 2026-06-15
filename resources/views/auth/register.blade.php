@extends('layouts.app')
@section('title', 'Register')
@section('content')
<div class="container py-5">
    <div class="card auth-card mx-auto">
        <div class="card-body p-5">
            <div class="text-center mb-4"><i class="fas fa-mountain-sun fa-3x text-primary mb-3"></i><h3 class="fw-bold">Register</h3><p class="text-muted">Buat akun baru</p></div>
            @if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-3"><label class="form-label">Nama Lengkap</label><input type="text" class="form-control" name="name" value="{{ old('name') }}" required></div>
                <div class="mb-3"><label class="form-label">Email</label><input type="email" class="form-control" name="email" value="{{ old('email') }}" required></div>
                <div class="mb-3"><label class="form-label">No. Telepon</label><input type="text" class="form-control" name="phone" value="{{ old('phone') }}"></div>
                <div class="mb-3"><label class="form-label">Password</label><input type="password" class="form-control" name="password" minlength="6" required></div>
                <div class="mb-3"><label class="form-label">Konfirmasi Password</label><input type="password" class="form-control" name="password_confirmation" required></div>
                <button type="submit" class="btn btn-primary w-100 mb-3"><i class="fas fa-user-plus me-2"></i>Register</button>
                <p class="text-center mb-0">Sudah punya akun? <a href="{{ route('login') }}" class="text-decoration-none">Login</a></p>
            </form>
        </div>
    </div>
</div>
@endsection
