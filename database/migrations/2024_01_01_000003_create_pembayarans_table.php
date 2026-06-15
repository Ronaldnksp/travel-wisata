<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('pembayarans', function (Blueprint $t) {
            $t->id(); $t->foreignId('booking_id')->constrained()->onDelete('cascade');
            $t->decimal('jumlah_bayar', 12, 2); $t->string('bukti_bayar')->nullable();
            $t->string('metode_bayar');
            $t->enum('status', ['pending','diverifikasi','ditolak'])->default('pending');
            $t->text('catatan_admin')->nullable(); $t->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('pembayarans'); }
};
