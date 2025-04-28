<?php

namespace App\Http\Controllers;
use App\Models\Pendaftaran;
use App\Models\Antrian;
use App\Models\Poli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class PasienDashboardController
{
    public function index()
    {
        $polis = Poli::all();
        $user = Auth::user();
        $pasien = $user->pasien;
        
        // Pendaftaran terbaru
        $pendaftaran = Pendaftaran::where('pasien_id', $pasien->id)
            ->orderBy('created_at', 'desc')
            ->first();

        // Hitung posisi antrian jika ada pendaftaran
        $waitingPosition = null;
        if ($pendaftaran && $pendaftaran->status_validasi === 'menunggu') {
            $waitingPosition = Pendaftaran::where('status_validasi', 'menunggu')
                ->where('created_at', '<=', $pendaftaran->created_at)
                ->count();
        }

        // Board antrian data
        $antrianData = null;
        $estimatedWait = null;
        
        if ($pendaftaran && $pendaftaran->status_validasi === 'disetujui' && isset($pendaftaran->antrian)) {
            // Get current antrian being processed
            $currentAntrian = Antrian::whereHas('pendaftaran', function($query) use ($pendaftaran) {
                    $query->where('poli_id', $pendaftaran->poli_id)
                          ->whereDate('tanggal_berobat', $pendaftaran->tanggal_berobat);
                })
                ->where('status', 'menunggu')
                ->orderBy('nomor_antrian')
                ->first();
                
            // Get next antrian
            $nextAntrian = Antrian::whereHas('pendaftaran', function($query) use ($pendaftaran) {
                    $query->where('poli_id', $pendaftaran->poli_id)
                          ->whereDate('tanggal_berobat', $pendaftaran->tanggal_berobat);
                })
                ->where('status', 'menunggu')
                ->orderBy('nomor_antrian')
                ->skip(1)
                ->first();
                
            // Calculate estimated wait time
            if ($currentAntrian && $pendaftaran->antrian->status === 'menunggu') {
                $waitingCount = $pendaftaran->antrian->nomor_antrian - $currentAntrian->nomor_antrian;
                if ($waitingCount > 0) {
                    $estimatedWait = $waitingCount * 6; // Assuming 6 minutes per patient
                } else if ($waitingCount === 0) {
                    $estimatedWait = 'Anda Sekarang!';
                }
            }
            
            $antrianData = [
                'poli' => $pendaftaran->poli,
                'currentAntrian' => $currentAntrian ? $currentAntrian->kode_antrian : '-',
                'nextAntrian' => $nextAntrian ? $nextAntrian->kode_antrian : '-',
                'yourAntrian' => $pendaftaran->antrian->kode_antrian,
                'estimatedWait' => $estimatedWait
            ];
        }

        return view('dashboard.pasien.index', compact(
            'polis', 
            'pasien', 
            'pendaftaran', 
            'waitingPosition',
            'antrianData'
        ));
    }
}
