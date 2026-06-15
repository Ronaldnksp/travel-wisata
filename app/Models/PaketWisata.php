<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PaketWisata extends Model
{
    use HasFactory;
    protected $table = 'paket_wisata';
    protected $fillable = ['nama_paket','deskripsi','destinasi','harga','durasi_hari','foto','kategori','stok','status'];
    protected $casts = ['harga' => 'decimal:2'];

    public function bookings(): HasMany { return $this->hasMany(Booking::class); }
    public function reviews(): HasMany { return $this->hasMany(Review::class); }
    public function getAverageRatingAttribute(): float { return round($this->reviews()->avg('rating'), 1) ?? 0; }
    public function getTotalReviewsAttribute(): int { return $this->reviews()->count(); }
    public function isAvailable(): bool { return $this->status === 'aktif' && $this->stok > 0; }
}
