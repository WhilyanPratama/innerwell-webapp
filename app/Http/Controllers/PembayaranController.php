<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PembayaranController
{
    public function index()
    {
        return view('dashboard.pasien.pembayaran');
}

}