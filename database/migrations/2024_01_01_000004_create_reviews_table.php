<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('reviews', function (Blueprint $t) {
            $t->id(); $t->foreignId('user_id')->constrained()->onDelete('cascade');
            $t->foreignId('paket_wisata_id')->constrained('paket_wisata')->onDelete('cascade');
            $t->foreignId('booking_id')->constrained()->onDelete('cascade');
            $t->integer('rating')->comment('1-5'); $t->text('komentar'); $t->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('reviews'); }
};
