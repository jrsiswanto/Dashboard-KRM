<?php

namespace Database\Seeders;

use App\Models\ProgramContent;
use Illuminate\Database\Seeder;

class ProgramContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contents = [
            [
                'program_id' => 5,
                'judul'      => 'Rhizophora mucronata (Bakau Kurap)',
                'deskripsi'  => 'Spesies mangrove utama dengan sistem akar tunjang (stilt roots) yang kokoh dan rimbun. Perakarannya berfungsi memecah gelombang laut, menstabilkan sedimen lumpur, serta menyediakan tempat berlindung dan berkembang biak bagi biota pesisir seperti ikan dan kepiting.',
                'gambar'     => 'BioDiversitas 1.jpg',
            ],
            [
                'program_id' => 5,
                'judul'      => 'Excoecaria agallocha (Kayu Buta-Buta)',
                'deskripsi'  => 'Tanaman mangrove yang dikenal memiliki daya adaptasi dan ketahanan tinggi di zona pasang surut bagian dalam. Tajuk daunnya yang lebat berperan aktif sebagai benteng alami pelindung pesisir sekaligus penyerap karbon biru (blue carbon) yang sangat efektif.',
                'gambar'     => 'BioDiversitas 2.jpg',
            ],
            [
                'program_id' => 5,
                'judul'      => 'Avicennia marina (Api-Api Putih)',
                'deskripsi'  => 'Spesies pelopor yang mampu tumbuh di garis pantai paling depan dengan kadar garam tinggi. Dilengkapi sistem akar napas (pneumatophores) yang mencuat ke atas permukaan tanah untuk menyerap oksigen langsung dari udara serta menahan abrasi secara optimal.',
                'gambar'     => 'BioDiversitas 3.jpg',
            ],
             [
                'program_id' => 6,
                'judul'      => 'Ragam Minuman Kesehatan Alami & Sirup Segar',
                'deskripsi'  => 'Menyediakan pilihan terbaik untuk kesehatan Anda. Tersedia aneka jamu bubuk instan yang praktis dan penuh khasiat, seperti Temulawak Madu, Jahe Anget, dan Kunir Asem.Sirup Mangrove Bogem (Sonneratia caseolaris). Sirup khas ini kaya akan vitamin C dan antioksidan alami, menawarkan kesegaran tropis unik dengan perpaduan rasa asam manis yang pas. Semua produk dibuat dari bahan alam pilihan yang dijamin kualitasnya..',
                'gambar'     => 'Produk Olahan 1.jpg',
            ],
             [
                'program_id' => 6,
                'judul'      => 'Olahan Mangrove Khas & Bernilai Lokal',
                'deskripsi'  => 'Nikmati beragam olahan mangrove pilihan, mulai dari Stick Mangrove yang crispy dan gurih hingga aneka camilan mangrove kering dengan cita rasa khas. Diolah dari bahan alam pilihan dengan mengutamakan kualitas, KRM menghadirkan produk lokal yang lezat sekaligus memiliki nilai tambah bagi masyarakat dan lingkungan..',
                'gambar'     => 'Produk Olahan 2.jpg',
            ],
        ];

        foreach ($contents as $content) {
            ProgramContent::create($content);
        }
    }
}