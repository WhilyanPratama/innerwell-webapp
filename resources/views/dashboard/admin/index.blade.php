<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InnerWell Klinik - Admin Dashboard</title>
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
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 px-4 py-2 rounded-md bg-white bg-opacity-20 text-white font-medium hover:bg-opacity-30 transition duration-150">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 px-4 py-2 rounded-md text-white font-medium hover:bg-white hover:bg-opacity-10 transition duration-150">
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
                            <span class="text-xl font-semibold hidden sm:inline">InnerWell Klinic - Admin</span>
                        </div>
                    </div>
                    <div class="text-sm text-gray-600">
                        Selamat datang, <span class="font-medium">{{ Auth::user()->nama_lengkap ?? 'Admin' }}</span>
                    </div>
                </div>
            </header>

            <main class="flex-1 pt-20 p-6 bg-gray-50">
                <div class="max-w-7xl mx-auto">
                    <div class="mb-6">
                        <h1 class="text-2xl font-bold text-gray-900">Manajemen Pembayaran</h1>
                        <p class="text-gray-600">Kelola pembayaran pasien yang telah selesai berobat</p>
                    </div>

                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Tabel 1: Pasien yang belum dibuat invoice -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h2 class="text-lg font-semibold text-gray-800">Daftar Pasien Belum Dibuatkan Invoice</h2>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No Rekam Medis</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Pasien</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Poli</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dokter</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse($belumBayar as $index => $detail)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ $index + 1 }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $detail->rekamMedis->nomor_rekam_medis }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $detail->rekamMedis->pasien->user->nama_lengkap }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $detail->poli->nama_poli }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $detail->dokter->user->nama_lengkap }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <a href="{{ route('pembayaran.create', $detail->id) }}" 
                                                class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded text-sm">
                                                    Buat Invoice
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                                Tidak ada pasien yang perlu dibuatkan invoice
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Tabel 2: Pasien yang sudah dibuat invoice -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h2 class="text-lg font-semibold text-gray-800">Daftar Invoice</h2>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Pasien</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Poli</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dokter</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse($sudahBayar as $index => $pembayaran)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ $index + 1 }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $pembayaran->nama_pasien }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $pembayaran->rekamMedisDetail->poli->nama_poli }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $pembayaran->rekamMedisDetail->dokter->user->nama_lengkap }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                Rp {{ number_format($pembayaran->total_biaya, 0, ',', '.') }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                    @if($pembayaran->status_pembayaran === 'lunas') bg-green-100 text-green-800
                                                    @else bg-yellow-100 text-yellow-800 @endif">
                                                    {{ ucfirst($pembayaran->status_pembayaran) }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <a href="{{ route('pembayaran.show', $pembayaran->id) }}" 
                                                   class="text-blue-600 hover:text-blue-900">Lihat Invoice</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                                                Belum ada invoice yang dibuat
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
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
        });
    </script>
</body>
</html>
