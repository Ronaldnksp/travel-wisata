<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\PaketWisata;
class PaketWisataSeeder extends Seeder {
    public function run(): void {
        PaketWisata::create(['nama_paket'=>'Paket Wisata Bali 4H3M','deskripsi'=>'Nikmati keindahan Pulau Dewata dengan paket wisata lengkap. Kunjungi pantai-pantai terkenal, pura bersejarah, dan nikmati budaya Bali yang khas.','destinasi'=>'Bali','harga'=>3500000,'durasi_hari'=>4,'kategori'=>'pantai','stok'=>20,'status'=>'aktif','foto'=>'wisata/bali.jpg']);
        PaketWisata::create(['nama_paket'=>'Paket Wisata Labuan Bajo 3H2M','deskripsi'=>'Jelajahi keindahan Komodo dan sekitarnya. Snorkeling di perairan jernih, bertemu langsung dengan komodo, dan nikmati sunset spektakuler.','destinasi'=>'Labuan Bajo, NTT','harga'=>5500000,'durasi_hari'=>3,'kategori'=>'petualangan','stok'=>15,'status'=>'aktif','foto'=>'wisata/labuan-bajo.jpg']);
        PaketWisata::create(['nama_paket'=>'Paket Wisata Raja Ampat 5H4M','deskripsi'=>'Surga bawah laut Indonesia. Nikmati keindahan terumbu karang, biota laut langka, dan pulau-pulau eksotis.','destinasi'=>'Raja Ampat, Papua','harga'=>12000000,'durasi_hari'=>5,'kategori'=>'petualangan','stok'=>8,'status'=>'aktif','foto'=>'wisata/raja-ampat.jpg']);
        PaketWisata::create(['nama_paket'=>'Paket Wisata Bromo Midnight','deskripsi'=>'Saksikan keajaiban sunrise di Gunung Bromo. Trekking melalui lautan pasir dan nikmati pemandangan gunung yang menakjubkan.','destinasi'=>'Gunung Bromo, Jawa Timur','harga'=>850000,'durasi_hari'=>1,'kategori'=>'gunung','stok'=>30,'status'=>'aktif','foto'=>'wisata/bromo.jpg']);
        PaketWisata::create(['nama_paket'=>'Paket Wisata Yogyakarta 4H3M','deskripsi'=>'Kota budaya dan sejarah. Kunjungi Candi Prambanan, Keraton Yogyakarta, Malioboro, dan kuliner khas Jogja.','destinasi'=>'Yogyakarta','harga'=>2500000,'durasi_hari'=>4,'kategori'=>'budaya','stok'=>25,'status'=>'aktif','foto'=>'wisata/yogyakarta.jpg']);
        PaketWisata::create(['nama_paket'=>'Paket Wisata Lombok 4H3M','deskripsi'=>'Pantai indah dan budaya Sasak. Nikmati keindahan Pantai Kuta Lombok, Gunung Rinjani, dan desa tradisional Sasak.','destinasi'=>'Lombok, NTB','harga'=>4200000,'durasi_hari'=>4,'kategori'=>'pantai','stok'=>18,'status'=>'aktif','foto'=>'wisata/lombok.jpg']);
        PaketWisata::create(['nama_paket'=>'Paket Wisata Kuliner Bandung 2H1M','deskripsi'=>'Eksplorasi kuliner terbaik Bandung. Cicipi batagor, siomay, surabi, dan jajanan khas Bandung lainnya.','destinasi'=>'Bandung, Jawa Barat','harga'=>1200000,'durasi_hari'=>2,'kategori'=>'kuliner','stok'=>40,'status'=>'aktif','foto'=>'wisata/bandung.jpg']);
        PaketWisata::create(['nama_paket'=>'Paket Wisata Danau Toba 3H2M','deskripsi'=>'Keindahan danau vulkanik terbesar di dunia. Nikmati pesona Danau Toba, kebudayaan Batak, dan Pulau Samosir.','destinasi'=>'Danau Toba, Sumatera Utara','harga'=>3000000,'durasi_hari'=>3,'kategori'=>'budaya','stok'=>20,'status'=>'aktif','foto'=>'wisata/danau-toba.jpg']);
    }
}
