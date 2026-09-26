<?php

namespace Database\Seeders;

use App\Models\Mitra;
use Illuminate\Database\Seeder;

class MitraSeeder extends Seeder
{
    public function run(): void
    {
        $mitras = [
            [
                'nama_perusahaan' => 'PT Nusantara Energi',
                'program_krm' => 'Reboisasi Mangrove Pesisir Timur',
                'dukungan' => 'Bibit & Operasional',
                'periode' => 'Jan 2023 - Des 2024',
                'status' => 'AKTIF',
            ],
            [
                'nama_perusahaan' => 'PT Hijau Lestari Indonesia',
                'program_krm' => 'Edukasi Konservasi Sekolah Dasar',
                'dukungan' => 'Fasilitas Edukasi',
                'periode' => 'Jul 2023 - Jun 2024',
                'status' => 'AKTIF',
            ],
            [
                'nama_perusahaan' => 'Bank Pembangunan Daerah',
                'program_krm' => 'Pengembangan Ekowisata Mangrove',
                'dukungan' => 'Infrastruktur Jalan Kayu',
                'periode' => 'Mar 2022 - Mar 2023',
                'status' => 'SELESAI',
            ]
        ];

        foreach ($mitras as $mitra) {
            Mitra::create($mitra);
        }
    }
}