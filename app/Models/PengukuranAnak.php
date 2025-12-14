<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengukuranAnak extends Model
{
    use HasFactory;

    protected $table = 'pengukuran_anak';

    protected $fillable = [
        'user_id',
        'anak_id',
        'berat',
        'umur',
        'tinggi_badan',
        'jenis_kelamin',
        'status',
        'z_score',
        'tanggal_pengukuran',
    ];

    protected $casts = [
        'berat'              => 'float',
        'tinggi_badan'       => 'float',
        'z_score'            => 'float',
        'umur'               => 'integer',
        'tanggal_pengukuran' => 'date',
    ];

    // RELASI KE USER
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // RELASI KE ANAK
    public function anak()
    {
        return $this->belongsTo(Anak::class);
    }
}
