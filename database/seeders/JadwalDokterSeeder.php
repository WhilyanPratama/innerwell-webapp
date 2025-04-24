<?php

namespace Database\Seeders;

use App\Models\JadwalDokter;
use App\Models\Dokter;
use App\Models\Poli;
use Illuminate\Database\Seeder;

class JadwalDokterSeeder extends Seeder
{
    public function run()
    {
        // Get Poli IDs
        $poliGigi = Poli::where('kode_poli', 'A')->first()->id;
        $poliUmum = Poli::where('kode_poli', 'B')->first()->id;
        $poliAnak = Poli::where('kode_poli', 'C')->first()->id;
        $poliTHT = Poli::where('kode_poli', 'D')->first()->id;

        // Define schedules
        $jadwalData = [
            // Senin
            ['hari' => 'senin', 'jam_mulai' => '07:00', 'jam_selesai' => '10:00', 'dokter' => 'drg. Sarah', 'poli_id' => $poliGigi],
            ['hari' => 'senin', 'jam_mulai' => '07:00', 'jam_selesai' => '10:00', 'dokter' => 'dr. Daffa S.An', 'poli_id' => $poliAnak],
            ['hari' => 'senin', 'jam_mulai' => '07:00', 'jam_selesai' => '10:00', 'dokter' => 'dr. Ahmad', 'poli_id' => $poliUmum],
            ['hari' => 'senin', 'jam_mulai' => '07:00', 'jam_selesai' => '10:00', 'dokter' => 'dr. Alfian Firdaus Sp.THT-KL', 'poli_id' => $poliTHT],
            ['hari' => 'senin', 'jam_mulai' => '10:00', 'jam_selesai' => '14:00', 'dokter' => 'drg. Arya', 'poli_id' => $poliGigi],
            ['hari' => 'senin', 'jam_mulai' => '10:00', 'jam_selesai' => '14:00', 'dokter' => 'dr. Daffa S.An', 'poli_id' => $poliAnak],
            ['hari' => 'senin', 'jam_mulai' => '10:00', 'jam_selesai' => '14:00', 'dokter' => 'dr. Tirta', 'poli_id' => $poliUmum],
            ['hari' => 'senin', 'jam_mulai' => '10:00', 'jam_selesai' => '14:00', 'dokter' => 'dr. Alfian Firdaus Sp.THT-KL', 'poli_id' => $poliTHT],
            ['hari' => 'senin', 'jam_mulai' => '14:00', 'jam_selesai' => '17:00', 'dokter' => 'drg. Faradilla', 'poli_id' => $poliGigi],

            // Selasa
            ['hari' => 'selasa', 'jam_mulai' => '07:00', 'jam_selesai' => '10:00', 'dokter' => 'dr. Khalid S.An', 'poli_id' => $poliAnak],
            ['hari' => 'selasa', 'jam_mulai' => '07:00', 'jam_selesai' => '10:00', 'dokter' => 'dr. Ahmad', 'poli_id' => $poliUmum],
            ['hari' => 'selasa', 'jam_mulai' => '10:00', 'jam_selesai' => '14:00', 'dokter' => 'dr. Khalid S.An', 'poli_id' => $poliAnak],
            ['hari' => 'selasa', 'jam_mulai' => '10:00', 'jam_selesai' => '14:00', 'dokter' => 'dr. Tirta', 'poli_id' => $poliUmum],
            ['hari' => 'selasa', 'jam_mulai' => '14:00', 'jam_selesai' => '17:00', 'dokter' => 'drg. Sarah', 'poli_id' => $poliGigi],

            // Rabu
            ['hari' => 'rabu', 'jam_mulai' => '07:00', 'jam_selesai' => '10:00', 'dokter' => 'dr. Daffa S.An', 'poli_id' => $poliAnak],
            ['hari' => 'rabu', 'jam_mulai' => '07:00', 'jam_selesai' => '10:00', 'dokter' => 'dr. Ahmad', 'poli_id' => $poliUmum],
            ['hari' => 'rabu', 'jam_mulai' => '07:00', 'jam_selesai' => '10:00', 'dokter' => 'dr. Alfian Firdaus Sp.THT-KL', 'poli_id' => $poliTHT],
            ['hari' => 'rabu', 'jam_mulai' => '10:00', 'jam_selesai' => '14:00', 'dokter' => 'dr. Ahmad', 'poli_id' => $poliUmum],
            ['hari' => 'rabu', 'jam_mulai' => '10:00', 'jam_selesai' => '14:00', 'dokter' => 'dr. Alfian Firdaus Sp.THT-KL', 'poli_id' => $poliTHT],

            // Kamis
            ['hari' => 'kamis', 'jam_mulai' => '07:00', 'jam_selesai' => '10:00', 'dokter' => 'drg. Faradilla', 'poli_id' => $poliGigi],
            ['hari' => 'kamis', 'jam_mulai' => '07:00', 'jam_selesai' => '10:00', 'dokter' => 'dr. Ahmad', 'poli_id' => $poliUmum],

            // Jumat
            ['hari' => 'jumat', 'jam_mulai' => '07:00', 'jam_selesai' => '10:00', 'dokter' => 'drg. Sarah', 'poli_id' => $poliGigi],
            ['hari' => 'jumat', 'jam_mulai' => '07:00', 'jam_selesai' => '10:00', 'dokter' => 'dr. Khalid S.An', 'poli_id' => $poliAnak],
            ['hari' => 'jumat', 'jam_mulai' => '07:00', 'jam_selesai' => '10:00', 'dokter' => 'dr. Alfian Firdaus Sp.THT-KL', 'poli_id' => $poliTHT],
            ['hari' => 'jumat', 'jam_mulai' => '10:00', 'jam_selesai' => '14:00', 'dokter' => 'dr. Alfian Firdaus Sp.THT-KL', 'poli_id' => $poliTHT],

            // Sabtu
            ['hari' => 'sabtu', 'jam_mulai' => '07:00', 'jam_selesai' => '10:00', 'dokter' => 'dr. Safira', 'poli_id' => $poliUmum],
            ['hari' => 'sabtu', 'jam_mulai' => '07:00', 'jam_selesai' => '10:00', 'dokter' => 'dr. Alfian Firdaus Sp.THT-KL', 'poli_id' => $poliTHT],
            ['hari' => 'sabtu', 'jam_mulai' => '10:00', 'jam_selesai' => '14:00', 'dokter' => 'drg. Arya', 'poli_id' => $poliGigi],
            ['hari' => 'sabtu', 'jam_mulai' => '10:00', 'jam_selesai' => '14:00', 'dokter' => 'dr. Khalid S.An', 'poli_id' => $poliAnak],
            ['hari' => 'sabtu', 'jam_mulai' => '10:00', 'jam_selesai' => '14:00', 'dokter' => 'dr. Alfian Firdaus Sp.THT-KL', 'poli_id' => $poliTHT],
            ['hari' => 'sabtu', 'jam_mulai' => '14:00', 'jam_selesai' => '17:00', 'dokter' => 'dr. Khalid S.An', 'poli_id' => $poliAnak],

            // Minggu
            ['hari' => 'minggu', 'jam_mulai' => '07:00', 'jam_selesai' => '10:00', 'dokter' => 'drg. Arya', 'poli_id' => $poliGigi],
            ['hari' => 'minggu', 'jam_mulai' => '07:00', 'jam_selesai' => '10:00', 'dokter' => 'dr. Daffa S.An', 'poli_id' => $poliAnak],
            ['hari' => 'minggu', 'jam_mulai' => '07:00', 'jam_selesai' => '10:00', 'dokter' => 'dr. Safira', 'poli_id' => $poliUmum],
            ['hari' => 'minggu', 'jam_mulai' => '10:00', 'jam_selesai' => '14:00', 'dokter' => 'dr. Safira', 'poli_id' => $poliUmum],
        ];


        foreach ($jadwalData as $jadwal) {
            if ($jadwal['dokter'] !== null) {
                $dokter = Dokter::whereHas('user', function($query) use ($jadwal) {
                    $query->where('nama_lengkap', $jadwal['dokter']);
                })->first();

                if ($dokter) {
                    JadwalDokter::create([
                        'dokter_id' => $dokter->id,
                        'poli_id' => $jadwal['poli_id'],
                        'hari' => $jadwal['hari'],
                        'jam_mulai' => $jadwal['jam_mulai'],
                        'jam_selesai' => $jadwal['jam_selesai'],
                        'kuota' => 20
                    ]);
                }
            }
        }
    }
}
