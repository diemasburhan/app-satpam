<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanKejadian extends Model
{
    use HasFactory;

    protected $table = 'laporan_kejadians';

    protected $fillable = [
        'judul',
        'deskripsi',
        'gambar',
    ];
}