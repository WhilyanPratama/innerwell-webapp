<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    use HasFactory, HasUuid;

    protected $fillable = [
        'pendaftaran_id',
        'dokter_id',
        'kode_antrian',
        'nomor_antrian',
        'status',
        'waktu_daftar',
        'waktu_dipanggil',
        'waktu_selesai',
    ];

    protected $casts = [
        'waktu_daftar' => 'datetime',
        'waktu_dipanggil' => 'datetime',
        'waktu_selesai' => 'datetime',
    ];

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class);
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }

    public function rekamMedisDetail()
    {
        return $this->hasOne(RekamMedisDetail::class);
    }
}