<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Poli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AntrianBoardController
{
    public function index(Request $request, Poli $poli)
    {
        $date = $request->date ?? now()->toDateString();
        
        // Get current antrian being processed
        $currentAntrian = Antrian::whereHas('pendaftaran', function($query) use ($poli, $date) {
                $query->where('poli_id', $poli->id)
                      ->whereDate('tanggal_berobat', $date);
            })
            ->where('status', 'menunggu')
            ->orderBy('nomor_antrian')
            ->first();
            
        // Get next antrian
        $nextAntrian = Antrian::whereHas('pendaftaran', function($query) use ($poli, $date) {
                $query->where('poli_id', $poli->id)
                      ->whereDate('tanggal_berobat', $date);
            })
            ->where('status', 'menunggu')
            ->orderBy('nomor_antrian')
            ->skip(1)
            ->first();
            
        // Get user's antrian if authenticated
        $yourAntrian = null;
        $estimatedWait = null;
        
        if (Auth::check() && Auth::user()->role === 'pasien') {
            $pasien = Auth::user()->pasien;
            
            $yourAntrian = Antrian::whereHas('pendaftaran', function($query) use ($poli, $date, $pasien) {
                    $query->where('poli_id', $poli->id)
                          ->where('pasien_id', $pasien->id)
                          ->whereDate('tanggal_berobat', $date);
                })
                ->where('status', 'menunggu')
                ->first();
                
            if ($yourAntrian && $currentAntrian) {
                $waitingCount = $yourAntrian->nomor_antrian - $currentAntrian->nomor_antrian;
                $estimatedWait = $waitingCount * 10; // Assuming 10 minutes per patient
            }
        }
        
        return view('dashboard.pasien.board', compact('poli', 'currentAntrian', 'nextAntrian', 'yourAntrian', 'estimatedWait'));
    }
}
