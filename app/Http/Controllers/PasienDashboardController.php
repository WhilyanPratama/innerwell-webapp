<?php

namespace App\Http\Controllers;
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
        return view('dashboard.pasien.index', compact('polis', 'pasien'));
    }
}
