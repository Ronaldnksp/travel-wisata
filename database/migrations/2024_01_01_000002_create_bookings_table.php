<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('bookings', function (Blueprint $t) {
            $t->id(); $t->foreignId('user_id')->constrained()->onDelete('cascade');
            $t->foreignId('paket_wisata_id')->constrained('paket_wisata')->onDelete('cascade');
            $t->date('tanggal_keberangkatan'); $t->integer('jumlah_orang');
            $t->decimal('total_harga', 12, 2);
            $t->enum('status', ['pending','dibayar','dikonfirmasi','selesai','dibatalkan'])->default('pending');
            $t->text('catatan')->nullable(); $t->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('bookings'); }
};
