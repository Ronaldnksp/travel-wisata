@extends('layouts.app')
@section('title', 'Tulis Review')
@section('content')
<div class="container py-4">
    <div class="row justify-content-center"><div class="col-md-8">
        <div class="card shadow-sm"><div class="card-header bg-white"><h5 class="mb-0">Tulis Ulasan</h5></div><div class="card-body">
            <div class="alert alert-info"><strong>Paket:</strong> {{ $booking->paketWisata->nama_paket }}</div>
            <form method="POST" action="{{ route('review.store', $booking) }}">
                @csrf
                <div class="mb-4 text-center"><label class="form-label d-block">Rating</label><div class="d-inline-flex gap-2" id="star-rating">@for($i=1;$i<=5;$i++)<label style="cursor:pointer;font-size:2rem;"><input type="radio" name="rating" value="{{ $i }}" class="d-none" {{ old('rating') == $i ? 'checked' : '' }}><i class="{{ old('rating') >= $i ? 'fas' : 'far' }} fa-star text-warning"></i></label>@endfor</div></div>
                <div class="mb-3"><label class="form-label">Ulasan</label><textarea class="form-control" name="komentar" rows="5" placeholder="Ceritakan pengalaman wisata Anda..." required>{{ old('komentar') }}</textarea></div>
                <button type="submit" class="btn btn-warning btn-lg w-100"><i class="fas fa-paper-plane me-2"></i>Kirim Ulasan</button>
            </form>
        </div></div>
    </div></div>
</div>
@section('scripts')
<script>
document.querySelectorAll('#star-rating label').forEach(label => {
    label.addEventListener('click', () => {
        document.querySelectorAll('#star-rating i').forEach((icon, i) => {
            icon.classList.replace(i < parseInt(label.querySelector('input').value) ? 'far' : 'fas', i < parseInt(label.querySelector('input').value) ? 'fas' : 'far');
        });
    });
});
</script>
@endsection
