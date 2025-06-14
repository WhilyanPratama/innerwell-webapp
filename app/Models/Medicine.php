<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Medicine extends Model
{
    use HasFactory;

    // Menentukan nama tabel jika tidak sesuai standar penamaan Laravel
    protected $table = 'medicine';

    // Menonaktifkan auto-increment jika ID bukan integer
    public $incrementing = false;

    // Menentukan tipe data ID adalah string (untuk UUID)
    protected $keyType = 'string';

    // Kolom yang boleh diisi secara massal (mass assignable)
    protected $fillable = [
        'id',
        'kode_poli',
        'nama_obat',
        'katagori',
        'jenis',
        'jumlah',
        'harga',
    ];

    public function poli(){
        return $this->belongsTo(Poli::class, 'kode_poli', 'kode_poli');
    }
}
