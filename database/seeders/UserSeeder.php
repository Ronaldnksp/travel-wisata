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
        User::create(['name'=>'Ulfathul Hanifah','email'=>'ulfathul@email.com','password'=>Hash::make('144241004'),'role'=>'user','phone'=>'081111111111','address'=>'Jl. Timur No. 1, Malang']);
        User::create(['name'=>'Ronald Nanda Ksatria Putra','email'=>'ronald@email.com','password'=>Hash::make('144241005'),'role'=>'user','phone'=>'081222222222','address'=>'Jl. Barat No. 2, Malang']);
        User::create(['name'=>'Isma Kamal','email'=>'isma@email.com','password'=>Hash::make('144241006'),'role'=>'user','phone'=>'081333333333','address'=>'Jl. Utara No. 3, Malang']);
        User::create(['name'=>'Frista Nisa','email'=>'frista@email.com','password'=>Hash::make('144241063'),'role'=>'user','phone'=>'081444444444','address'=>'Jl. Selatan No. 4, Malang']);
    }
}
