<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Antrian;
use Illuminate\Http\Request;

class ResepsionisDashboardController
{
    public function index()
    {
        $pendaftaranList = Pendaftaran::where('status_validasi', 'menunggu')
            ->with(['pasien.user', 'poli', 'jadwalDokter.dokter.user'])
            ->orderBy('created_at', 'asc')
            ->get();

        return view('dashboard.resepsionis.index', compact('pendaftaranList'));
    }

    public function validate(Request $request, Pendaftaran $pendaftaran)
    {
        $request->validate([
            'status' => 'required|in:disetujui,ditolak'
        ]);

        $pendaftaran->status_validasi = $request->status;
        $pendaftaran->save();

        if ($request->status === 'disetujui') {
            // Generate nomor antrian
            $lastAntrian = Antrian::where('dokter_id', $pendaftaran->jadwalDokter->dokter_id)
                ->whereDate('created_at', now())
                ->latest('nomor_antrian')
                ->first();

            $nomorAntrian = $lastAntrian ? $lastAntrian->nomor_antrian + 1 : 1;
            
            // Create antrian
            Antrian::create([
                'pendaftaran_id' => $pendaftaran->id,
                'dokter_id' => $pendaftaran->jadwalDokter->dokter_id,
                'kode_antrian' => $pendaftaran->poli->kode_poli . str_pad($nomorAntrian, 3, '0', STR_PAD_LEFT),
                'nomor_antrian' => $nomorAntrian,
                'status' => 'menunggu',
                'waktu_daftar' => now(),
            ]);
        }

        return redirect()->route('resepsionis.dashboard')
            ->with('success', 'Pendaftaran berhasil ' . ($request->status === 'disetujui' ? 'disetujui' : 'ditolak'));
    }
}
