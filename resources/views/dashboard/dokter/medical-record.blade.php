<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekam Medis Pasien | InnerWell Klinic</title>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        inter: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 font-inter">

    <div class="min-h-screen flex flex-col">
        <header class="bg-white shadow-sm p-4 w-full z-20">
            <div class="max-w-6xl mx-auto flex justify-between items-center">
                <div class="flex items-center space-x-2 text-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-7 w-7 text-green-600">
                        <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/>
                        <path d="M3.22 12H9.5l.7-1.44 2.1 4.24 1.4-2.82h4.78"/>
                    </svg>
                    <span class="text-xl font-semibold">InnerWell Klinic | Rekam Medis</span>
                </div>
                <div class="text-sm text-gray-600">
                    Selamat datang, <span class="font-medium">{{ Auth::user()->nama_lengkap ?? 'Pengguna' }}</span>
                </div>
            </div>
        </header>

        <main class="flex-1 py-8">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

                <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">Rekam Medis Pasien</h1>

                <div class="bg-white p-6 md:p-8 rounded-xl shadow-lg mb-8 border border-gray-200">
                    <h2 class="text-2xl font-semibold text-gray-700 mb-6 pb-3 border-b border-gray-200">Data Pasien</h2>
                    <div class="space-y-3 text-sm">
                        @php
                            $namaLengkap = $pasien->user->nama_lengkap ?? 'N/A';
                            $nik = $pasien->user->nik ?? 'N/A';
                            // Corrected date format from finalListY to Y
                            $tanggalLahir = isset($pasien->tanggal_lahir) ? (\Carbon\Carbon::parse($pasien->tanggal_lahir)->isoFormat('D MMMM Y')) : 'N/A';
                            $jenisKelamin = $pasien->jenis_kelamin ?? 'N/A';
                            $golonganDarah = $pasien->golongan_darah ?? 'N/A';
                            $alergi = $pasien->alergi ?: 'Tidak ada';
                            $nomorRekamMedis = $rekamMedis->nomor_rekam_medis ?? 'N/A';
                        @endphp
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-4">
                            <div class="flex">
                                <span class="font-medium text-gray-600 w-32 sm:w-40 shrink-0">Nama</span>
                                <span class="text-gray-500 mr-2 shrink-0">:</span>
                                <span class="text-gray-800 flex-1 break-words">{{ $namaLengkap }}</span>
                            </div>
                            <div class="flex">
                                <span class="font-medium text-gray-600 w-32 sm:w-40 shrink-0">NIK</span>
                                <span class="text-gray-500 mr-2 shrink-0">:</span>
                                <span class="text-gray-800 flex-1 break-words">{{ $nik }}</span>
                            </div>
                            <div class="flex">
                                <span class="font-medium text-gray-600 w-32 sm:w-40 shrink-0">Tanggal Lahir</span>
                                <span class="text-gray-500 mr-2 shrink-0">:</span>
                                <span class="text-gray-800 flex-1 break-words">{{ $tanggalLahir }}</span>
                            </div>
                            <div class="flex">
                                <span class="font-medium text-gray-600 w-32 sm:w-40 shrink-0">Jenis Kelamin</span>
                                <span class="text-gray-500 mr-2 shrink-0">:</span>
                                <span class="text-gray-800 flex-1 break-words">{{ $jenisKelamin }}</span>
                            </div>
                            <div class="flex">
                                <span class="font-medium text-gray-600 w-32 sm:w-40 shrink-0">Golongan Darah</span>
                                <span class="text-gray-500 mr-2 shrink-0">:</span>
                                <span class="text-gray-800 flex-1 break-words">{{ $golonganDarah }}</span>
                            </div>
                            <div class="flex">
                                <span class="font-medium text-gray-600 w-32 sm:w-40 shrink-0">Alergi</span>
                                <span class="text-gray-500 mr-2 shrink-0">:</span>
                                <span class="text-gray-800 flex-1 break-words">{{ $alergi }}</span>
                            </div>
                            <div class="flex sm:col-span-2">
                                <span class="font-medium text-gray-600 w-32 sm:w-40 shrink-0">No. Rekam Medis</span>
                                <span class="text-gray-500 mr-2 shrink-0">:</span>
                                <span class="text-gray-800 flex-1 font-semibold break-words">{{ $nomorRekamMedis }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 md:p-8 rounded-xl shadow-lg mb-8 border border-gray-200">
                    <h2 class="text-2xl font-semibold text-gray-700 mb-6 pb-3 border-b border-gray-200">Riwayat Pemeriksaan</h2>
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-600">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 rounded-t-lg">
                                <tr>
                                    <th scope="col" class="px-6 py-3 min-w-[100px]">Tanggal</th>
                                    <th scope="col" class="px-6 py-3 min-w-[100px]">Poli</th>
                                    <th scope="col" class="px-6 py-3 min-w-[150px]">Dokter</th>
                                    <th scope="col" class="px-6 py-3 min-w-[200px]">Keluhan</th>
                                    <th scope="col" class="px-6 py-3 min-w-[250px]">Diagnosa</th>
                                    <th scope="col" class="px-6 py-3 min-w-[200px]">Obat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($details as $detail)
                                <tr class="bg-white border-b hover:bg-gray-50 transition-colors duration-150">
                                    <td class="px-6 py-4 whitespace-nowrap align-top">{{ $detail->tanggal_periksa ? (\Carbon\Carbon::parse($detail->tanggal_periksa)->isoFormat('D MMM Y')) : 'N/A' }}</td>
                                    <td class="px-6 py-4 break-words whitespace-pre-line align-top">{{ $detail->poli->nama_poli ?? 'N/A' }}</td>
                                    <td class="px-6 py-4 break-words whitespace-pre-line align-top">{{ $detail->dokter->user->nama_lengkap ?? 'N/A' }}</td>
                                    <td class="px-6 py-4 break-words whitespace-pre-line align-top">{{ $detail->keluhan ?? 'N/A' }}</td>
                                    <td class="px-6 py-4 break-words whitespace-pre-line align-top">{{ $detail->diagnosa ?? 'N/A' }}</td>
                                    <td class="px-6 py-4 break-words whitespace-pre-line align-top">{{ $detail->obat ?? 'N/A' }}</td>
                                </tr>
                                @empty
                                <tr class="bg-white border-b">
                                    <td colspan="6" class="px-6 py-4 text-center text-gray-500 italic">
                                        Belum ada riwayat pemeriksaan.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="mt-10 text-center">
                    <a href="{{ route('dokter.dashboard') }}" class="inline-block px-8 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all duration-200 ease-in-out transform hover:scale-105">
                        Kembali ke Dashboard
                    </a>
                </div>

            </div>
        </main>
    </div>
</body>
</html>
