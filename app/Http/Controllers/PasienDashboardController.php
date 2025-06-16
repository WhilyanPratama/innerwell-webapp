<?php

namespace App\Http\Controllers;
use App\Models\Pendaftaran;
use App\Models\Antrian;
use App\Models\Poli;
use App\Models\Pembayaran;
use App\Models\Medicine;
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

        // Get unpaid invoices
        $tagihanBelumLunas = Pembayaran::whereHas('rekamMedisDetail', function($query) use ($pasien) {
            $query->whereHas('rekamMedis', function($q) use ($pasien) {
                $q->where('pasien_id', $pasien->id);
            });
        })->where('status_pembayaran', 'belum lunas')
        ->orderBy('created_at', 'desc')
        ->get();
        
        // Get payment history
        $riwayatPembayaran = Pembayaran::whereHas('rekamMedisDetail', function($query) use ($pasien) {
            $query->whereHas('rekamMedis', function($q) use ($pasien) {
                $q->where('pasien_id', $pasien->id);
            });
        })->where('status_pembayaran', 'lunas')
        ->orderBy('created_at', 'desc')
        ->get();

        return view('dashboard.pasien.index', compact(
            'polis', 
            'pasien', 
            'pendaftaran', 
            'waitingPosition',
            'antrianData', 
            'tagihanBelumLunas',
            'riwayatPembayaran'
        ));
    }

    public function showInvoice(Pembayaran $pembayaran)
    {
        // Pastikan pembayaran milik pasien yang sedang login
        $user = Auth::user();
        if ($pembayaran->rekamMedisDetail->rekamMedis->pasien->user_id !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

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