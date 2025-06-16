<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;

class MidtransController extends Controller
{
    public function __construct()
    {
        // Set konfigurasi Midtrans saat controller diinisialisasi
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function pay(Pembayaran $pembayaran)
    {
        // Pastikan pembayaran ini milik user yang sedang login
        if ($pembayaran->rekamMedisDetail->rekamMedis->pasien->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki akses ke pembayaran ini.');
        }

        // Buat parameter untuk Midtrans Snap
        $params = [
            'transaction_details' => [
                'order_id' => $pembayaran->id,
                'gross_amount' => $pembayaran->total_biaya,
            ],
            'customer_details' => [
                'first_name' => $pembayaran->nama_pasien,
                'email' => $pembayaran->rekamMedisDetail->rekamMedis->pasien->user->email,
                'phone' => $pembayaran->rekamMedisDetail->rekamMedis->pasien->user->no_telp,
            ],
        ];

        try {
            // Dapatkan Snap Token
            $snapToken = Snap::getSnapToken($params);
            // Kirim Snap Token ke view
            return view('pembayaran.pay', compact('snapToken', 'pembayaran'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memulai pembayaran: ' . $e->getMessage());
        }
    }

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {
                $pembayaran = Pembayaran::find($request->order_id);
                if ($pembayaran && $pembayaran->status_pembayaran === 'belum lunas') {
                    $pembayaran->status_pembayaran = 'lunas';
                    $pembayaran->tanggal_bayar = now();
                    $pembayaran->save();
                }
            }
        }

        return response('OK', 200);
    }
}