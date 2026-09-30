<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengajuanCsr extends Model
{
    protected $table = 'pengajuan_csrs';

    protected $fillable = [
        'nama',
        'perusahaan',
        'email',
        'kategori',
        'pesan',
        'status',
    ];
}