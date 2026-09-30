<?php

namespace Database\Seeders;

use App\Models\PengajuanCsr;
use Illuminate\Database\Seeder;

class PengajuanCsrSeeder extends Seeder
{
    public function run(): void
    {
        PengajuanCsr::create([
            'nama' => 'John Doe',
            'perusahaan' => 'PT. Inovasi Hijau',
            'email' => 'john@company.com',
            'kategori' => 'bibit',
            'pesan' => 'Perusahaan kami tertarik untuk mendukung program penanaman bibit mangrove sebagai bagian dari program CSR dan ESG.',
            'status' => 'BARU',
        ]);

        PengajuanCsr::create([
            'nama' => 'Andi Pratama',
            'perusahaan' => 'PT. Nusantara Energi',
            'email' => 'andi@nusantaraenergi.co.id',
            'kategori' => 'edukasi',
            'pesan' => 'Kami ingin mengembangkan program edukasi lingkungan dan pemberdayaan masyarakat di sekitar Kebun Raya Mangrove Surabaya.',
            'status' => 'DIBACA',
        ]);
    }
}