<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\RekamMedisDetail;
use App\Models\User;
use App\Models\Medicine;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManajemenDashboardController extends Controller
{
    public function index(Request $request)
    {
        // Get filter period
        $period = $request->get('period', 'month');
        $customDate = $request->get('date');
        
        // Calculate date ranges
        $now = Carbon::now();
        $startDate = $this->getStartDate($period, $customDate);
        $endDate = $now;

        // Income This Month (hanya yang lunas)
        $incomeThisMonth = Pembayaran::where('status_pembayaran', 'lunas')
            ->whereMonth('created_at', $now->month)
            ->whereYear('created_at', $now->year)
            ->sum('total_biaya');

        // Profit & Loss Data (hanya yang lunas)
        $totalIncome = Pembayaran::where('status_pembayaran', 'lunas')->sum('total_biaya');
        $totalCost = $this->calculateTotalCost();
        $totalEarning = $totalIncome - $totalCost;

        // Patient Data (hanya yang sudah bayar lunas)
        $pasienTerdaftar = $this->getPasienTerdaftarBulanIni();
        $pasienBerobat = $this->getPasienBerobatBulanIni();

        // Medicine Sales Data (hanya dari pembayaran lunas)
        $obatTerjual = $this->getMedicineSalesData();

        // Chart Data (12 months, hanya yang lunas)
        $chartData = $this->getChartData();

        // Invoice Data with pagination (hanya yang lunas)
        $invoices = $this->getInvoiceData($startDate, $endDate);

        return view('dashboard.manajemen.index', compact(
            'incomeThisMonth',
            'totalIncome',
            'totalCost', 
            'totalEarning',
            'pasienTerdaftar',
            'pasienBerobat',
            'obatTerjual',
            'chartData',
            'invoices'
        ));
    }

    public function showInvoice(Pembayaran $pembayaran)
    {
        // Load relationships
        $pembayaran->load(['rekamMedisDetail.rekamMedis.pasien.user', 'rekamMedisDetail.dokter.user', 'rekamMedisDetail.poli']);
        
        // Get medicine list from rekam medis detail
        $obatList = [];
        if ($pembayaran->rekamMedisDetail && $pembayaran->rekamMedisDetail->obat) {
            $obatIds = explode(' ; ', $pembayaran->rekamMedisDetail->obat);
            $obatIds = array_filter($obatIds);
            
            foreach ($obatIds as $obatId) {
                $obat = Medicine::find($obatId);
                if ($obat) {
                    $obatList[] = $obat;
                }
            }
        }

        return view('dashboard.admin.pembayaran.show', compact('pembayaran', 'obatList'));
    }

    private function getStartDate($period, $customDate = null)
    {
        $now = Carbon::now();
        
        switch ($period) {
            case 'today':
                return $now->startOfDay();
            case 'week':
                return $now->subWeek()->startOfDay();
            case 'month':
                return $now->subMonth()->startOfDay();
            case 'year':
                return $now->subYear()->startOfDay();
            case 'custom':
                return $customDate ? Carbon::parse($customDate)->startOfDay() : $now->subMonth();
            default:
                return $now->subMonth()->startOfDay();
        }
    }

    private function calculateTotalCost()
    {
        // Hitung total biaya dokter dari pembayaran yang lunas
        $biayaDokter = Pembayaran::where('status_pembayaran', 'lunas')->sum('biaya_dokter');
        
        // Hitung total biaya obat dari rekam medis yang pembayarannya lunas
        $biayaObat = 0;
        $pembayaranLunas = Pembayaran::where('status_pembayaran', 'lunas')
            ->with('rekamMedisDetail')
            ->get();

        foreach ($pembayaranLunas as $pembayaran) {
            if ($pembayaran->rekamMedisDetail && $pembayaran->rekamMedisDetail->obat) {
                $obatIds = explode(' ; ', $pembayaran->rekamMedisDetail->obat);
                $obatIds = array_filter($obatIds);
                
                foreach ($obatIds as $obatId) {
                    $obat = Medicine::find($obatId);
                    if ($obat) {
                        $biayaObat += $obat->harga;
                    }
                }
            }
        }

        return $biayaDokter + $biayaObat;
    }

    private function getPasienTerdaftarBulanIni()
    {
        // Hitung pasien yang terdaftar bulan ini dan sudah ada pembayaran lunas
        return Pembayaran::where('status_pembayaran', 'lunas')
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->distinct('rekam_medis_details_id')
            ->count();
    }

    private function getPasienBerobatBulanIni()
    {
        // Hitung pasien yang berobat bulan ini dengan pembayaran lunas
        return Pembayaran::where('status_pembayaran', 'lunas')
            ->whereHas('rekamMedisDetail', function($query) {
                $query->whereMonth('tanggal_periksa', Carbon::now()->month)
                      ->whereYear('tanggal_periksa', Carbon::now()->year);
            })
            ->distinct('rekam_medis_details_id')
            ->count();
    }

    private function getMedicineSalesData()
    {
        $medicineSales = [];
        $medicineCount = [];

        // Ambil hanya dari pembayaran yang lunas
        $pembayaranLunas = Pembayaran::where('status_pembayaran', 'lunas')
            ->whereHas('rekamMedisDetail', function($query) {
                $query->whereMonth('tanggal_periksa', Carbon::now()->month)
                      ->whereYear('tanggal_periksa', Carbon::now()->year);
            })
            ->with('rekamMedisDetail')
            ->get();

        foreach ($pembayaranLunas as $pembayaran) {
            if ($pembayaran->rekamMedisDetail && $pembayaran->rekamMedisDetail->obat) {
                $obatIds = explode(' ; ', $pembayaran->rekamMedisDetail->obat);
                $obatIds = array_filter($obatIds);
                
                foreach ($obatIds as $obatId) {
                    $obat = Medicine::find($obatId);
                    if ($obat) {
                        $key = $obat->nama_obat;
                        if (!isset($medicineCount[$key])) {
                            $medicineCount[$key] = [
                                'nama' => $obat->nama_obat,
                                'qty' => 0,
                                'harga' => $obat->harga,
                                'total' => 0
                            ];
                        }
                        $medicineCount[$key]['qty']++;
                        $medicineCount[$key]['total'] += $obat->harga;
                    }
                }
            }
        }

        return array_slice($medicineCount, 0, 10); // Top 10
    }

    private function getChartData()
    {
        $chartLabels = [];
        $chartDataValues = [];

        for ($i = 11; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $chartLabels[] = $date->format('M Y');
            
            // Hanya hitung income dari pembayaran yang lunas
            $income = Pembayaran::where('status_pembayaran', 'lunas')
                ->whereMonth('created_at', $date->month)
                ->whereYear('created_at', $date->year)
                ->sum('total_biaya');
            
            $chartDataValues[] = (int) $income;
        }

        return [
            'chartLabels' => $chartLabels,
            'chartData' => $chartDataValues
        ];
    }

    private function getInvoiceData($startDate, $endDate)
    {
        // Hanya tampilkan invoice yang sudah lunas
        return Pembayaran::where('status_pembayaran', 'lunas')
            ->with(['rekamMedisDetail.rekamMedis.pasien.user', 'rekamMedisDetail.dokter.user', 'rekamMedisDetail.poli'])
            ->whereBetween('created_at', [$startDate, $endDate])
            ->orderBy('created_at', 'desc')
            ->paginate(25);
    }
}
