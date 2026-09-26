<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramContent extends Model
{
    use HasFactory;

    protected $table = 'program_contents';

    protected $fillable = [
        'program_id',
        'judul',
        'deskripsi',
        'gambar',
    ];

    // Relasi: Setiap konten dimiliki oleh 1 Program (Many-to-One)
    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }
}