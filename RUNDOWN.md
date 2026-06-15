# Rundown Percakapan - Sistem Travel Wisata

## Project
- Tech: Laravel 10 + MySQL
- Lokasi: `C:\travel-wisata-temp`
- GitHub: https://github.com/Ronaldnksp/travel-wisata

## Fitur yang Sudah Dibuat
- 5 Model: User, PaketWisata, Booking, Pembayaran, Review
- 11 Controller (termasuk 4 Admin)
- 5 Migration (users, paket_wisata, bookings, pembayarans, reviews)
- 2 Seeder (4 user, 8 paket wisata dengan gambar)
- 20+ Blade views (layout, auth, home, paket, booking, review, admin)
- 37 Routes
- Admin dashboard dengan statistika
- Upload gambar paket wisata
- Storage symlink sudah aktif

## Akun Demo
| Role | Email | Password |
|------|-------|----------|
| Admin | admin@travelwisata.com | password |
| User | budi@email.com | password |
| User | siti@email.com | password |
| User | andi@email.com | password |

## Cara Jalankan (Lokal)
```
cd C:\travel-wisata-temp
C:\xampp\php\php.exe artisan serve
```
Buka: http://localhost:8000

## Cara Jalankan dari GitHub
```
git clone https://github.com/Ronaldnksp/travel-wisata.git
cd travel-wisata
C:\xampp\php\php.exe composer.phar install
copy .env.example .env
C:\xampp\php\php.exe composer.phar key:generate
```
Buat database `travel_wisata` di phpMyAdmin, lalu:
```
C:\xampp\php\php.exe artisan migrate --seed
C:\xampp\php\php.exe artisan storage:link
C:\xampp\php\php.exe artisan serve
```

## Hosting Online
Rekomendasi: Railway.app atau Render.com (gratis)
Login pakai GitHub → deploy repo → tambah MySQL

## Yang Perlu Dilanjutkan
- [ ] Deploy ke hosting online (Railway/Render)
- [ ] Test semua fitur (booking, pembayaran, review)
- [ ] Ganti gambar placeholder dengan gambar asli

## File Penting
- `.env` - konfigurasi database
- `routes/web.php` - semua routes
- `database/seeders/` - data dummy
- `resources/views/` - semua tampilan
- `public/css/style.css` - custom CSS
- `storage/app/public/wisata/` - gambar paket
