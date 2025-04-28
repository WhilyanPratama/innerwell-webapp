<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokter Dashboard - InnerWell Klinic</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }
        ::placeholder {
            color: #9ca3af;
            opacity: 1;
        }
        :-ms-input-placeholder { color: #9ca3af; }
        ::-ms-input-placeholder { color: #9ca3af; }

        #navbar {
            transition: transform 0.3s ease-in-out;
        }
        #main-content, #header {
            transition: margin-left 0.3s ease-in-out;
        }
        .sidebar-open #main-content, .sidebar-open #header {
            margin-left: 16rem;
        }
        #header > div {
             max-width: 100%;
        }
        .selected-date {
            background-color: #16a34a;
            color: white;
            font-weight: 600;
            border-color: #16a34a; 
        }
        .table-container {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            border-radius: 0 0 0.5rem 0.5rem; 
        }
        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 900px;
        }
        th, td {
            padding: 1rem 1.25rem; 
            text-align: left;
            vertical-align: middle; 
            border-bottom: 1px solid #e5e7eb; 
        }
        th {
            background-color: #f9fafb;
            font-weight: 600; 
            color: #374151;
            font-size: 0.75rem;
            text-transform: uppercase; 
            letter-spacing: 0.05em; 
            white-space: nowrap;
        }
        tbody tr:nth-child(even) {
            background-color: #f9fafb; 
        }
        tbody tr:hover {
            background-color: #f0fdf4; 
        }
        tbody td {
             color: #374151;
             font-size: 0.875rem; 
        }
        .status-badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 500;
            white-space: nowrap;
            line-height: 1.25;
        }
        .status-menunggu {
            background-color: #fef3c7;
            color: #92400e;
        }
        .status-dilewati {
            background-color: #fee2e2; 
            color: #991b1b; 
        }
        .status-selesai {
            background-color: #e5e7eb; 
            color: #374151; 
        }
        .action-form textarea {
            width: 100%;
            padding: 0.5rem 0.75rem;
            font-size: 0.875rem;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }
         .action-form textarea:focus {
            outline: none;
            border-color: #10b981; 
            box-shadow: 0 0 0 1px #10b981; 
        }
        .action-form button {
            padding: 0.375rem 0.75rem; 
            font-size: 0.75rem; 
            font-weight: 500; 
            border-radius: 0.375rem; 
            transition: background-color 0.2s ease, box-shadow 0.2s ease;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            color: white;
        }
        .button-selesai { background-color: #16a34a; } 
        .button-selesai:hover { background-color: #16a34a; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1); }
        .button-lewati { background-color: #dc2626; } 
        .button-lewati:hover { background-color: #dc2626; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1); } 
        .button-proses { background-color: #16a34a; } 
        .button-proses:hover { background-color: #16a34a; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1); } 

    </style>

</head>
<body class="bg-gray-100" id="body-container">

    <div class="min-h-screen flex">
        <nav id="navbar" class="fixed top-0 left-0 h-full w-64 bg-green-600 to-green-700 text-white shadow-lg z-30 rounded-r-lg transform -translate-x-full flex flex-col">
            <div class="p-5 flex items-center justify-between">
                <div class="flex items-center space-x-2 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-white-600 group-hover:animate-pulse">
                        <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/>
                        <path d="M3.22 12H9.5l.7-1.44 2.1 4.24 1.4-2.82h4.78"/>
                    </svg>
                    <span class="text-xl font-semibold">InnerWell</span>
                </div>
                <button id="navbar-close" class="text-white md:hidden">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            <div class="flex-grow p-4">
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('dokter.dashboard') }}" class="flex items-center space-x-3 px-4 py-2 rounded-md bg-white bg-opacity-20 text-white font-medium hover:bg-opacity-30 transition duration-150">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                            <span>Dashboard Utama</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="p-4 border-t border-green-400 border-opacity-50">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center space-x-3 px-4 py-2 rounded-md text-white hover:bg-white hover:bg-opacity-10 transition duration-150 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-50 group">
                        <svg class="h-5 w-5 text-white-200 group-hover:text-white transition-colors duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </nav>

        <div class="flex-1 flex flex-col">
            <header id="header" class="bg-white shadow-sm p-4 fixed top-0 left-0 right-0 z-20">
                 <div class="flex justify-between items-center w-full">
                    <div class="flex items-center space-x-4">
                        <button id="navbar-toggle" class="text-gray-600 hover:text-green-600 focus:outline-none">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                            </svg>
                        </button>
                        <div class="flex items-center justify-center space-x-2 text-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-green-600 group-hover:animate-pulse">
                                <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/>
                                <path d="M3.22 12H9.5l.7-1.44 2.1 4.24 1.4-2.82h4.78"/>
                            </svg>
                             <span class="text-xl font-semibold hidden sm:inline">InnerWell Klinic - Dokter</span>
                         </div>
                    </div>

                    <div class="text-sm text-gray-600">
                        Selamat datang, <span class="font-medium">{{ auth()->user()->nama_lengkap ?? 'Dokter' }}</span>
                    </div>
                </div>
            </header>

            <main id="main-content" class="flex-1 pt-20 pb-8">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                    @if(session('success'))
                        <div class="mb-4 p-4 bg-green-100 border border-green-300 text-green-800 rounded-md text-sm">
                            {{ session('success') }}
                        </div>
                    @endif
                     @if(session('error'))
                        <div class="mb-4 p-4 bg-red-100 border border-red-300 text-red-700 rounded-md text-sm">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="bg-white p-4 md:p-6 rounded-lg shadow-md mb-8">
                        <h3 class="text-lg font-semibold text-gray-700 mb-3">Pilih Tanggal Pemeriksaan:</h3>
                        <div class="flex flex-wrap gap-2 mb-3">
                            @isset($weekDates)
                                @foreach($weekDates as $date)
                                    <a href="{{ route('dokter.dashboard', ['date' => $date['date']]) }}"
                                       class="px-3 py-1.5 rounded-md text-sm border transition duration-150 ease-in-out
                                             {{ optional($selectedDate)->format('Y-m-d') == $date['date']
                                                ? 'selected-date'
                                                : 'bg-white text-gray-600 border-gray-300 hover:bg-gray-50 hover:border-gray-400' }}">
                                        <span class="font-medium">{{ $date['day'] }}</span>
                                        <span class="text-xs">({{ $date['formatted'] }})</span>
                                    </a>
                                @endforeach
                            @else
                                <p class="text-sm text-gray-500">Data tanggal tidak tersedia.</p>
                            @endisset
                        </div>
                        <p class="text-sm text-gray-600">Tanggal yang dipilih: <span class="font-semibold">{{ optional($selectedDate)->isoFormat('dddd, D MMMM YYYY') ?? 'Belum dipilih' }}</span></p>
                    </div>

                    <div class="bg-white rounded-lg shadow-md mb-8 overflow-hidden">
                        <h2 class="text-lg font-semibold text-gray-700 px-6 py-4 border-b border-gray-200">Daftar Antrian Menunggu</h2>
                        <div class="table-container">
                            <table>
                                <thead>
                                    <tr>
                                        <th>No Antrian</th>
                                        <th>Nama Pasien</th>
                                        <th>Keluhan</th>
                                        <th>Poli</th>
                                        <th>Status</th>
                                        <th class="min-w-[300px]">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($menungguAntrians as $antrian)
                                        <tr>
                                            <td class="font-medium text-gray-900">{{ $antrian->kode_antrian }}</td>
                                            <td>
                                                {{ $antrian->pendaftaran->pasien->user->nama_lengkap ?? 'N/A' }}
                                                <a href="{{ route('dokter.medical-record', $antrian->pendaftaran->pasien_id) }}" class="ml-1 text-xs text-blue-600 hover:underline">(Rekam Medis)</a>
                                            </td>
                                            <td class="text-gray-600 max-w-[250px] whitespace-normal break-words">{{ $antrian->pendaftaran->keluhan ?? 'N/A' }}</td>
                                            <td>{{ $antrian->pendaftaran->poli->nama_poli ?? 'N/A' }}</td>
                                            <td>
                                                <span class="status-badge status-menunggu">
                                                    {{ ucfirst($antrian->status) }}
                                                </span>
                                            </td>
                                            <td class="action-form">
                                                <form action="{{ route('dokter.next', $antrian->id) }}" method="POST" class="space-y-2">
                                                    @csrf
                                                    <div>
                                                        <label for="diagnosa_{{ $antrian->id }}" class="sr-only">Diagnosa</label>
                                                        <textarea id="diagnosa_{{ $antrian->id }}" name="diagnosa" rows="2" required placeholder="Diagnosa...">{{ old('diagnosa') }}</textarea>
                                                        @error('diagnosa') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                                    </div>
                                                    <div>
                                                        <label for="obat_{{ $antrian->id }}" class="sr-only">Obat</label>
                                                        <textarea id="obat_{{ $antrian->id }}" name="obat" rows="2" required placeholder="Obat/Resep...">{{ old('obat') }}</textarea>
                                                        @error('obat') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                                    </div>
                                                    <div class="flex items-center space-x-2">
                                                        <button type="submit" class="button-selesai">
                                                            Selesai
                                                        </button>
                                                    </div>
                                                </form>
                                                <form action="{{ route('dokter.skip', $antrian->id) }}" method="POST" class="inline mt-2">
                                                    @csrf
                                                    <button type="submit" class="button-lewati">
                                                        Lewati
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-gray-500 py-6">Tidak ada pasien yang menunggu pada tanggal ini.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-md mb-8 overflow-hidden">
                         <h2 class="text-lg font-semibold text-gray-700 px-6 py-4 border-b border-gray-200">Daftar Pasien yang Dilewati</h2>
                         <div class="table-container">
                            <table>
                                <thead>
                                    <tr>
                                        <th>No Antrian</th>
                                        <th>Nama Pasien</th>
                                        <th>Keluhan</th>
                                        <th>Poli</th>
                                        <th>Status</th>
                                        <th class="min-w-[300px]">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($lewatiAntrians as $antrian)
                                        <tr>
                                            <td class="font-medium text-gray-900">{{ $antrian->kode_antrian }}</td>
                                            <td>
                                                {{ $antrian->pendaftaran->pasien->user->nama_lengkap ?? 'N/A' }}
                                                <a href="{{ route('dokter.medical-record', $antrian->pendaftaran->pasien_id) }}" class="ml-1 text-xs text-blue-600 hover:underline">(Rekam Medis)</a>
                                            </td>
                                            <td class="text-gray-600 max-w-[250px] whitespace-normal break-words">{{ $antrian->pendaftaran->keluhan ?? 'N/A' }}</td>
                                            <td>{{ $antrian->pendaftaran->poli->nama_poli ?? 'N/A' }}</td>
                                            <td>
                                                <span class="status-badge status-dilewati">
                                                    {{ ucfirst($antrian->status) }}
                                                </span>
                                            </td>
                                            <td class="action-form">
                                                <form action="{{ route('dokter.process-skipped', $antrian->id) }}" method="POST" class="space-y-2">
                                                     @csrf
                                                    <div>
                                                        <label for="diagnosa_skip_{{ $antrian->id }}" class="sr-only">Diagnosa</label>
                                                        <textarea id="diagnosa_skip_{{ $antrian->id }}" name="diagnosa" rows="2" required placeholder="Diagnosa...">{{ old('diagnosa') }}</textarea>
                                                        @error('diagnosa') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                                    </div>
                                                    <div>
                                                         <label for="obat_skip_{{ $antrian->id }}" class="sr-only">Obat</label>
                                                        <textarea id="obat_skip_{{ $antrian->id }}" name="obat" rows="2" required placeholder="Obat/Resep...">{{ old('obat') }}</textarea>
                                                         @error('obat') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                                    </div>
                                                    <button type="submit" class="button-proses">
                                                        Proses & Selesaikan
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-gray-500 py-6">Tidak ada pasien yang dilewati pada tanggal ini.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <h2 class="text-lg font-semibold text-gray-700 px-6 py-4 border-b border-gray-200">Daftar Pasien Selesai Diperiksa</h2>
                        <div class="table-container">
                            <table>
                                <thead>
                                    <tr>
                                        <th>No Antrian</th>
                                        <th>Nama Pasien</th>
                                        <th>Keluhan</th>
                                        <th>Poli</th>
                                        <th>Status</th>
                                        <th>Rekam Medis</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($selesaiAntrians as $antrian)
                                        <tr>
                                            <td class="font-medium text-gray-900">{{ $antrian->kode_antrian }}</td>
                                            <td>{{ $antrian->pendaftaran->pasien->user->nama_lengkap ?? 'N/A' }}</td>
                                            <td class="text-gray-600 max-w-[250px] whitespace-normal break-words">{{ $antrian->pendaftaran->keluhan ?? 'N/A' }}</td>
                                            <td>{{ $antrian->pendaftaran->poli->nama_poli ?? 'N/A' }}</td>
                                            <td>
                                                 <span class="status-badge status-selesai">
                                                    {{ ucfirst($antrian->status) }}
                                                 </span>
                                            </td>
                                            <td>
                                                <a href="{{ route('dokter.medical-record', $antrian->pendaftaran->pasien_id) }}" class="text-sm font-medium text-green-600 hover:underline hover:text-green-800">
                                                    Lihat Detail
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-gray-500 py-6">Belum ada pasien yang selesai diperiksa pada tanggal ini.</td>
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
        const navbarToggle = document.getElementById('navbar-toggle');
        const navbarClose = document.getElementById('navbar-close');
        const navbar = document.getElementById('navbar');
        const bodyContainer = document.getElementById('body-container');

        function toggleSidebar() {
            navbar.classList.toggle('-translate-x-full');
            navbar.classList.toggle('translate-x-0');
            bodyContainer.classList.toggle('sidebar-open');
        }

        if (navbarToggle && navbar && bodyContainer) {
            navbarToggle.addEventListener('click', (e) => {
                e.stopPropagation();
                toggleSidebar();
            });
        }

        if (navbarClose && navbar && bodyContainer) {
             navbarClose.addEventListener('click', (e) => {
                e.stopPropagation();
                toggleSidebar();
            });
        }

        document.addEventListener('click', (e) => {
            if (window.innerWidth < 768) {
                 if (bodyContainer.classList.contains('sidebar-open') && !navbar.contains(e.target) && e.target !== navbarToggle) {
                    toggleSidebar();
                }
            }
        });

    </script>

</body>
</html>