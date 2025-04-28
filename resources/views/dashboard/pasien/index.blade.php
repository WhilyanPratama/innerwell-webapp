<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasien Dashboard - InnerWell Klinic</title>
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

        select {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 0.5rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            padding-right: 2.5rem;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }
        input[type="date"] {
            position: relative;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='%236b7280'%3e%3cpath stroke-linecap='round' stroke-linejoin='round' d='M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z' /%3e%3c/svg%3e");
            background-position: right 0.5rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            padding-right: 2.5rem;
        }
        input[type="date"]::-webkit-calendar-picker-indicator {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            padding: 0;
            margin: 0;
            opacity: 0;
            cursor: pointer;
        }
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

    </style>
</head>
<body class="bg-gray-100" id="body-container">

    <div class="min-h-screen flex">
        <nav id="navbar" class="fixed top-0 left-0 h-full w-64 bg-green-600 hover:bg-green-700 text-white shadow-lg z-30 rounded-r-lg transform -translate-x-full flex flex-col">
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
                        <a href="#" class="flex items-center space-x-3 px-4 py-2 rounded-md bg-white bg-opacity-20 text-white font-medium hover:bg-opacity-30 transition duration-150">
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
                         <div class="flex items-center space-x-2 text-gray-800">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-green-600 group-hover:animate-pulse">
                                  <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/>
                                  <path d="M3.22 12H9.5l.7-1.44 2.1 4.24 1.4-2.82h4.78"/>
                              </svg>
                             <span class="text-xl font-semibold hidden sm:inline">InnerWell Klinic - Pasien</span>
                         </div>
                     </div>

                     <div class="text-sm text-gray-600">
                         Selamat datang, <span class="font-medium">{{ Auth::user()->nama_lengkap ?? 'Pengguna' }}</span>
                     </div>
                 </div>
            </header>

            <main id="main-content" class="flex-1 pt-20 pb-8">
                <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

                    <div class="bg-white p-6 md:p-8 rounded-lg shadow-md mb-8">
                        <h2 class="text-xl md:text-2xl font-semibold text-gray-800 mb-6">
                            Pendaftaran Berobat
                        </h2>

                        <div class="mb-6 p-4 bg-white-100 border border-gray-200 rounded-md text-sm text-gray-700 space-y-3 w-full md:col-span-2">
                            <div class="grid grid-cols-1 gap-2">
                                <p class="flex justify-between">
                                    <span class="font-medium text-green-600 w-32">Nama</span>
                                    <span class="flex-grow">: {{ Auth::user()->nama_lengkap ?? 'N/A' }}</span>
                                </p>
                                <p class="flex justify-between">
                                    <span class="font-medium text-green-600 w-32">NIK</span>
                                    <span class="flex-grow">: {{ Auth::user()->nik ?? 'N/A' }}</span>
                                </p>
                                @isset($pasien)
                                    <p class="flex justify-between">
                                        <span class="font-medium text-green-600 w-32">Tanggal Lahir</span>
                                        <span class="flex-grow">: {{ $pasien->tanggal_lahir ? \Carbon\Carbon::parse($pasien->tanggal_lahir)->isoFormat('D MMMM YYYY') : 'N/A' }}</span>
                                    </p>
                                @else
                                    <p class="flex justify-between">
                                        <span class="font-medium text-green-600 w-32">Tanggal Lahir</span>
                                        <span class="flex-grow">: (Data tidak tersedia)</span>
                                    </p>
                                @endisset
                            </div>
                        </div>

                        <form method="POST" action="{{ route('pendaftaran.store') }}">
                            @csrf

                            @if ($errors->any())
                                <div class="mb-4 p-4 bg-red-100 border border-red-300 text-red-700 rounded-md text-sm">
                                    <p class="font-medium mb-1">Harap perbaiki error berikut:</p>
                                    <ul class="list-disc list-inside">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @php
                                $inputClass = "w-full px-4 py-3 bg-white text-gray-800 rounded-lg border border-gray-300 focus:outline-none focus:ring-1 focus:ring-green-500 focus:border-green-500 transition duration-150 ease-in-out placeholder-gray-400";
                                $selectClass = $inputClass . " appearance-none";
                            @endphp

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-5 mb-6">
                                <div>
                                    <select name="poli_id" id="poli_id" class="{{ $selectClass }}" required>
                                        <option value="" disabled {{ old('poli_id') ? '' : 'selected' }}>Pilih Poli</option>
                                        @isset($polis)
                                            @foreach($polis as $poli)
                                                <option value="{{ $poli->id }}" {{ old('poli_id') == $poli->id ? 'selected' : '' }}>
                                                    {{ $poli->nama_poli }}
                                                </option>
                                            @endforeach
                                        @else
                                             <option value="" disabled>Data poli tidak tersedia</option>
                                        @endisset
                                    </select>
                                    @error('poli_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <input type="date" name="tanggal_berobat" id="tanggal_berobat" value="{{ old('tanggal_berobat') }}" class="{{ $inputClass }} text-gray-700" min="{{ date('Y-m-d') }}" max="{{ date('Y-m-d', strtotime('+14 days')) }}" required placeholder="Tanggal Berobat">
                                    @error('tanggal_berobat') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                </div>


                                <div class="md:col-span-2">
                                    <select name="jadwal_dokter_id" id="jadwal_dokter_id" class="{{ $selectClass }}" required disabled>
                                        <option value="" selected>Pilih Tanggal Dan Poli</option>
                                    </select>
                                    <div id="jadwal-loading" class="text-sm text-gray-500 mt-1" style="display: none;">Memuat jadwal...</div>
                                    @error('jadwal_dokter_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                </div>

                                <div class="md:col-span-2">
                                    <textarea id="keluhan" name="keluhan" class="{{ $inputClass }}" rows="4" required placeholder="Keluhan Anda">{{ old('keluhan') }}</textarea>
                                    @error('keluhan') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <div class="flex justify-center pt-2">
                                <button type="submit" class="px-10 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg transition-all duration-200 shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                    Daftar
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="bg-white p-6 md:p-8 rounded-lg shadow-md">
                        <h2 class="text-xl md:text-2xl font-semibold text-gray-800 mb-6">Status Pendaftaran Terakhir</h2>

                        @isset($pendaftaran)
                            <div class="bg-gray-50 border border-gray-200 rounded-lg p-6">
                                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-x-6 gap-y-4 text-sm">
                                    <div>
                                        <p class="text-gray-500 mb-1">Status Pendaftaran</p>
                                         @php
                                             $statusText = match ($pendaftaran->status_validasi) {
                                                 'menunggu' => 'Menunggu Validasi',
                                                 'disetujui' => 'Disetujui',
                                                 'ditolak' => 'Ditolak',
                                                 default => ucfirst($pendaftaran->status_validasi),
                                             };
                                             $statusColor = match ($pendaftaran->status_validasi) {
                                                 'menunggu' => 'text-yellow-600',
                                                 'disetujui' => 'text-green-600',
                                                 'ditolak' => 'text-red-600',
                                                 default => 'text-gray-800',
                                             };
                                         @endphp
                                        <p class="font-medium {{ $statusColor }}">{{ $statusText }}</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-500 mb-1">Posisi Antrian</p>
                                        <p class="font-medium text-gray-800">
                                            @if($pendaftaran->status_validasi === 'disetujui' && isset($pendaftaran->antrian))
                                                {{ $pendaftaran->antrian->kode_antrian ?? 'N/A' }} ({{ ucfirst($pendaftaran->antrian->status ?? 'N/A') }})
                                            @elseif($pendaftaran->status_validasi === 'menunggu')
                                                {{ $waitingPosition ?? 'Menunggu Validasi' }}
                                            @else
                                                -
                                            @endif
                                        </p>
                                    </div>
                                    <div>
                                        <p class="text-gray-500 mb-1">Poli</p>
                                        <p class="font-medium text-gray-800">{{ $pendaftaran->poli->nama_poli ?? 'N/A' }}</p>
                                    </div>

                                    <div>
                                        <p class="text-gray-500 mb-1">Tanggal Berobat</p>
                                        <p class="font-medium text-gray-800">{{ $pendaftaran->tanggal_berobat ? \Carbon\Carbon::parse($pendaftaran->tanggal_berobat)->isoFormat('dddd, D MMM YYYY') : 'N/A' }}</p>
                                    </div>
                                    <div class="md:col-span-2">
                                        <p class="text-gray-500 mb-1">Dokter</p>
                                        <p class="font-medium text-gray-800">{{ $pendaftaran->jadwalDokter->dokter->user->nama_lengkap ?? 'N/A' }}</p>
                                    </div>

                                     @if($pendaftaran->status_validasi === 'ditolak' && $pendaftaran->catatan_validasi)
                                        <div class="sm:col-span-2 md:col-span-3 mt-2">
                                            <p class="text-gray-500 mb-1">Catatan Penolakan</p>
                                            <p class="text-sm text-red-700">{{ $pendaftaran->catatan_validasi }}</p>
                                        </div>
                                     @endif

                                     @if($pendaftaran->status_validasi === 'disetujui')
                                        <div class="sm:col-span-2 md:col-span-3 mt-4 p-3 bg-blue-50 rounded-lg border border-blue-200">
                                            <div class="flex items-start">
                                                <svg class="h-5 w-5 text-blue-500 mt-0.5 mr-2 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                                                     <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                                </svg>
                                                <p class="text-xs text-blue-800">
                                                    Silakan datang ke klinik 15 menit sebelum waktu pemeriksaan Anda. Jika nomor antrian Anda terlewat, harap segera menghubungi petugas di lokasi.
                                                </p>
                                            </div>
                                        </div>
                                     @endif
                                </div>
                            </div>
                        @else
                            <div class="text-center text-gray-500 py-6 border border-dashed rounded-lg">
                                <p>Tidak ada data pendaftaran terakhir.</p>
                            </div>
                        @endisset
                    </div>
                    @if(isset($antrianData))
                        <div class="bg-white p-6 rounded-lg shadow-md mt-12 mb-8">
                            <div class="border-b border-gray-200 pb-4 mb-6">
                                <h2 class="text-xl font-semibold text-gray-800">Status Antrian {{ $antrianData['poli']->nama_poli }}</h2>
                            </div>
                            
                            <table class="w-full border-collapse border border-gray-300">
                                <tr class="bg-gray-100">
                                    <th class="border border-gray-300 p-3 text-gray-700">Antrian Saat Ini</th>
                                    <th class="border border-gray-300 p-3 text-gray-700">Antrian Berikutnya</th>
                                    <th class="border border-gray-300 p-3 text-gray-700">Antrian Anda</th>
                                    <th class="border border-gray-300 p-3 text-gray-700">Estimasi Waktu</th>
                                </tr>
                                <tr class="text-center">
                                    <td class="border border-gray-300 p-4 text-lg font-medium" id="current-antrian">{{ $antrianData['currentAntrian'] }}</td>
                                    <td class="border border-gray-300 p-4 text-lg font-medium" id="next-antrian">{{ $antrianData['nextAntrian'] }}</td>
                                    <td class="border border-gray-300 p-4 text-lg font-medium" id="your-antrian">{{ $antrianData['yourAntrian'] }}</td>
                                    <td class="border border-gray-300 p-4 text-lg font-medium" id="wait-time">
                                        @if(is_numeric($antrianData['estimatedWait']))
                                            {{ $antrianData['estimatedWait'] }} menit
                                        @else
                                            {{ $antrianData['estimatedWait'] }}
                                        @endif
                                    </td>
                                </tr>
                            </table>
                            
                            <div class="mt-6 text-sm text-gray-600 bg-blue-50 p-4 rounded-md">
                                <p>Status antrian diperbarui secara otomatis. Harap tetap memperhatikan nomor antrian Anda.</p>
                            </div>
                        </div>
                    @endif

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


        const poliSelect = document.getElementById('poli_id');
        const tanggalInput = document.getElementById('tanggal_berobat');
        const jadwalSelect = document.getElementById('jadwal_dokter_id');
        const jadwalLoading = document.getElementById('jadwal-loading');

        const JADWAL_DOKTER_URL = '{{ route("pendaftaran.jadwal-dokter") }}';

        function updateJadwalDokter() {
            const poliId = poliSelect.value;
            const tanggal = tanggalInput.value;

            jadwalSelect.innerHTML = '<option value="" selected>Pilih Tanggal Dan Poli</option>';
            jadwalSelect.disabled = true;
            jadwalLoading.style.display = 'none';

            if (poliId && tanggal) {
                jadwalSelect.disabled = true;
                jadwalLoading.style.display = 'block';
                jadwalSelect.innerHTML = '<option value="">Memuat...</option>';

                const url = `${JADWAL_DOKTER_URL}?poli_id=${poliId}&tanggal=${tanggal}`;

                fetch(url, {
                    method: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        console.error(`HTTP error! status: ${response.status}`, response);
                        return response.json().then(err => { throw err; }).catch(() => { throw new Error(`HTTP error ${response.status}`); });
                    }
                    return response.json();
                })
                .then(data => {
                    jadwalSelect.innerHTML = '<option value="" disabled selected>Pilih Jadwal Dokter</option>';
                    if (data && data.length > 0) {
                        data.forEach(jadwal => {
                            const dokterNama = jadwal.dokter?.user?.nama_lengkap ?? 'N/A';
                            const sesi = jadwal.sesi ?? '';
                            const jamMulai = jadwal.jam_mulai ? jadwal.jam_mulai.substring(0, 5) : '--:--';
                            const jamSelesai = jadwal.jam_selesai ? jadwal.jam_selesai.substring(0, 5) : '--:--';
                            const optionText = `${dokterNama} - ${sesi} (${jamMulai} - ${jamSelesai})`;

                            jadwalSelect.innerHTML += `<option value="${jadwal.id}">${optionText}</option>`;
                        });
                        jadwalSelect.disabled = false;
                    } else {
                        jadwalSelect.innerHTML = '<option value="">Tidak ada jadwal tersedia</option>';
                        jadwalSelect.disabled = true;
                    }
                })
                .catch(error => {
                    console.error('Error fetching jadwal dokter:', error);
                    jadwalSelect.innerHTML = '<option value="">Gagal memuat jadwal</option>';
                    jadwalSelect.disabled = true;
                })
                .finally(() => {
                    jadwalLoading.style.display = 'none';
                    const oldJadwalId = "{{ old('jadwal_dokter_id') }}";
                     if (oldJadwalId && !jadwalSelect.disabled) {
                         if (jadwalSelect.querySelector(`option[value='${oldJadwalId}']`)) {
                             jadwalSelect.value = oldJadwalId;
                         }
                     }
                });
            } else {
                jadwalSelect.innerHTML = '<option value="" selected>Pilih Tanggal Dan Poli</option>';
                jadwalSelect.disabled = true;
            }
        }

        if (poliSelect && tanggalInput && jadwalSelect) {
            poliSelect.addEventListener('change', updateJadwalDokter);
            tanggalInput.addEventListener('change', updateJadwalDokter);

            if (poliSelect.value && tanggalInput.value) {
                updateJadwalDokter();
            }
        }

    </script>
</body>

</html>
