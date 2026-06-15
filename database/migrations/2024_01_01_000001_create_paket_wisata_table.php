<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('paket_wisata', function (Blueprint $t) {
            $t->id(); $t->string('nama_paket'); $t->text('deskripsi'); $t->string('destinasi');
            $t->decimal('harga', 12, 2); $t->integer('durasi_hari'); $t->string('foto')->nullable();
            $t->enum('kategori', ['pantai','gunung','budaya','kuliner','petualangan','lainnya'])->default('lainnya');
            $t->integer('stok')->default(0); $t->enum('status', ['aktif','nonaktif'])->default('aktif');
            $t->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('paket_wisata'); }
};
