<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RekomendasiMakanan extends Model
{
    protected $table = 'rekomendasi_makanan';

    protected $fillable = [
        'judul', 'kategori', 'usia', 'porsi', 'kalori',
        'protein', 'karbo', 'lemak', 'vitamin', 'porsi_disarankan',
        'tips', 'emoji', 'slug','gambar'
    ];

    protected $casts = [
        'vitamin' => 'array',
        'tips'    => 'array'
    ];
}

