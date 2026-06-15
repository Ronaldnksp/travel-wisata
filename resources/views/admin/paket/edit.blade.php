@extends('layouts.admin')
@section('title', 'Edit Paket')
@section('content')
<div class="row justify-content-center"><div class="col-lg-8"><div class="card shadow-sm"><div class="card-header bg-white"><h5 class="mb-0">Edit Paket Wisata</h5></div><div class="card-body">
    @if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
    <form method="POST" action="{{ route('admin.paket.update',$paket) }}" enctype="multipart/form-data">@csrf @method('PUT')
        <div class="row">
            <div class="col-md-6 mb-3"><label class="form-label">Nama Paket</label><input type="text" class="form-control" name="nama_paket" value="{{ old('nama_paket',$paket->nama_paket) }}" required></div>
            <div class="col-md-6 mb-3"><label class="form-label">Destinasi</label><input type="text" class="form-control" name="destinasi" value="{{ old('destinasi',$paket->destinasi) }}" required></div>
            <div class="col-md-6 mb-3"><label class="form-label">Kategori</label><select class="form-select" name="kategori" required>@foreach(['pantai','gunung','budaya','kuliner','petualangan','lainnya'] as $k)<option value="{{ $k }}" {{ old('kategori',$paket->kategori)==$k?'selected':'' }}>{{ ucfirst($k) }}</option>@endforeach</select></div>
            <div class="col-md-3 mb-3"><label class="form-label">Harga</label><input type="number" class="form-control" name="harga" value="{{ old('harga',$paket->harga) }}" required></div>
            <div class="col-md-3 mb-3"><label class="form-label">Durasi</label><input type="number" class="form-control" name="durasi_hari" value="{{ old('durasi_hari',$paket->durasi_hari) }}" required></div>
            <div class="col-md-6 mb-3"><label class="form-label">Stok</label><input type="number" class="form-control" name="stok" value="{{ old('stok',$paket->stok) }}" required></div>
            <div class="col-md-6 mb-3"><label class="form-label">Status</label><select class="form-select" name="status" required><option value="aktif" {{ old('status',$paket->status)==='aktif'?'selected':'' }}>Aktif</option><option value="nonaktif" {{ old('status',$paket->status)==='nonaktif'?'selected':'' }}>Nonaktif</option></select></div>
            <div class="col-12 mb-3"><label class="form-label">Deskripsi</label><textarea class="form-control" name="deskripsi" rows="4" required>{{ old('deskripsi',$paket->deskripsi) }}</textarea></div>
            <div class="col-12 mb-3"><label class="form-label">Foto</label>@if($paket->foto)<div class="mb-2"><img src="{{ asset('storage/'.$paket->foto) }}" class="img-thumbnail" style="max-width:200px;"></div>@endif<input type="file" class="form-control" name="foto" accept="image/*"><small class="text-muted">Kosongkan jika tidak diganti</small></div>
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i>Perbarui</button>
        <a href="{{ route('admin.paket.index') }}" class="btn btn-outline-secondary">Kembali</a>
    </form>
</div></div></div></div>
@endsection
