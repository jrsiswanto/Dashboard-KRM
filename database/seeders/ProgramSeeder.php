<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    public function run(): void
    {
        $programs = [
            [
                'nama' => 'Pirolisis',
                'judul' => 'Pirolisis: Dari Limbah Menjadi Energi',
                'deskripsi' => 'Mengubah limbah biomassa dan sisa tanaman mangrove menjadi arang (biochar), bio-oil, dan syngas melalui proses pembakaran minim oksigen — mengurangi sampah kawasan sekaligus menghasilkan energi alternatif.',
                'gambar_utama' => 'Pirolisis Hero.jpg',
                'status' => true,
            ],
            [
                'nama' => 'Solar Cell',
                'judul' => 'Solar Cell: Listrik dari Cahaya Matahari',
                'deskripsi' => 'Rangkaian panel surya yang mengubah cahaya matahari menjadi listrik untuk penerangan, pompa air, dan kebutuhan operasional kawasan — mengurangi ketergantungan pada jaringan PLN sekaligus memangkas emisi karbon kawasan.',
                'gambar_utama' => 'Solar Cell Hero.jpg',
                'status' => true,
            ],
            [
                'nama' => 'Silvo Fishery',
                'judul' => 'Silvo Fishery: Panen Jalan, Mangrove Tetap Berdiri',
                'deskripsi' => 'Sistem tambak yang menyisakan sabuk mangrove di sekeliling petak air — akar mangrove menyaring air tambak dan menahan abrasi, sementara petani tetap memanen udang, bandeng, dan kepiting dari petak yang sama.',
                'gambar_utama' => 'Silvo Fishery.jpg',
                'status' => true,
            ],
            [
                'nama' => 'Terangin',
                'judul' => 'Terangin: Penerangan Energi Angin Pesisir',
                'deskripsi' => 'Inovasi pembangkit listrik tenaga angin mandiri yang memanfaatkan hembusan angin pesisir pantai utara Surabaya untuk mendukung penerangan dan operasional kawasan secara ramah lingkungan.',
                'gambar_utama' => 'Terangin Hero.jpg',
                'status' => true,
            ],
            [
                'nama' => 'biodiversitas',
                'judul' => 'Kekayaan Ekosistem Mangrove',
                'deskripsi' => 'Jelajahi keanekaragaman flora dan fauna yang hidup dan berkembang di kawasan Kebun Raya Mangrove Surabaya. Rumah bagi beragam spesies mangrove pelindung pesisir.',
                'gambar_utama' => 'Biodiversitas Hero.jpg',
                'status' => true,
            ],
            [
                'nama' => 'Produk Olahan',
                'judul' => 'Kebaikan Alam dalam Setiap Olahan',
                'deskripsi' => 'Mendukung perekonomian lokal melalui pemanfaatan berkelanjutan hasil hutan mangrove. Temukan berbagai produk unik dan bermanfaat dari komunitas pesisir kami.',
                'gambar_utama' => 'Produk Olahan Hero.jpg',
                'status' => true,
            ],
        ];

        foreach ($programs as $program) {
            Program::create($program);
        }
    }
}