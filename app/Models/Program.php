<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'judul', 'deskripsi', 'gambar_utama', 'status'
    ];

    // Relasi: 1 Program memiliki banyak Konten (One-to-Many)
    public function contents()
    {
        return $this->hasMany(ProgramContent::class, 'program_id');
    }
}