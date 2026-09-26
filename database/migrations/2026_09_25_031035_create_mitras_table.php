<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mitras', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perusahaan', 150);
            $table->string('program_krm', 150);
            $table->string('dukungan', 150);
            $table->string('periode', 100);
            $table->string('status', 50)->default('AKTIF'); // AKTIF / SELESAI
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mitras');
    }
};