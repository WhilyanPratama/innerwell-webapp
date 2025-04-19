<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController
{
    public function admin()
    {
        return view('dashboard.admin');
    }

    public function dokter()
    {
        return view('dashboard.dokter');
    }

    public function pasien()
    {
        return view('dashboard.pasien');
    }

    public function manajemen()
    {
        return view('dashboard.manajemen');
    }

    public function resepsionis()
    {
        return view('dashboard.resepsionis');
    }
}
