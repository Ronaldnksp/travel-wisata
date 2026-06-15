<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class UserSeeder extends Seeder {
    public function run(): void {
        User::create(['name'=>'Admin','email'=>'admin@travelwisata.com','password'=>Hash::make('password'),'role'=>'admin','phone'=>'081234567890','address'=>'Jl. Merdeka No. 1, Jakarta']);
        User::create(['name'=>'Budi Santoso','email'=>'budi@email.com','password'=>Hash::make('password'),'role'=>'user','phone'=>'081987654321','address'=>'Jl. Sudirman No. 10, Bandung']);
        User::create(['name'=>'Siti Rahayu','email'=>'siti@email.com','password'=>Hash::make('password'),'role'=>'user','phone'=>'081876543210','address'=>'Jl. Gatot Subroto No. 5, Surabaya']);
        User::create(['name'=>'Andi Pratama','email'=>'andi@email.com','password'=>Hash::make('password'),'role'=>'user','phone'=>'081765432109','address'=>'Jl. Pahlawan No. 15, Yogyakarta']);
    }
}
