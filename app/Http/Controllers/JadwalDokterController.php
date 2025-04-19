<?php

namespace App\Http\Controllers;

use App\Models\JadwalDokter;
use App\Models\Dokter;
use App\Models\Poli;
use Illuminate\Http\Request;

class JadwalDokterController
{
    public function index()
    {
        $jadwalDokter = JadwalDokter::with(['dokter.user', 'poli'])
            ->orderBy('hari')
            ->orderBy('jam_mulai')
            ->get();
        
        return view('jadwal.index', compact('jadwalDokter'));
    }

    public function create()
    {
        $dokters = Dokter::with('user')->get();
        $polis = Poli::all();
        $haris = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu'];
        $sesis = ['pagi', 'siang', 'sore'];
        
        return view('jadwal.create', compact('dokters', 'polis', 'haris', 'sesis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'dokter_id' => 'required|exists:dokters,id',
            'poli_id' => 'required|exists:polis,id',
            'hari' => 'required|in:senin,selasa,rabu,kamis,jumat,sabtu',
            'sesi' => 'required|in:pagi,siang,sore',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
            'kuota' => 'required|integer|min:1'
        ]);

        JadwalDokter::create($request->all());

        return redirect()->route('jadwal.index')
            ->with('success', 'Jadwal dokter berhasil ditambahkan');
    }

    public function edit(JadwalDokter $jadwal)
    {
        $dokters = Dokter::with('user')->get();
        $polis = Poli::all();
        $haris = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu'];
        $sesis = ['pagi', 'siang', 'sore'];
        
        return view('jadwal.edit', compact('jadwal', 'dokters', 'polis', 'haris', 'sesis'));
    }

    public function update(Request $request, JadwalDokter $jadwal)
    {
        $request->validate([
            'dokter_id' => 'required|exists:dokters,id',
            'poli_id' => 'required|exists:polis,id',
            'hari' => 'required|in:senin,selasa,rabu,kamis,jumat,sabtu',
            'sesi' => 'required|in:pagi,siang,sore',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
            'kuota' => 'required|integer|min:1'
        ]);

        $jadwal->update($request->all());

        return redirect()->route('jadwal.index')
            ->with('success', 'Jadwal dokter berhasil diperbarui');
    }

    public function destroy(JadwalDokter $jadwal)
    {
        $jadwal->delete();

        return redirect()->route('jadwal.index')
            ->with('success', 'Jadwal dokter berhasil dihapus');
    }
}
