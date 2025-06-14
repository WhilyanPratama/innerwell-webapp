<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;

class RekamMedisDetail extends Model
{
    use HasUuid;

    protected $fillable = [
        'rekam_medis_id',
        'antrian_id',
        'dokter_id',
        'poli_id',
        'tanggal_periksa',
        'keluhan',
        'diagnosa',
        'obat',
    ];

    public function rekamMedis()
    {
        return $this->belongsTo(RekamMedis::class);
    }

    public function antrian()
    {
        return $this->belongsTo(Antrian::class);
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }

    public function poli()
    {
        return $this->belongsTo(Poli::class);
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'rekam_medis_details_id');
    }
}
