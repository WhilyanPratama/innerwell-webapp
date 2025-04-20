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
        $jadwalSesi = [
            'pagi' => ['07:00', '11:00'],
            'siang' => ['11:00', '14:00'],
            'sore' => ['14:00', '17:00']
        ];

        $hariKerja = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu'];
        
        // Get Poli IDs
        $poliGigi = Poli::where('kode_poli', 'A')->first()->id;
        $poliUmum = Poli::where('kode_poli', 'B')->first()->id;
        $poliAnak = Poli::where('kode_poli', 'C')->first()->id;

        // Get Dokter IDs
        $dokterUmum = Dokter::where('spesialisasi', 'umum')->get();
        $dokterAnak = Dokter::where('spesialisasi', 'anak')->get();
        $dokterGigi = Dokter::where('spesialisasi', 'gigi')->get();

        // Create schedules for each doctor
        foreach ($hariKerja as $hari) {
            // Dokter Umum Schedules
            foreach ($dokterUmum as $index => $dokter) {
                if ($index == 0) {
                    $sesi = 'pagi';
                } elseif ($index == 1) {
                    $sesi = 'siang';
                } else {
                    $sesi = 'sore';
                }
                
                JadwalDokter::create([
                    'dokter_id' => $dokter->id,
                    'poli_id' => $poliUmum,
                    'hari' => $hari,
                    'sesi' => $sesi,
                    'jam_mulai' => $jadwalSesi[$sesi][0],
                    'jam_selesai' => $jadwalSesi[$sesi][1],
                    'kuota' => 20
                ]);
            }

            // Dokter Anak Schedules
            foreach ($dokterAnak as $index => $dokter) {
                if ($index == 0) {
                    $sesi = 'pagi';
                } elseif ($index == 1) {
                    $sesi = 'siang';
                } else {
                    $sesi = 'sore';
                }
                
                JadwalDokter::create([
                    'dokter_id' => $dokter->id,
                    'poli_id' => $poliAnak,
                    'hari' => $hari,
                    'sesi' => $sesi,
                    'jam_mulai' => $jadwalSesi[$sesi][0],
                    'jam_selesai' => $jadwalSesi[$sesi][1],
                    'kuota' => 15
                ]);
            }

            // Dokter Gigi Schedules
            foreach ($dokterGigi as $index => $dokter) {
                if ($index == 0) {
                    $sesi = 'pagi';
                } elseif ($index == 1) {
                    $sesi = 'siang';
                } else {
                    $sesi = 'sore';
                }
                
                JadwalDokter::create([
                    'dokter_id' => $dokter->id,
                    'poli_id' => $poliGigi,
                    'hari' => $hari,
                    'sesi' => $sesi,
                    'jam_mulai' => $jadwalSesi[$sesi][0],
                    'jam_selesai' => $jadwalSesi[$sesi][1],
                    'kuota' => 10
                ]);
            }
        }
    }
}


// note : jadwal dokter jika sudah bisa diinput manual bisa menyesuaikan model jadawal dokter dan seeder + tabel-jadwal dokter