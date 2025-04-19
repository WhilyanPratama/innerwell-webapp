<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController
{
    public function admin()
    {
        return view('dashboard.admin.admindashboard');
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
