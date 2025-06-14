<?php

namespace App\Http\Controllers;
namespace App\Models\RekamMedisDetail;
namespace App\Models\Pembayaran;
namespace App\Models\Medicine;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class PembayaranController
{
    public function index()
    {
        return view('dashboard.pasien.pembayaran');
    }
}