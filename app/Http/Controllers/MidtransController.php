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
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = false;
        Config::$is3ds = true;
    }

    public function pay(Pembayaran $pembayaran)
    {
        if ($pembayaran->rekamMedisDetail->rekamMedis->pasien->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki akses ke pembayaran ini.');
        }

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
            $snapToken = Snap::getSnapToken($params);
            return view('pembayaran.pay', compact('snapToken', 'pembayaran'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memulai pembayaran: ' . $e->getMessage());
        }
    }

    public function callback(Request $request)
    {
        \Log::info('Midtrans callback received', $request->all());
        
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hashed == $request->signature_key) {
            \Log::info('Signature verified');
            if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {
                $pembayaran = Pembayaran::find($request->order_id);
                if ($pembayaran && $pembayaran->status_pembayaran === 'belum lunas') {
                    $pembayaran->status_pembayaran = 'lunas';
                    $pembayaran->tanggal_bayar = now();
                    $pembayaran->save();
                    \Log::info('Payment status updated to lunas', ['id' => $pembayaran->id]);
                } else {
                    \Log::info('Payment not found or already paid', ['id' => $request->order_id]);
                }
            } else {
                \Log::info('Transaction status not capture/settlement', ['status' => $request->transaction_status]);
            }
        } else {
            \Log::warning('Invalid signature', [
                'received' => $request->signature_key,
                'calculated' => $hashed
            ]);
        }

        return response('OK', 200);
    }
}