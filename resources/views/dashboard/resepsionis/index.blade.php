<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resepsionis Dashboard - InnerWell Klinic</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
  <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            sans: ['Inter', 'sans-serif'],
          }
        }
      }
    }
  </script>

</head>
<body class="font-sans bg-gray-100 overflow-x-hidden" id="body-container">

  <div class="min-h-screen flex">
    <nav id="navbar" class="fixed top-0 left-0 h-full w-64 bg-gradient-to-b from-green-600 to-green-700 text-white shadow-lg z-30 rounded-r-lg transform -translate-x-full transition-transform duration-300 ease-in-out flex flex-col">
      <div class="p-5 flex items-center justify-between">
        <div class="flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-white-600 group-hover:animate-pulse">
                 <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/>
                 <path d="M3.22 12H9.5l.7-1.44 2.1 4.24 1.4-2.82h4.78"/>
            </svg>
          <span class="text-xl font-semibold">InnerWell</span>
        </div>
        <button id="navbar-close" class="md:hidden">
          <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></path></svg>
        </button>
      </div>

      <div class="flex-grow p-4">
        <ul class="space-y-2">
          <li>
            <a href="{{ route('resepsionis.dashboard') }}" class="flex items-center space-x-3 px-4 py-2 rounded-md bg-white bg-opacity-20 hover:bg-opacity-30 transition">
              <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></path></svg>
              <span>Validasi Pendaftaran</span>
            </a>
          </li>
        </ul>
      </div>

      <div class="p-4 border-t border-green-400 border-opacity-50">
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit" class="w-full flex items-center space-x-3 px-4 py-2 rounded-md hover:bg-white hover:bg-opacity-10 transition">
            <svg class="h-5 w-5 text-white-200 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></path></svg>
            <span>Logout</span>
          </button>
        </form>
      </div>
    </nav>

    <div class="flex-1 flex flex-col">
      <header id="header" class="bg-white shadow-sm p-4 fixed top-0 left-0 right-0 z-20 transition-all duration-300 ease-in-out">
        <div class="flex justify-between items-center">
          <div class="flex items-center space-x-4">
            <button id="navbar-toggle" class="text-gray-600 hover:text-green-600">
              <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" /></path></svg>
            </button>
            <div class="flex items-center space-x-2 text-gray-800">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-green-600 group-hover:animate-pulse">
                    <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/>
                    <path d="M3.22 12H9.5l.7-1.44 2.1 4.24 1.4-2.82h4.78"/>
                </svg>
              <span class="text-xl font-semibold hidden sm:inline">InnerWell Klinic - Resepsionis</span>
            </div>
          </div>
          <div class="text-sm text-gray-600">
            Selamat datang, <span class="font-medium">{{ auth()->user()->nama_lengkap ?? 'Resepsionis' }}</span>
          </div>
        </div>
      </header>

      <main id="main-content" class="flex-1 pt-20 pb-8 transition-all duration-300 ease-in-out">
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

          <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <h2 class="text-lg font-semibold text-gray-700 px-6 py-4 border-b border-gray-200">Daftar Validasi Pasien</h2>
            <div class="overflow-x-auto">
              <table class="min-w-[800px] w-full text-sm text-left">
                <thead class="uppercase bg-gray-50 text-gray-700 text-xs">
                  <tr>
                    <th class="p-4">No</th>
                    <th class="p-4">Waktu Daftar</th>
                    <th class="p-4">Nama Pasien</th>
                    <th class="p-4">NIK</th>
                    <th class="p-4">Poli</th>
                    <th class="p-4">Dokter</th>
                    <th class="p-4">Tgl Berobat</th>
                    <th class="p-4">Keluhan</th>
                    <th class="p-4">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($pendaftaranList as $index => $pendaftaran)
                  <tr class="even:bg-gray-50 hover:bg-green-50 transition">
                    <td class="p-4 text-center">{{ $loop->iteration }}</td>
                    <td class="p-4 whitespace-nowrap">{{ optional($pendaftaran->created_at)->isoFormat('D MMM YY, HH:mm') ?? 'N/A' }}</td>
                    <td class="p-4 font-medium text-gray-900">{{ $pendaftaran->pasien->user->nama_lengkap ?? 'N/A' }}</td>
                    <td class="p-4">{{ $pendaftaran->pasien->user->nik ?? 'N/A' }}</td>
                    <td class="p-4">{{ $pendaftaran->poli->nama_poli ?? 'N/A' }}</td>
                    <td class="p-4">{{ $pendaftaran->jadwalDokter->dokter->user->nama_lengkap ?? 'N/A' }}</td>
                    <td class="whitespace-nowrap text-center"> {{ $pendaftaran->created_at ? \Carbon\Carbon::parse($pendaftaran->created_at)->isoFormat('D MMM YY') : 'N/A' }} </td>

                    <td class="p-4 text-gray-600 min-w-[200px] max-w-[300px] whitespace-normal break-words">{{ $pendaftaran->keluhan ?? 'N/A' }}</td>
                    <td class="p-4 whitespace-nowrap">
                      <div class="flex space-x-2">
                        <form action="{{ route('resepsionis.validate', $pendaftaran->id) }}" method="POST">
                          @csrf
                          <input type="hidden" name="status" value="disetujui">
                          <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-3 py-2 rounded-md text-xs font-medium shadow-sm hover:shadow-md transition">Setujui</button>
                        </form>
                        <form action="{{ route('resepsionis.validate', $pendaftaran->id) }}" method="POST">
                          @csrf
                          <input type="hidden" name="status" value="ditolak">
                          <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-md text-xs font-medium shadow-sm hover:shadow-md transition">Tolak</button>
                        </form>
                      </div>
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="9" class="text-center text-gray-500 py-6">Tidak ada pendaftaran yang menunggu validasi.</td>
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

  const header = document.getElementById('header');
  const mainContent = document.getElementById('main-content');

  header.classList.toggle('ml-64');
  mainContent.classList.toggle('ml-64');
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