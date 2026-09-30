<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengajuan_csrs', function (Blueprint $table) {
            $table->id();

            $table->string('nama', 150);
            $table->string('perusahaan', 150);
            $table->string('email', 150);
            $table->string('kategori', 50);
            $table->text('pesan');

            $table->enum('status', [
                'BARU',
                'DIBACA'
            ])->default('BARU');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengajuan_csrs');
    }
};