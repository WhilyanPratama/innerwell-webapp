<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Invoice - InnerWell Klinic</title>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md text-center border">
        <h1 class="text-2xl font-bold text-gray-800 mb-2">Konfirmasi Pembayaran</h1>
        <p class="text-gray-500 mb-6">Harap periksa detail tagihan Anda sebelum melanjutkan.</p>

        <div class="text-left bg-gray-50 p-4 rounded-lg mb-6 border space-y-2">
            <p><strong>Invoice ID:</strong> #{{ substr($pembayaran->id, 0, 8) }}</p>
            <p><strong>Nama Pasien:</strong> {{ $pembayaran->nama_pasien }}</p>
            <p><strong>Total Tagihan:</strong> <span class="font-bold text-lg text-green-600">Rp {{ number_format($pembayaran->total_biaya, 0, ',', '.') }}</span></p>
        </div>

        <button id="pay-button" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-4 rounded-lg transition-all duration-200 shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
            Bayar Sekarang
        </button>
         <a href="{{ route('pasien.dashboard') }}" class="inline-block mt-4 text-sm text-gray-600 hover:text-black">Kembali ke Dashboard</a>
    </div>

    <script type="text/javascript">
      document.getElementById('pay-button').onclick = function(){
        snap.pay('{{ $snapToken }}', {
          onSuccess: function(result){
            alert("Pembayaran berhasil!");
            window.location.href = "{{ route('pasien.dashboard') }}";
          },
          onPending: function(result){
            alert("Menunggu pembayaran Anda!");
          },
          onError: function(result){
            alert("Pembayaran gagal!");
          },
          onClose: function(){
            alert('Anda menutup popup tanpa menyelesaikan pembayaran.');
          }
        })
      };
    </script>
</body>
</html>