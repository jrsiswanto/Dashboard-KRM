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
        // 1. Membuat satu akun Admin spesifik untuk uji coba Login
        User::factory()->create([
            'name' => 'Admin KRM',
            'email' => 'admin@krm.com',
            'password' => Hash::make('123456'), // Password-nya adalah: 123456
        ]);
    }
}