<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InnerWell Klinik - Detail Invoice</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            body * {
                visibility: hidden;
            }
            .min-h-screen {
                min-height: auto !important;
            }
            main, main * {
                visibility: visible;
            }
            main {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }
            .bg-gray-50 {
                background-color: white !important;
            }
            .shadow-md {
                box-shadow: none !important;
            }
            .no-print {
                display: none !important;
            }
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <nav id="navbar" class="fixed top-0 left-0 h-full w-64 bg-green-600 hover:bg-green-700 text-white shadow-lg z-30 rounded-r-lg transform -translate-x-full flex-col no-print">
            <div class="p-5 flex items-center justify-between">
                <div class="flex items-center space-x-2 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-white-600 group-hover:animate-pulse">
                        <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/>
                        <path d="M3.22 12H9.5l.7-1.44 2.1 4.24 1.4-2.82h4.78"/>
                    </svg>
                    <span class="text-xl font-semibold">InnerWell</span>
                </div>
            </div>
            <div class="flex-grow p-4">
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route(Auth::user()->role . '.dashboard') }}" class="flex items-center space-x-3 px-4 py-2 rounded-md text-white font-medium hover:bg-white hover:bg-opacity-10 transition duration-150">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                            <span>Dashboard</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="p-4 border-t border-green-400 border-opacity-50">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center space-x-3 px-4 py-2 rounded-md text-white hover:bg-white hover:bg-opacity-10 transition duration-150">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013 3v1"></path></svg>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </nav>

        <div class="flex-1 flex flex-col">
            <header id="header" class="bg-white shadow-sm p-4 fixed top-0 left-0 right-0 z-20 no-print">
                 <div class="flex justify-between items-center w-full">
                     <div class="flex items-center space-x-4">
                         <button id="navbar-toggle" class="text-gray-600 hover:text-green-600 focus:outline-none">
                             <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                         </button>
                         <div class="flex items-center space-x-2 text-gray-800">
                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-green-600"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/><path d="M3.22 12H9.5l.7-1.44 2.1 4.24 1.4-2.82h4.78"/></svg>
                             <span class="text-xl font-semibold hidden sm:inline">InnerWell Klinik - {{ ucfirst(Auth::user()->role) }}</span>
                         </div>
                     </div>
                     <div class="text-sm text-gray-600">
                         Selamat datang, <span class="font-medium">{{ Auth::user()->nama_lengkap }}</span>
                     </div>
                 </div>
            </header>

            <main class="flex-1 p-6 mt-16">
                <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-md">
                    <div class="mb-6 flex justify-between items-center">
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900">Detail Invoice</h1>
                            <p class="text-gray-600">Invoice #{{ substr($pembayaran->id, 0, 8) }}</p>
                        </div>
                        <div class="flex space-x-2 no-print">
                            {{-- Tombol Kembali yang dinamis berdasarkan role --}}
                            @if(Auth::check())
                                <a href="{{ route(Auth::user()->role . '.dashboard') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                                    Kembali
                                </a>
                            @endif
                            
                            <button onclick="window.print()" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                                Cetak
                            </button>
                            
                             @if(Auth::check() && Auth::user()->role === 'pasien' && $pembayaran->status_pembayaran === 'belum lunas')
                                <a href="{{ route('pasien.pembayaran.pay', $pembayaran->id) }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                                    Bayar Sekarang
                                </a>
                            @endif
                        </div>
                    </div>
                                        
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-8">
                                <div>
                                    <h2 class="text-xl font-bold text-gray-800">InnerWell Klinik</h2>
                                    <p class="text-gray-600">Jl. Kesehatan No. 123, Jakarta</p>
                                    <p class="text-gray-600">Telp: (021) 123-4567</p>
                                </div>
                                <div class="text-right">
                                    <h3 class="text-lg font-semibold text-gray-800">INVOICE</h3>
                                    <p class="text-gray-600">Tanggal: {{ $pembayaran->created_at->format('d M Y') }}</p>
                                    <p class="text-gray-600">Status:
                                        <span class="@if($pembayaran->status_pembayaran === 'lunas') text-green-600 @else text-yellow-600 @endif font-medium">
                                            {{ ucfirst($pembayaran->status_pembayaran) }}
                                        </span>
                                    </p>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-2 gap-6 mb-8">
                                <div>
                                    <h3 class="text-gray-700 font-semibold mb-2">Data Pasien</h3>
                                    <p><span class="text-gray-600">Nama:</span> {{ $pembayaran->nama_pasien }}</p>
                                    <p><span class="text-gray-600">No. Rekam Medis:</span> {{ $pembayaran->rekamMedisDetail->rekamMedis->nomor_rekam_medis }}</p>
                                </div>
                                <div>
                                    <h3 class="text-gray-700 font-semibold mb-2">Data Pemeriksaan</h3>
                                    <p><span class="text-gray-600">Poli:</span> {{ $pembayaran->rekamMedisDetail->poli->nama_poli }}</p>
                                    <p><span class="text-gray-600">Dokter:</span> {{ $pembayaran->rekamMedisDetail->dokter->user->nama_lengkap }}</p>
                                    <p><span class="text-gray-600">Tanggal:</span> {{ \Carbon\Carbon::parse($pembayaran->rekamMedisDetail->tanggal_periksa)->format('d M Y') }}</p>
                                </div>
                            </div>
                            
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Keterangan</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach($obatList as $index => $obat)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $index + 1 }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $obat->nama_obat }} ({{ $obat->jenis }})</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">1</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rp {{ number_format($obat->harga, 0, ',', '.') }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rp {{ number_format($obat->harga, 0, ',', '.') }}</td>
                                            </tr>
                                        @endforeach
                                        
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ count($obatList) + 1 }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Biaya Dokter</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">1</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rp {{ number_format($pembayaran->biaya_dokter, 0, ',', '.') }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rp {{ number_format($pembayaran->biaya_dokter, 0, ',', '.') }}</td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ count($obatList) + 2 }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Biaya Layanan</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">1</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rp {{ number_format($pembayaran->biaya_layanan, 0, ',', '.') }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rp {{ number_format($pembayaran->biaya_layanan, 0, ',', '.') }}</td>
                                        </tr>
                                        
                                        <tr class="bg-gray-50">
                                            <td colspan="4" class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900 text-right">Total</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900">Rp {{ number_format($pembayaran->total_biaya, 0, ',', '.') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            
                            {{-- CATATAN BARU --}}
                            <div class="mt-8 border-t pt-6">
                                <h3 class="text-gray-700 font-semibold mb-2">Catatan</h3>
                                <p class="text-gray-600">Terima kasih atas kepercayaan Anda kepada InnerWell Klinik.</p>
                                @if($pembayaran->status_pembayaran === 'belum lunas')
                                <p class="text-gray-600">Silakan selesaikan pembayaran melalui tombol "Bayar Sekarang" di atas atau secara tunai di kasir.</p>
                                @else
                                <p class="text-gray-600">Pembayaran telah berhasil kami terima. Semoga lekas sembuh!</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navbarToggle = document.getElementById('navbar-toggle');
            const navbar = document.getElementById('navbar');
            
            if (navbarToggle && navbar) {
                navbarToggle.addEventListener('click', function() {
                    navbar.classList.toggle('-translate-x-full');
                });
            }
        });
    </script>
</body>
</html>