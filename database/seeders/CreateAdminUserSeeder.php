<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateAdminUserSeeder extends Seeder
{
    public function run()
    {
        $admin = User::create([
            'name' => 'Bukhari',
            'email' => 'ariifhores0011@gmail.com',
            'password' => Hash::make('Bukhari7788'), // Ganti 'password' dengan kata sandi yang diinginkan
            'role' => 'Admin Utama', // Sesuaikan dengan aturan peran Anda
            // Masukkan kolom lain yang perlu Anda isi
        ]);

        // Tampilkan pesan bahwa pengguna admin utama berhasil dibuat
        $this->command->info('Admin Utama berhasil dibuat: ' . $admin->email);
    }
}