<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        Contact::create([
            'nama' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'telepon' => '081234567890',
            'topik' => 'Kunjungan & Edukasi',
            'pesan' => 'Saya ingin mengetahui informasi mengenai kunjungan edukasi di Kebun Raya Mangrove Surabaya.',
            'status' => 'baru',
        ]);
    }
}