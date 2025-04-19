<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DokterDashboardController
{
    public function index()
    {
        $dokter = Auth::user()->dokter;
        
        $antrians = Antrian::where('dokter_id', $dokter->id)
            ->whereDate('created_at', now())
            ->with(['pendaftaran.pasien.user'])
            ->orderBy('nomor_antrian')
            ->get();

        return view('dashboard.dokter.index', compact('antrians'));
    }

    public function nextPatient(Antrian $antrian)
    {
        $antrian->status = 'selesai';
        $antrian->waktu_selesai = now();
        $antrian->save();

        return redirect()->route('dokter.dashboard')
            ->with('success', 'Pasien selesai diperiksa');
    }

    public function skipPatient(Antrian $antrian)
    {
        $antrian->status = 'lewati';
        $antrian->save();

        return redirect()->route('dokter.dashboard')
            ->with('success', 'Pasien dilewati');
    }
}
