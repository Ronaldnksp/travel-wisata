<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pembayaran extends Model
{
    use HasFactory;
    protected $fillable = ['booking_id','jumlah_bayar','bukti_bayar','metode_bayar','status','catatan_admin'];
    protected $casts = ['jumlah_bayar' => 'decimal:2'];
    public function booking(): BelongsTo { return $this->belongsTo(Booking::class); }
}
