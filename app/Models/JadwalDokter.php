<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalDokter extends Model
{
    use HasFactory, HasUuid;

    protected $fillable = [
        'dokter_id',
        'poli_id',
        'hari',
        'sesi',
        'jam_mulai',
        'jam_selesai',
        'kuota',
    ];

    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }

    public function poli()
    {
        return $this->belongsTo(Poli::class);
    }

    public function pendaftarans()
    {
        return $this->hasMany(Pendaftaran::class);
    }
}
