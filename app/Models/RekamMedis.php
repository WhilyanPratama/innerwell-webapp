<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    use HasUuid;

    protected $fillable = [
        'pasien_id',
        'nomor_rekam_medis',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    public function details()
    {
        return $this->hasMany(RekamMedisDetail::class);
    }
}
