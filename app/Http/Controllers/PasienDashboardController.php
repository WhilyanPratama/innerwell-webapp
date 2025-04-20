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

        $pendaftaran = Pendaftaran::where('pasien_id', $pasien->id)
            ->where('status_validasi', 'menunggu')
            ->orderBy('created_at', 'desc')
            ->first();

        $waitingPosition = null;
        if ($pendaftaran) {
            $waitingPosition = Pendaftaran::where('status_validasi', 'menunggu')
                ->where('created_at', '<=', $pendaftaran->created_at)
                ->count();
        }

        return view('dashboard.pasien.index', compact('polis', 'pasien', 'pendaftaran', 'waitingPosition'));
    }
}
