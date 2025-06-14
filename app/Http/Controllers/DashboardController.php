<?php

namespace App\Http\Controllers;

use App\Models\RekamMedisDetail;
use App\Models\Pembayaran;
use App\Models\Medicine;

use Illuminate\Http\Request;

class DashboardController
{
    public function admin()
    {
        // sengaja dibuat double soalnya crfs udh terlanjut nge save ini, belum tau ngubahnya gimana.
        // Ambil data pasien yang sudah berobat hari ini tapi belum ada invoice
        $belumBayar = RekamMedisDetail::whereDate('tanggal_periksa', now())
            ->whereDoesntHave('pembayaran')
            ->with(['rekamMedis.pasien.user', 'dokter.user', 'poli'])
            ->get();

        // Ambil data pasien yang sudah ada invoice
        $sudahBayar = Pembayaran::with(['rekamMedisDetail.rekamMedis.pasien.user', 'rekamMedisDetail.dokter.user', 'rekamMedisDetail.poli'])
            ->latest()
            ->get();
        return view('dashboard.admin.index');
    }

    public function pasien()
    {
        return view('dashboard.pasien.index');
    }

    public function manajemen()
    {
        return view('dashboard.manajemen.index');
    }
}
