<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ActivitySeeder extends Seeder
{
    public function run(): void
    {
        $activities = [
            [
                'deskripsi' => 'Melakukan penanaman 100 bibit mangrove baru di sektor Timur.',
                'tanggal' => Carbon::now()->subDays(2)->format('Y-m-d'),
            ],
            [
                'deskripsi' => 'Maintenance rutin mesin Pirolisis dan pembersihan reaktor.',
                'tanggal' => Carbon::now()->subDays(5)->format('Y-m-d'),
            ],
            [
                'deskripsi' => 'Kunjungan edukasi pelestarian lingkungan dari SD Negeri Surabaya 1.',
                'tanggal' => Carbon::now()->subDays(10)->format('Y-m-d'),
            ],
            [
                'deskripsi' => 'Pengecekan dan perbaikan panel Solar Cell kawasan.',
                'tanggal' => Carbon::now()->subDays(15)->format('Y-m-d'),
            ],
            [
                'deskripsi' => 'Panen perdana bandeng dari petak tambak Silvo Fishery.',
                'tanggal' => Carbon::now()->subMonths(1)->format('Y-m-d'),
            ],
            [
                'deskripsi' => 'Pelatihan pengolahan sirup mangrove bagi ibu-ibu warga sekitar pesisir.',
                'tanggal' => Carbon::now()->subMonths(2)->format('Y-m-d'),
            ]
        ];

        foreach ($activities as $activity) {
            Activity::create($activity);
        }
    }
}