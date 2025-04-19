<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    use HasFactory, HasUuid;

    protected $fillable = [
        'nama_poli',
        'kode_poli',
        'deskripsi',
    ];

    public function jadwalDokters()
    {
        return $this->hasMany(JadwalDokter::class);
    }

    public function pendaftarans()
    {
        return $this->hasMany(Pendaftaran::class);
    }
}
