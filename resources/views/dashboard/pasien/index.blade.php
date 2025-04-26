{{-- resources/views/pasien/dashboard.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasien Dashboard</title>
    {{-- Pastikan Anda sudah setup Tailwind CSS di proyek Laravel Anda --}}
    {{-- Jika belum, Anda bisa menggunakan CDN untuk testing --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Anda bisa menambahkan custom CSS di sini jika perlu */
        /* Style untuk menyembunyikan panah default di input date */
        input[type="date"]::-webkit-calendar-picker-indicator {
            /* Anda bisa styling atau menyembunyikannya */
            /* opacity: 0; */
        }
        /* Style dasar untuk navbar toggle (contoh sederhana) */
        .navbar { transition: transform 0.3s ease-in-out; }
        .navbar-hidden { transform: translateX(-100%); }
        main { transition: margin-left 0.3s ease-in-out; }
    </style>
</head>
<body class="bg-gray-100">

    <div class="min-h-screen flex">
        {{-- Placeholder untuk Navbar --}}
        {{-- Anda bisa include partial view navbar Anda di sini --}}
        {{-- Contoh: @include('partials.pasien_navbar') --}}
        <nav id="navbar" class="fixed top-0 left-0 h-full w-60 bg-white shadow-md z-20 navbar -translate-x-full md:translate-x-0">
             {{-- Isi Navbar Anda di sini --}}
             <div class="p-4">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Menu</h2>
                <ul>
                    <li class="mb-2"><a href="#" class="text-gray-700 hover:text-green-600">Dashboard</a></li>
                    <li class="mb-2"><a href="#" class="text-gray-700 hover:text-green-600">Riwayat</a></li>
                    {{-- Tambahkan item menu lain --}}
                </ul>

                 {{-- Tombol Logout di Navbar (jika diinginkan) --}}
                <form action="{{ route('logout') }}" method="POST" class="mt-10">
                    @csrf
                    <button type="submit" class="w-full px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Logout</button>
                </form>
             </div>
        </nav>

        {{-- Konten Utama --}}
        <div class="flex-1 flex flex-col">
            {{-- Placeholder untuk Header --}}
            {{-- Anda bisa include partial view header Anda di sini --}}
            {{-- Contoh: @include('partials.pasien_header') --}}
            <header class="bg-white shadow-sm p-4 flex justify-between items-center fixed top-0 left-0 right-0 z-10 md:ml-60" id="header">
                {{-- Tombol Toggle Navbar untuk Mobile --}}
                <button id="navbar-toggle" class="text-gray-700 focus:outline-none md:hidden">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
                <div class="text-lg font-semibold text-gray-800">Klinik Sehat</div>
                 {{-- Info User atau Tombol Lain di Header --}}
                 <div>
                    <span class="text-gray-600">Welcome, {{ Auth::user()->nama_lengkap }}</span>
                 </div>
            </header>

            {{-- Main Content Area --}}
            <main class="flex-1 pt-16 md:ml-60 transition-all duration-300" id="main-content">
                <div class="max-w-6xl mx-auto p-6 md:p-8">
                    <div class="w-full text-left mb-8">
                        <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4">
                            Dashboard Pasien
                        </h1>
                        {{-- Pesan selamat datang sudah ada di header --}}
                    </div>

                    {{-- Form Pendaftaran --}}
                    <div class="bg-white p-6 md:p-8 rounded-lg shadow-md mb-12">
                        <h2 class="text-xl md:text-2xl font-semibold text-gray-800 mb-6">
                            Pendaftaran Periksa
                        </h2>

                        <form method="POST" action="{{ route('pendaftaran.store') }}" class="space-y-5">
                            @csrf

                            {{-- Display user data (jika masih relevan di form) --}}
                            <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-md text-sm text-green-800">
                                <p><span class="font-medium">Nama:</span> {{ Auth::user()->nama_lengkap }}</p>
                                <p><span class="font-medium">NIK:</span> {{ Auth::user()->nik }}</p>
                                {{-- Pastikan $pasien dikirim dari controller --}}
                                @isset($pasien)
                                <p><span class="font-medium">Tanggal Lahir:</span> {{ \Carbon\Carbon::parse($pasien->tanggal_lahir)->isoFormat('D MMMM YYYY') }}</p>
                                @endisset
                            </div>

                            {{-- Pesan Error Validasi --}}
                            @if ($errors->any())
                                <div class="mb-4 p-4 bg-red-100 border border-red-300 text-red-700 rounded">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            {{-- Form fields --}}
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                @php
                                    $inputClass = "w-full p-3 bg-white text-gray-800 rounded-md border border-gray-300 focus:outline-none focus:ring-1 focus:ring-green-500 focus:border-green-500 transition duration-150 ease-in-out";
                                    $labelClass = "block text-sm font-medium text-gray-700 mb-1";
                                @endphp

                                <div>
                                    <label for="poli_id" class="{{ $labelClass }}">Poli</label>
                                    {{-- Pastikan $polis dikirim dari controller --}}
                                    <select name="poli_id" id="poli_id" class="{{ $inputClass }}" required>
                                        <option value="">Pilih Poli</option>
                                        @isset($polis)
                                            @foreach($polis as $poli)
                                                <option value="{{ $poli->id }}" {{ old('poli_id') == $poli->id ? 'selected' : '' }}>
                                                    {{ $poli->nama_poli }}
                                                </option>
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>

                                <div>
                                    <label for="tanggal_berobat" class="{{ $labelClass }}">Tanggal Berobat</label>
                                    <input type="date" name="tanggal_berobat" id="tanggal_berobat" value="{{ old('tanggal_berobat') }}" class="{{ $inputClass }}" required>
                                </div>

                                <div>
                                    <label for="jadwal_dokter_id" class="{{ $labelClass }}">Jadwal Dokter</label>
                                    <select name="jadwal_dokter_id" id="jadwal_dokter_id" class="{{ $inputClass }}" required disabled>
                                        <option value="">Pilih Tanggal & Poli dahulu</option>
                                        {{-- Opsi akan diisi oleh JavaScript --}}
                                    </select>
                                    <div id="jadwal-loading" class="text-sm text-gray-500 mt-1" style="display: none;">Memuat jadwal...</div>
                                </div>

                                <div class="md:col-span-2">
                                    <label for="keluhan" class="{{ $labelClass }}">Keluhan</label>
                                    <textarea id="keluhan" name="keluhan" class="{{ $inputClass }}" rows="4" required>{{ old('keluhan') }}</textarea>
                                </div>
                            </div>

                            <div class="flex justify-center pt-4">
                                <button type="submit" class="px-10 py-3 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-semibold rounded-md transition-all duration-200 shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                    Daftar
                                </button>
                            </div>
                        </form>
                    </div>

                    {{-- Status Pendaftaran --}}
                    <div class="bg-white p-6 md:p-8 rounded-lg shadow-md">
                        <h2 class="text-xl md:text-2xl font-semibold text-gray-800 mb-6">Status Pendaftaran Terakhir</h2>

                        {{-- Pastikan $pendaftaran dan $waitingPosition (jika perlu) dikirim dari controller --}}
                        @isset($pendaftaran)
                            <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                                    {{-- Status Validasi --}}
                                    <div class="space-y-1">
                                        <p class="text-sm text-gray-500">Status Validasi</p>
                                        @php
                                            $statusText = '';
                                            $statusColor = '';
                                            switch ($pendaftaran->status_validasi) {
                                                case 'menunggu':
                                                    $statusText = 'Menunggu Validasi';
                                                    $statusColor = 'text-yellow-600';
                                                    break;
                                                case 'disetujui':
                                                    $statusText = 'Disetujui';
                                                    $statusColor = 'text-green-600';
                                                    break;
                                                case 'ditolak':
                                                    $statusText = 'Ditolak';
                                                    $statusColor = 'text-red-600';
                                                    break;
                                                default:
                                                    $statusText = ucfirst($pendaftaran->status_validasi);
                                                    $statusColor = 'text-gray-800';
                                            }
                                        @endphp
                                        <p class="text-lg font-medium {{ $statusColor }}">{{ $statusText }}</p>
                                    </div>

                                    {{-- Posisi Antrian Validasi (jika menunggu) --}}
                                    @if($pendaftaran->status_validasi === 'menunggu')
                                        <div class="space-y-1">
                                            <p class="text-sm text-gray-500">Posisi Antrian Validasi</p>
                                            <p class="text-lg font-medium text-gray-800">{{ $waitingPosition ?? 'N/A' }}</p> {{-- Pastikan $waitingPosition ada --}}
                                        </div>
                                    @endif

                                    {{-- Nomor dan Status Antrian (jika disetujui & ada antrian) --}}
                                    @if($pendaftaran->status_validasi === 'disetujui' && isset($pendaftaran->antrian))
                                        <div class="space-y-1">
                                            <p class="text-sm text-gray-500">Nomor Antrian</p>
                                            <p class="text-lg font-medium text-gray-800">{{ $pendaftaran->antrian->kode_antrian }}</p>
                                        </div>
                                        <div class="space-y-1">
                                            <p class="text-sm text-gray-500">Status Antrian</p>
                                            <p class="text-lg font-medium text-gray-800">{{ ucfirst($pendaftaran->antrian->status) }}</p>
                                        </div>
                                    @endif

                                    {{-- Detail Pendaftaran Lainnya --}}
                                    <div class="space-y-1">
                                        <p class="text-sm text-gray-500">Poli</p>
                                        <p class="text-lg font-medium text-gray-800">{{ $pendaftaran->poli->nama_poli }}</p>
                                    </div>

                                    <div class="space-y-1">
                                        <p class="text-sm text-gray-500">Tanggal Berobat</p>
                                        <p class="text-lg font-medium text-gray-800">{{ \Carbon\Carbon::parse($pendaftaran->tanggal_berobat)->isoFormat('dddd, D MMMM YYYY') }}</p>
                                    </div>

                                    <div class="space-y-1">
                                        <p class="text-sm text-gray-500">Dokter</p>
                                        {{-- Sesuaikan dengan struktur relasi Anda, contoh: --}}
                                        <p class="text-lg font-medium text-gray-800">{{ $pendaftaran->jadwalDokter->dokter->user->nama_lengkap ?? 'Dokter tidak ditemukan' }}</p>
                                    </div>

                                    @if($pendaftaran->status_validasi === 'ditolak' && $pendaftaran->catatan_validasi)
                                     <div class="sm:col-span-2 lg:col-span-3 space-y-1">
                                         <p class="text-sm text-gray-500">Catatan</p>
                                         <p class="text-base text-red-700">{{ $pendaftaran->catatan_validasi }}</p>
                                     </div>
                                    @endif

                                </div>

                                {{-- Informasi Tambahan jika disetujui --}}
                                @if($pendaftaran->status_validasi === 'disetujui')
                                <div class="mt-6 p-4 bg-blue-50 rounded-lg border border-blue-200">
                                    <div class="flex items-start">
                                        <svg class="h-5 w-5 text-blue-500 mt-0.5 mr-3 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                        </svg>
                                        <div>
                                            <p class="text-sm text-blue-800">
                                                Silakan datang ke klinik 15 menit sebelum waktu pemeriksaan Anda. Jika nomor antrian Anda terlewat, harap segera menghubungi petugas di lokasi.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @endif

                            </div>
                        @else
                            <div class="text-center text-gray-500 py-6">
                                <p>Tidak ada data pendaftaran terakhir yang ditampilkan.</p>
                            </div>
                        @endisset
                    </div>

                </div>
            </main>
        </div>
    </div>

    <script>
        // --- Navbar Toggle Script ---
        const navbarToggle = document.getElementById('navbar-toggle');
        const navbar = document.getElementById('navbar');
        const mainContent = document.getElementById('main-content'); // Target main content
        const header = document.getElementById('header'); // Target header

        if (navbarToggle && navbar && mainContent && header) {
            navbarToggle.addEventListener('click', () => {
                navbar.classList.toggle('translate-x-0');
                navbar.classList.toggle('-translate-x-full');
                // Optional: Add margin shift to content when navbar is open on mobile
                // This part might need adjustment based on your exact layout needs
                // if (navbar.classList.contains('translate-x-0')) {
                //     // Currently not shifting main content on mobile toggle in this example
                // } else {
                //     // Reset margin if needed
                // }
            });
        }

        // --- Dynamic Doctor Schedule Script ---
        const poliSelect = document.getElementById('poli_id');
        const tanggalInput = document.getElementById('tanggal_berobat');
        const jadwalSelect = document.getElementById('jadwal_dokter_id');
        const jadwalLoading = document.getElementById('jadwal-loading');

        // --- URL Endpoint ---
        // !!! PENTING: Ganti URL ini sesuai dengan route API Laravel Anda untuk mengambil jadwal dokter !!!
        const JADWAL_DOKTER_URL = '/pendaftaran/jadwal-dokter'; // Sesuaikan jika perlu

        function updateJadwalDokter() {
            const poliId = poliSelect.value;
            const tanggal = tanggalInput.value;

            // Kosongkan dan disable jadwal select jika poli atau tanggal belum dipilih
            jadwalSelect.innerHTML = '<option value="">Pilih Tanggal & Poli dahulu</option>';
            jadwalSelect.disabled = true;
            jadwalLoading.style.display = 'none';


            if (poliId && tanggal) {
                jadwalSelect.disabled = true; // Disable saat loading
                jadwalLoading.style.display = 'block'; // Tampilkan loading
                jadwalSelect.innerHTML = '<option value="">Memuat...</option>'; // Teks loading

                // Bangun URL dengan query parameters
                const url = `${JADWAL_DOKTER_URL}?poli_id=${poliId}&tanggal=${tanggal}`;

                fetch(url)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(data => {
                        jadwalSelect.innerHTML = '<option value="">Pilih Jadwal Dokter</option>'; // Reset opsi default
                        if (data && data.length > 0) {
                            data.forEach(jadwal => {
                                // Pastikan struktur data 'jadwal' sesuai dengan respons API Anda
                                // Contoh: jadwal.dokter.user.nama_lengkap, jadwal.sesi, jadwal.jam_mulai, jadwal.jam_selesai
                                const dokterNama = jadwal.dokter?.user?.nama_lengkap ?? 'Nama Dokter Tidak Tersedia';
                                const sesi = jadwal.sesi ?? '';
                                const jamMulai = jadwal.jam_mulai ? jadwal.jam_mulai.substring(0, 5) : '--:--'; // Format HH:MM
                                const jamSelesai = jadwal.jam_selesai ? jadwal.jam_selesai.substring(0, 5) : '--:--'; // Format HH:MM

                                jadwalSelect.innerHTML += `
                                    <option value="${jadwal.id}">
                                        ${dokterNama} - ${sesi} (${jamMulai} - ${jamSelesai})
                                    </option>
                                `;
                            });
                            jadwalSelect.disabled = false; // Enable jika ada data
                        } else {
                             jadwalSelect.innerHTML = '<option value="">Tidak ada jadwal tersedia</option>';
                             jadwalSelect.disabled = true; // Tetap disable jika tidak ada jadwal
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching jadwal dokter:', error);
                        jadwalSelect.innerHTML = '<option value="">Gagal memuat jadwal</option>';
                         jadwalSelect.disabled = true; // Tetap disable jika error
                    })
                    .finally(() => {
                        jadwalLoading.style.display = 'none'; // Sembunyikan loading
                         // Re-enable select only if it wasn't explicitly disabled due to no data/error
                        if (jadwalSelect.options.length > 1 && jadwalSelect.options[0].value === "") {
                           // Check if the first option is the placeholder and there are other options
                            if (jadwalSelect.options[0].text !== "Tidak ada jadwal tersedia" && jadwalSelect.options[0].text !== "Gagal memuat jadwal") {
                                jadwalSelect.disabled = false;
                            }
                        } else if(jadwalSelect.options.length === 1 && (jadwalSelect.options[0].text === "Tidak ada jadwal tersedia" || jadwalSelect.options[0].text === "Gagal memuat jadwal")){
                            jadwalSelect.disabled = true;
                        }
                    });
            }
        }

        // Tambahkan event listener
        if (poliSelect && tanggalInput && jadwalSelect) {
            poliSelect.addEventListener('change', updateJadwalDokter);
            tanggalInput.addEventListener('change', updateJadwalDokter);

             // Panggil sekali saat halaman dimuat jika ada nilai lama (misalnya setelah error validasi)
             if (poliSelect.value && tanggalInput.value) {
                updateJadwalDokter();
                // Anda mungkin perlu menambahkan sedikit delay atau logic tambahan
                // untuk memilih kembali old('jadwal_dokter_id') setelah opsi dimuat
                const oldJadwalId = "{{ old('jadwal_dokter_id') }}";
                if (oldJadwalId) {
                    // Beri waktu sedikit agar fetch selesai sebelum set value
                    setTimeout(() => {
                         if (document.querySelector(`#jadwal_dokter_id option[value='${oldJadwalId}']`)) {
                             jadwalSelect.value = oldJadwalId;
                         }
                    }, 500); // Adjust delay if needed
                }
             }
        }

    </script>

</body>
</html>