<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ProgramSeeder::class,
            ProgramContentSeeder::class, // Tambahkan baris ini
            ActivitySeeder::class, // Tambahkan baris ini
            MitraSeeder::class,
            UserSeeder::class, 
            ContactSeeder::class,// Tambahkan baris ini
            PengajuanCsrSeeder::class, // Tambahkan baris ini
            ]);
        // 1. Membuat satu akun Admin spesifik untuk uji coba Login
        User::factory()->create([
            'name' => 'Admin KRM',
            'email' => 'admin@krm.com',
            'password' => Hash::make('123456'), // Password-nya adalah: 123456
        ]);
    }
}