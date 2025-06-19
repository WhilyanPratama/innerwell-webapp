<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InnerWell Klinik - Dashboard Manajemen</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
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
                        <a href="{{ route('manajemen.dashboard') }}" class="flex items-center space-x-3 px-4 py-2 rounded-md bg-white bg-opacity-20 text-white font-medium hover:bg-opacity-30 transition duration-150">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                            <span>Dashboard Manajemen</span>
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
                                <path d="M3.22 12H9.5l .7-1.44 2.1 4.24 1.4-2.82h4.78"/>
                            </svg>
                            <span class="text-xl font-semibold hidden sm:inline">InnerWell Klinik - Manajemen</span>
                        </div>
                    </div>
                    <div class="text-sm text-gray-600">
                        Selamat datang, <span class="font-medium">{{ Auth::user()->nama_lengkap ?? 'Manajemen' }}</span>
                    </div>
                </div>
            </header>

  <main class="flex-1 pt-20 p-6 bg-gray-50">
                <div class="max-w-7xl mx-auto">
                    <div class="mb-6">
                        <h1 class="text-2xl font-bold text-gray-900">Dashboard Manajemen</h1>
                        <p class="text-gray-600">Overview keuangan dan operasional klinik</p>
                    </div>

                    <!-- Top Row - 3 Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <!-- Laporan Keuangan -->
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Income Overview</h3>
                            <div class="mb-4">
                                <p class="text-2xl font-bold text-green-600">
                                    Rp {{ number_format($incomeThisMonth ?? 0, 0, ',', '.') }}
                                </p>
                                <p class="text-sm text-gray-500">Total bulan ini</p>
                            </div>
                            <div id="incomeChart" class="h-32"></div>
                        </div>

                        <!-- Laporan Operasional A - Profit & Loss -->
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Profit & Loss Overview</h3>
                            <div class="space-y-2 text-sm">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Total Income:</span>
                                    <span class="font-medium">Rp {{ number_format($totalIncome ?? 0, 0, ',', '.') }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Total Cost:</span>
                                    <span class="font-medium text-red-600">Rp {{ number_format($totalCost ?? 0, 0, ',', '.') }}</span>
                                </div>
                                <hr class="my-2">
                                <div class="flex justify-between font-bold">
                                    <span>Total Earning:</span>
                                    <span class="text-green-600">Rp {{ number_format($totalEarning ?? 0, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Laporan Operasional B - Data Pasien -->
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Data Pasien</h3>
                            <div class="space-y-3">
                                <div class="text-center">
                                    <p class="text-2xl font-bold text-blue-600">{{ $pasienTerdaftar ?? 0 }}</p>
                                    <p class="text-sm text-gray-500">Pasien Terdaftar Bulan Ini</p>
                                </div>
                                <div class="text-center">
                                    <p class="text-2xl font-bold text-green-600">{{ $pasienBerobat ?? 0 }}</p>
                                    <p class="text-sm text-gray-500">Pasien Berobat Bulan Ini</p>
                                </div>
                            </div>
                        </div>
                    </div>

                                        <!-- Obat Terjual Table -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8">
                        <div class="p-6 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-800">Obat Terjual Bulan Ini</h3>
                        </div>
                        
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Obat</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Katagori</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah Terjual</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga Satuan</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse($obatTerjual ?? [] as $obat)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $obat['nama'] ?? '-' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $obat['katagori'] ?? '-' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $obat['qty'] ?? 0 }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rp {{ number_format($obat['harga'] ?? 0, 0, ',', '.') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rp {{ number_format($obat['total'] ?? 0, 0, ',', '.') }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">Belum ada data penjualan obat</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Invoice Table -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8">
                        <div class="p-6 border-b border-gray-200">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-semibold text-gray-800">Daftar Invoice</h3>
                                <div class="flex space-x-2">
                                    <select id="filterPeriod" class="border rounded px-3 py-2 text-sm">
                                        <option value="today">Hari Ini</option>
                                        <option value="week">1 Minggu</option>
                                        <option value="month" selected>1 Bulan</option>
                                        <option value="year">1 Tahun</option>
                                        <option value="custom">Custom</option>
                                    </select>
                                    <input type="date" id="customDate" class="border rounded px-3 py-2 text-sm hidden">
                                </div>
                            </div>
                        </div>
                        
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Pasien</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Poli</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dokter</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200" id="invoiceTableBody">
                                    @forelse($invoices ?? [] as $invoice)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ substr($invoice->id ?? '', 0, 8) }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $invoice->rekamMedisDetail->rekamMedis->pasien->user->nama_lengkap ?? 'N/A' }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $invoice->rekamMedisDetail->poli->nama_poli ?? 'N/A' }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $invoice->rekamMedisDetail->dokter->user->nama_lengkap ?? 'N/A' }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ \Carbon\Carbon::parse($invoice->rekamMedisDetail->tanggal_periksa ?? now())->format('d M Y') }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                Rp {{ number_format($invoice->total_biaya ?? 0, 0, ',', '.') }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                    {{ ($invoice->status_pembayaran ?? '') === 'lunas' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                                    {{ ucfirst($invoice->status_pembayaran ?? 'pending') }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <a href="{{ route('manajemen.invoice.show', $invoice ?? 0) }}" 
                                                   class="text-blue-600 hover:text-blue-900">Lihat Invoice</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="px-6 py-4 text-center text-gray-500">
                                                Tidak ada data invoice tersedia
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="px-6 py-3 bg-gray-50">
                            @isset($invoices)
                                @if($invoices instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                    {{ $invoices->links() }}
                                @endif
                            @endisset
                        </div>
                    </div>

                </div>
            </main>
        </div>
    </div>

    <!-- Sebelum closing </body> tag -->
    <script>
        // Define data variables first
        window.chartData = {
            labels: {!! json_encode($chartData['chartLabels'] ?? ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun']) !!},
            values: {!! json_encode($chartData['chartData'] ?? [100000, 150000, 120000, 180000, 200000, 250000]) !!}
        };
    </script>

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

            // Income Chart with ApexCharts
            var options = {
                series: [{
                    name: 'Income',
                    data: window.chartData.values
                }],
                chart: {
                    height: 128,
                    type: 'line',
                    toolbar: {
                        show: false
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth',
                    colors: ['#22c55e']
                },
                xaxis: {
                    categories: window.chartData.labels,
                    labels: {
                        show: false
                    },
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    }
                },
                yaxis: {
                    labels: {
                        show: false
                    }
                },
                grid: {
                    show: false
                },
                colors: ['#22c55e'],
                fill: {
                    type: 'gradient',
                    gradient: {
                        shadeIntensity: 1,
                        opacityFrom: 0.7,
                        opacityTo: 0.3,
                        stops: [0, 90, 100]
                    }
                }
            };

            var chart = new ApexCharts(document.querySelector("#incomeChart"), options);
            chart.render();

            // Filter functionality
            const filterPeriod = document.getElementById('filterPeriod');
            const customDate = document.getElementById('customDate');
            
            if (filterPeriod) {
                filterPeriod.addEventListener('change', function() {
                    if (this.value === 'custom') {
                        if (customDate) customDate.classList.remove('hidden');
                    } else {
                        if (customDate) customDate.classList.add('hidden');
                        // Reload page with filter
                        window.location.href = window.location.pathname + '?period=' + this.value;
                    }
                });
            }

            if (customDate) {
                customDate.addEventListener('change', function() {
                    if (this.value) {
                        window.location.href = window.location.pathname + '?period=custom&date=' + this.value;
                    }
                });
            }
        });
    </script>

</body>
</html>
