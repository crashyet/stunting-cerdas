<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Edukasi extends Model
{
    use HasFactory;

    protected $table = 'edukasi';

    protected $fillable = [
        'kategori',
        'judul',
        'slug',
        'penulis',
        'tanggal_publikasi',
        'waktu_baca',
        'thumbnail',
        'intro',
        'konten',
    ];
}
