<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('program_contents', function (Blueprint $table) {
            $table->id(); // BIGINT UNSIGNED AUTO_INCREMENT
            
            // Foreign key yang terhubung ke tabel programs
            $table->foreignId('program_id')->constrained('programs')->onDelete('cascade');
            
            $table->string('judul', 200);
            $table->text('deskripsi');
            $table->string('gambar', 255)->nullable(); // Saya buat nullable agar gambar opsional
            
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_contents');
    }
};