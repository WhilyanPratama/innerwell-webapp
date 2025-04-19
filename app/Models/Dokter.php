<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory, HasUuid;

    protected $fillable = [
        'user_id',
        'spesialisasi',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jadwalDokters()
    {
        return $this->hasMany(JadwalDokter::class);
    }

    public function antrians()
    {
        return $this->hasMany(Antrian::class);
    }
}
