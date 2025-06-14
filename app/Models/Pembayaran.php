<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';
    
    public $incrementing = false;
    
    protected $keyType = 'string';
    
    protected $fillable = [
        'id',
        'rekam_medis_details_id',
        'nama_pasien',
        'poli_id',
        'dokter_id',
        'status_pembayaran',
        'biaya_dokter',
        'biaya_layanan',
        'total_biaya',
    ];
    
    public function rekamMedisDetail()
    {
        return $this->belongsTo(RekamMedisDetail::class, 'rekam_medis_details_id');
    }
    
    public function poli()
    {
        return $this->belongsTo(Poli::class);
    }
    
    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }
}
