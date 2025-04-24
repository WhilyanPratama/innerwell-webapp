<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pendaftaran;
use App\Models\Poli;
use App\Models\JadwalDokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Add this import

class PasienPendaftaranController
{
    public function create()
    {
        $polis = Poli::all();
        $user = Auth::user();
        $pasien = $user->pasien;
        
        return view('pendaftaran.create', compact('polis', 'pasien'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'poli_id' => 'required|exists:polis,id',
            'jadwal_dokter_id' => 'required|exists:jadwal_dokters,id',
            'tanggal_berobat' => 'required|date',
            'keluhan' => 'required',
        ]);

        $pendaftaran = Pendaftaran::create([
            'pasien_id' => Auth::user()->pasien->id,
            'poli_id' => $request->poli_id,
            'jadwal_dokter_id' => $request->jadwal_dokter_id,
            'tanggal_berobat' => $request->tanggal_berobat,
            'keluhan' => $request->keluhan,
            'status_validasi' => 'menunggu'
        ]);

        return redirect()->route('pasien.dashboard')->with('success', 'Pendaftaran berhasil, menunggu validasi.');
    }

    public function status()
    {
        $pendaftaran = Pendaftaran::where('pasien_id', Auth::user()->pasien->id)
            ->where('status_validasi', 'menunggu')
            ->orderBy('created_at', 'desc')
            ->first();

        $waitingPosition = Pendaftaran::where('status_validasi', 'menunggu')
            ->where('created_at', '<=', $pendaftaran->created_at)
            ->count();

        return view('pendaftaran.status', compact('pendaftaran', 'waitingPosition'));
    }

    public function getJadwalDokter(Request $request)
    {
        $poli_id = $request->poli_id;
        $tanggal = $request->tanggal;
        $hari = strtolower(Carbon::parse($tanggal)->locale('id')->isoFormat('dddd'));

        $jadwalDokter = JadwalDokter::with(['dokter.user'])
            ->where('poli_id', $poli_id)
            ->where('hari', $hari)
            ->get();

        return response()->json($jadwalDokter);
        }
}
