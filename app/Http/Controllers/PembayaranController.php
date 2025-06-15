<?php

namespace App\Http\Controllers;

use App\Models\RekamMedisDetail\RekamMedisDetail; 
use App\Models\Pembayaran\Pembayaran;              
use App\Models\Medicine\Medicine;                  
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PembayaranController
{
    public function index()
    {
        return view('dashboard.pasien.pembayaran');
    }
}
