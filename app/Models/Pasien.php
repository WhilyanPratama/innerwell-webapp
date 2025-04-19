<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory, HasUuid;

    protected $fillable = [
        'user_id',
        'tanggal_lahir',
        'alamat',
        'jenis_kelamin',
        'golongan_darah',
        'alergi',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pendaftarans()
    {
        return $this->hasMany(Pendaftaran::class);
    }
}
