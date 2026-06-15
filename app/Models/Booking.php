<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','paket_wisata_id','tanggal_keberangkatan','jumlah_orang','total_harga','status','catatan'];
    protected $casts = ['tanggal_keberangkatan' => 'date','total_harga' => 'decimal:2'];

    public function user(): BelongsTo { return $this->belongsTo(User::class); }
    public function paketWisata(): BelongsTo { return $this->belongsTo(PaketWisata::class); }
    public function pembayaran(): HasOne { return $this->hasOne(Pembayaran::class); }
    public function review(): HasOne { return $this->hasOne(Review::class); }
    public function getStatusBadgeAttribute(): string {
        return match($this->status) {
            'pending' => 'warning','dibayar' => 'info','dikonfirmasi' => 'primary','selesai' => 'success','dibatalkan' => 'danger', default => 'secondary',
        };
    }
}
