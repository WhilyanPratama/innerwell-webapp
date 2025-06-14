<?php

namespace App\Http\Controllers;

use App\Models\RekamMedisDetail;
use App\Models\Pembayaran;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminDashboardController
{
    public function index()
    {
        // Data for patients without payment today
        $belumBayar = RekamMedisDetail::whereDate('tanggal_periksa', now())
            ->whereDoesntHave('pembayaran')
            ->with(['rekamMedis.pasien.user', 'dokter.user', 'poli'])
            ->get();

        // Data for patients with payment
        $sudahBayar = Pembayaran::with(['rekamMedisDetail.rekamMedis.pasien.user', 'rekamMedisDetail.dokter.user', 'rekamMedisDetail.poli'])
            ->latest()
            ->get();

        return view('dashboard.admin.index', compact('belumBayar', 'sudahBayar'));
    }

    public function create(RekamMedisDetail $rekamMedisDetail)
    {
        // Ambil data obat dari rekam medis detail
        $obatIds = explode(' ; ', $rekamMedisDetail->obat);
        $obatIds = array_filter($obatIds); // Hapus empty values
        
        $obatList = [];
        $totalObat = 0;
        
        foreach ($obatIds as $obatId) {
            $obat = Medicine::find($obatId);
            if ($obat) {
                $obatList[] = $obat;
                $totalObat += $obat->harga;
            }
        }

        return view('dashboard.admin.pembayaran.create', compact('rekamMedisDetail', 'obatList', 'totalObat'));
    }

    public function store(Request $request, RekamMedisDetail $rekamMedisDetail)
    {
        $request->validate([
            'biaya_dokter' => 'required|integer|min:0',
            'biaya_layanan' => 'required|integer|min:0',
            'total_biaya' => 'required|integer|min:0',
        ]);

        Pembayaran::create([
            'id' => Str::uuid(),
            'rekam_medis_details_id' => $rekamMedisDetail->id,
            'nama_pasien' => $rekamMedisDetail->rekamMedis->pasien->user->nama_lengkap,
            'poli_id' => $rekamMedisDetail->poli_id,
            'dokter_id' => $rekamMedisDetail->dokter_id,
            'biaya_dokter' => $request->biaya_dokter,
            'biaya_layanan' => $request->biaya_layanan,
            'total_biaya' => $request->total_biaya,
            'status_pembayaran' => 'belum lunas',
        ]);

        return redirect()->route('admin.dashboard')
            ->with('success', 'Invoice berhasil dibuat');
    }

    public function show(Pembayaran $pembayaran)
    {
        $pembayaran->load(['rekamMedisDetail.rekamMedis.pasien.user', 'rekamMedisDetail.dokter.user', 'rekamMedisDetail.poli']);
        
        // Ambil data obat
        $obatIds = explode(' ; ', $pembayaran->rekamMedisDetail->obat);
        $obatIds = array_filter($obatIds);
        
        $obatList = [];
        foreach ($obatIds as $obatId) {
            $obat = Medicine::find($obatId);
            if ($obat) {
                $obatList[] = $obat;
            }
        }

        return view('dashboard.admin.pembayaran.show', compact('pembayaran', 'obatList'));
    }
}