<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pembayaran;
use App\Models\RekamMedisDetail;
use Illuminate\Support\Str;

class PembayaranSeeder extends Seeder
{
    public function run()
    {
        // Get sample rekam medis details
        $rekamMedisDetails = RekamMedisDetail::with(['rekamMedis.pasien.user', 'dokter', 'poli'])
            ->limit(10)
            ->get();

        foreach ($rekamMedisDetails as $detail) {
            Pembayaran::create([
                'id' => Str::uuid(),
                'rekam_medis_details_id' => $detail->id, // Use the detail's ID directly
                'nama_pasien' => $detail->rekamMedis->pasien->user->nama_lengkap,
                'poli_id' => $detail->poli_id,
                'dokter_id' => $detail->dokter_id,
                'status_pembayaran' => 'lunas',
                'biaya_dokter' => 150000,
                'biaya_layanan' => 50000,
                'total_biaya' => 200000 + rand(50000, 300000),
            ]);
        }
    }
}
