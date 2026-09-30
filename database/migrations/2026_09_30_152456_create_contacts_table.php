<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();

            $table->string('nama');
            $table->string('email');
            $table->string('telepon')->nullable();

            $table->enum('topik', [
                'Kunjungan & Edukasi',
                'Kemitraan CSR',
                'Karbon Trading',
                'Produk Olahan Mangrove',
                'Lainnya'
            ]);

            $table->text('pesan');

            $table->enum('status', [
                'baru',
                'dibaca',
                'dibalas'
            ])->default('baru');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};