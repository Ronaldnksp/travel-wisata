@extends('layouts.app')
@section('title', 'Login')
@section('content')
<div class="container py-5">
    <div class="card auth-card mx-auto">
        <div class="card-body p-5">
            <div class="text-center mb-4"><i class="fas fa-mountain-sun fa-3x text-primary mb-3"></i><h3 class="fw-bold">Login</h3><p class="text-muted">Masuk ke akun Anda</p></div>
            @if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3"><label class="form-label">Email</label><input type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus></div>
                <div class="mb-3"><label class="form-label">Password</label><input type="password" class="form-control" name="password" required></div>
                <button type="submit" class="btn btn-primary w-100 mb-3"><i class="fas fa-sign-in-alt me-2"></i>Login</button>
                <p class="text-center mb-0">Belum punya akun? <a href="{{ route('register') }}" class="text-decoration-none">Daftar sekarang</a></p>
            </form>
        </div>
    </div>
</div>
@endsection
