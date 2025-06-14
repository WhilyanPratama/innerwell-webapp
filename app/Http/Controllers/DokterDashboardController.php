<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Pasien;
use App\Models\RekamMedis;
use App\Models\RekamMedisDetail;
use App\Models\Medicine;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DokterDashboardController 
{
    public function index(Request $request)
    {
        $dokter = Auth::user()->dokter;
        
        // Get selected date (default today)
        $selectedDate = $request->date ? Carbon::parse($request->date) : Carbon::today();
        
        // Get week dates for navigation
        $weekStart = Carbon::parse($selectedDate)->startOfWeek();
        $weekDates = [];
        for ($i = 0; $i < 7; $i++) {
            $date = $weekStart->copy()->addDays($i);
            $weekDates[] = [
                'date' => $date->format('Y-m-d'),
                'day' => $date->format('l'),
                'formatted' => $date->format('d M Y')
            ];
        }

        $medicinesQuery = Medicine::query();
    
        if ($request->search) {
            $medicinesQuery->where(function($query) use ($request) {
                $query->where('nama_obat', 'like', '%' . $request->search . '%')
                    ->orWhere('katagori', 'like', '%' . $request->search . '%');
            });
        }

         $medicines = $medicinesQuery->orderBy('nama_obat', 'asc')->paginate(10);
        
        // Get antrians for the selected date
        $menungguAntrians = Antrian::where('dokter_id', $dokter->id)
            ->whereHas('Pendaftaran', function ($query) use ($selectedDate) {
                $query->whereDate('tanggal_berobat', $selectedDate);            })
            ->where('status', 'menunggu')
            ->with(['pendaftaran.pasien.user', 'pendaftaran.poli'])
            ->orderBy('nomor_antrian')
            ->get();
            
        $lewatiAntrians = Antrian::where('dokter_id', $dokter->id)
            ->whereDate('created_at', $selectedDate)
            ->where('status', 'lewati')
            ->with(['pendaftaran.pasien.user', 'pendaftaran.poli'])
            ->orderBy('nomor_antrian')
            ->get();
            
        $selesaiAntrians = Antrian::where('dokter_id', $dokter->id)
            ->whereDate('created_at', $selectedDate)
            ->where('status', 'selesai')
            ->with(['pendaftaran.pasien.user', 'pendaftaran.poli'])
            ->orderBy('nomor_antrian')
            ->get();

        // Get antrians for the selected date
        $menungguAntrians = Antrian::where('dokter_id', $dokter->id)
            ->whereHas('Pendaftaran', function ($query) use ($selectedDate) {
                $query->whereDate('tanggal_berobat', $selectedDate);
            })
            ->where('status', 'menunggu')
            ->with(['pendaftaran.pasien.user', 'pendaftaran.poli'])
            ->orderBy('nomor_antrian')
            ->get();
            
        $lewatiAntrians = Antrian::where('dokter_id', $dokter->id)
            ->whereDate('created_at', $selectedDate)
            ->where('status', 'lewati')
            ->with(['pendaftaran.pasien.user', 'pendaftaran.poli'])
            ->orderBy('nomor_antrian')
            ->get();
            
        $selesaiAntrians = Antrian::where('dokter_id', $dokter->id)
            ->whereDate('created_at', $selectedDate)
            ->where('status', 'selesai')
            ->with(['pendaftaran.pasien.user', 'pendaftaran.poli'])
            ->orderBy('nomor_antrian')
            ->get();

        return view('dashboard.dokter.index', compact(
            'menungguAntrians', 
            'lewatiAntrians', 
            'selesaiAntrians', 
            'selectedDate',
            'weekDates',
            'medicines'
        ));
    }

    public function nextPatient(Request $request, Antrian $antrian)
    {
       
    // Debug incoming data
    // dd([
    //     'request_all' => $request->all(),
    // ]);

    // dd($request->all());

    // Rest of your code...

        $request->validate([
            'diagnosa' => 'required|string',
            'obat' => 'required|string',
        ]);

        // Update antrian status
        $antrian->status = 'selesai';
        $antrian->waktu_selesai = now();
        $antrian->save();

        // Get or create rekam medis
        $rekamMedis = RekamMedis::firstOrCreate(
            ['pasien_id' => $antrian->pendaftaran->pasien_id],
            ['nomor_rekam_medis' => 'RM-' . str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT)]
        );

        // Create rekam medis detail
        RekamMedisDetail::create([
            'rekam_medis_id' => $rekamMedis->id,
            'antrian_id' => $antrian->id,
            'dokter_id' => $antrian->dokter_id,
            'poli_id' => $antrian->pendaftaran->poli_id,
            'tanggal_periksa' => now()->toDateString(),
            'keluhan' => $antrian->pendaftaran->keluhan,
            'diagnosa' => $request->diagnosa,
            'obat' => $request->obat,
            'pilihan' => $request->pilihan, // Tambahkan ini
        ]);

        return redirect()->route('dokter.dashboard')
            ->with('success', 'Pasien selesai diperiksa dan rekam medis telah diperbarui');
    }

    public function skipPatient(Antrian $antrian)
    {
        $antrian->status = 'lewati';  // Status value must be quoted
        $antrian->save();

        return redirect()->route('dokter.dashboard')
            ->with('success', 'Pasien dilewati');
    }
    
    public function processSkippedPatient(Request $request, Antrian $antrian)
    {
        $request->validate([
            'diagnosa' => 'required|string',
            'obat' => 'required|string',
        ]);

        // Update antrian status
        $antrian->status = 'selesai';
        $antrian->waktu_selesai = now();
        $antrian->save();

        // Get or create rekam medis
        $rekamMedis = RekamMedis::firstOrCreate(
            ['pasien_id' => $antrian->pendaftaran->pasien_id],
            ['nomor_rekam_medis' => 'RM-' . str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT)]
        );

        // Create rekam medis detail
        RekamMedisDetail::create([
            'rekam_medis_id' => $rekamMedis->id,
            'antrian_id' => $antrian->id,
            'dokter_id' => $antrian->dokter_id,
            'poli_id' => $antrian->pendaftaran->poli_id,
            'tanggal_periksa' => now()->toDateString(),
            'keluhan' => $antrian->pendaftaran->keluhan,
            'diagnosa' => $request->diagnosa,
            'obat' => $request->obat,
        ]);

        return redirect()->route('dokter.dashboard')
            ->with('success', 'Pasien yang dilewati telah selesai diperiksa');
    }
    
    public function viewMedicalRecord(Pasien $pasien)
    {
        $rekamMedis = RekamMedis::where('pasien_id', $pasien->id)->first();
        
        if (!$rekamMedis) {
            return redirect()->route('dokter.dashboard')
                ->with('error', 'Rekam medis tidak ditemukan');
        }
        
        $details = RekamMedisDetail::where('rekam_medis_id', $rekamMedis->id)
            ->with(['dokter.user', 'poli'])
            ->orderBy('tanggal_periksa', 'desc')
            ->get();
            
        return view('dashboard.dokter.medical-record', compact('pasien', 'rekamMedis', 'details'));
    }
}
