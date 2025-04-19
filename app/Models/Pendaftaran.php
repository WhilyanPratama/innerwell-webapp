<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory, HasUuid;

    protected $fillable = [
        'pasien_id',
        'poli_id',
        'jadwal_dokter_id',
        'tanggal_berobat',
        'keluhan',
        'status_validasi',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    public function poli()
    {
        return $this->belongsTo(Poli::class);
    }

    public function jadwalDokter()
    {
        return $this->belongsTo(JadwalDokter::class);
    }

    public function antrian()
    {
        return $this->hasOne(Antrian::class);
    }
}
