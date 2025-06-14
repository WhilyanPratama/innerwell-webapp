<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InnerWell Klinik - Buat Invoice</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <nav id="navbar" class="fixed top-0 left-0 h-full w-64 bg-green-600 hover:bg-green-700 text-white shadow-lg z-30 rounded-r-lg transform -translate-x-full flex flex-col">
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
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 px-4 py-2 rounded-md text-white font-medium hover:bg-white hover:bg-opacity-10 transition duration-150">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 px-4 py-2 rounded-md bg-white bg-opacity-20 text-white font-medium hover:bg-opacity-30 transition duration-150">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                            <span>Manajemen Pembayaran</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="p-4 border-t border-green-400 border-opacity-50">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center space-x-3 px-4 py-2 rounded-md text-white hover:bg-white hover:bg-opacity-10 transition duration-150">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </nav>

        <div class="flex-1 flex flex-col">
            <!-- Header -->
            <header id="header" class="bg-white shadow-sm p-4 fixed top-0 left-0 right-0 z-20">
                <div class="flex justify-between items-center w-full">
                    <div class="flex items-center space-x-4">
                        <button id="navbar-toggle" class="text-gray-600 hover:text-green-600 focus:outline-none">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                            </svg>
                        </button>
                        <div class="flex items-center space-x-2 text-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-green-600">
                                <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/>
                                <path d="M3.22 12H9.5l.7-1.44 2.1 4.24 1.4-2.82h4.78"/>
                            </svg>
                            <span class="text-xl font-semibold hidden sm:inline">InnerWell Klinik - Admin</span>
                        </div>
                    </div>
                    <div class="text-sm text-gray-600">
                        Selamat datang, <span class="font-medium">{{ Auth::user()->nama_lengkap ?? 'Admin' }}</span>
                    </div>
                </div>
            </header>

            <main class="flex-1 pt-20 p-6 bg-gray-50">
                <div class="max-w-4xl mx-auto">
                    <div class="mb-6 flex justify-between items-center">
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900">Buat Invoice</h1>
                            <p class="text-gray-600">Buat invoice pembayaran untuk pasien</p>
                        </div>
                        <a href="{{ route('admin.dashboard') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                            Kembali
                        </a>
                    </div>
                    
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <div class="p-6">
                            <div class="grid grid-cols-2 gap-6 mb-6">
                                <div>
                                    <h3 class="text-gray-700 font-semibold mb-2">Data Pasien</h3>
                                    <p><span class="text-gray-600">Nama:</span> {{ $rekamMedisDetail->rekamMedis->pasien->user->nama_lengkap }}</p>
                                    <p><span class="text-gray-600">No. Rekam Medis:</span> {{ $rekamMedisDetail->rekamMedis->nomor_rekam_medis }}</p>
                                </div>
                                <div>
                                    <h3 class="text-gray-700 font-semibold mb-2">Data Pemeriksaan</h3>
                                    <p><span class="text-gray-600">Poli:</span> {{ $rekamMedisDetail->poli->nama_poli }}</p>
                                    <p><span class="text-gray-600">Dokter:</span> {{ $rekamMedisDetail->dokter->user->nama_lengkap }}</p>
                                    <p><span class="text-gray-600">Tanggal:</span> {{ \Carbon\Carbon::parse($rekamMedisDetail->tanggal_periksa)->format('d M Y') }}</p>
                                </div>
                            </div>
                            
                            <form action="{{ route('pembayaran.store', $rekamMedisDetail->id) }}" method="POST">
                                @csrf
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
                                            <!-- Daftar Obat -->
                                            @foreach($obatList as $index => $obat)
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                        {{ $index + 1 }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                        {{ $obat->nama_obat }} ({{ $obat->jenis }})
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                        1
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                        Rp {{ number_format($obat->harga, 0, ',', '.') }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                        Rp {{ number_format($obat->harga, 0, ',', '.') }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                            
                                            <!-- Biaya Dokter -->
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    {{ count($obatList) + 1 }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    Biaya Dokter
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    <input type="number" name="biaya_dokter" id="biaya_dokter" class="border rounded px-3 py-2 w-32" value="50000" min="0" required>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 biaya-dokter-subtotal">
                                                    Rp 50.000
                                                </td>
                                            </tr>
                                            
                                            <!-- Biaya Layanan -->
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    {{ count($obatList) + 2 }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    Biaya Layanan
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    <input type="number" name="biaya_layanan" id="biaya_layanan" class="border rounded px-3 py-2 w-32" value="25000" min="0" required>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 biaya-layanan-subtotal">
                                                    Rp 25.000
                                                </td>
                                            </tr>
                                            
                                            <!-- Total -->
                                            <tr class="bg-gray-50">
                                                <td colspan="4" class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900 text-right">
                                                    Total
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900 total-biaya">
                                                    Rp {{ number_format($totalObat + 75000, 0, ',', '.') }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                                <input type="hidden" name="total_biaya" id="total_biaya" value="{{ $totalObat + 75000 }}" data-obat-total="{{ $totalObat }}">
                                
                                <div class="mt-6 flex justify-end">
                                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded font-medium">
                                        Buat Invoice
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        // Toggle sidebar
        document.addEventListener('DOMContentLoaded', function() {
            const navbarToggle = document.getElementById('navbar-toggle');
            const navbar = document.getElementById('navbar');
            
            if (navbarToggle && navbar) {
                navbarToggle.addEventListener('click', function() {
                    navbar.classList.toggle('-translate-x-full');
                });
            }
            
            // Invoice calculation logic
            const biayaDokterInput = document.getElementById('biaya_dokter');
            const biayaLayananInput = document.getElementById('biaya_layanan');
            const totalBiayaInput = document.getElementById('total_biaya');
            const biayaDokterSubtotal = document.querySelector('.biaya-dokter-subtotal');
            const biayaLayananSubtotal = document.querySelector('.biaya-layanan-subtotal');
            const totalBiayaDisplay = document.querySelector('.total-biaya');
            
            // Total obat from PHP - using a data attribute instead of direct embedding
            const totalObat = parseInt(document.getElementById('total_biaya').getAttribute('data-obat-total'));
            
            function updateTotals() {
                const biayaDokter = parseInt(biayaDokterInput.value) || 0;
                const biayaLayanan = parseInt(biayaLayananInput.value) || 0;
                const total = totalObat + biayaDokter + biayaLayanan;
                
                biayaDokterSubtotal.textContent = 'Rp ' + biayaDokter.toLocaleString('id-ID');
                biayaLayananSubtotal.textContent = 'Rp ' + biayaLayanan.toLocaleString('id-ID');
                totalBiayaDisplay.textContent = 'Rp ' + total.toLocaleString('id-ID');
                totalBiayaInput.value = total;
            }
            
            biayaDokterInput.addEventListener('input', updateTotals);
            biayaLayananInput.addEventListener('input', updateTotals);
        });
    </script>
</body>
</html>
