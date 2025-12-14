<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anak extends Model
{
    use HasFactory;

    protected $table = 'anak';

    protected $fillable = [
        'user_id',
        'nama',
        'umur',
        'jenis_kelamin',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pengukuran()
    {
        return $this->hasMany(PengukuranAnak::class, 'anak_id');
    }
}
