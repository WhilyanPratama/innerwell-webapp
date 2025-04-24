<!DOCTYPE html>
<html>
<head>
    <title>Rekam Medis Pasien</title>
</head>
<body>
    <h1>Rekam Medis Pasien</h1>
    
    <div>
        <h2>Data Pasien</h2>
        <p><strong>Nama:</strong> {{ $pasien->user->nama_lengkap }}</p>
        <p><strong>NIK:</strong> {{ $pasien->user->nik }}</p>
        <p><strong>Tanggal Lahir:</strong> {{ $pasien->tanggal_lahir }}</p>
        <p><strong>Jenis Kelamin:</strong> {{ $pasien->jenis_kelamin }}</p>
        <p><strong>Golongan Darah:</strong> {{ $pasien->golongan_darah }}</p>
        <p><strong>Alergi:</strong> {{ $pasien->alergi ?: 'Tidak ada' }}</p>
        <p><strong>Nomor Rekam Medis:</strong> {{ $rekamMedis->nomor_rekam_medis }}</p>
    </div>
    
    <div>
        <h2>Riwayat Pemeriksaan</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Poli</th>
                    <th>Dokter</th>
                    <th>Keluhan</th>
                    <th>Diagnosa</th>
                    <th>Obat</th>
                </tr>
            </thead>
            <tbody>
                @forelse($details as $detail)
                    <tr>
                        <td>{{ $detail->tanggal_periksa }}</td>
                        <td>{{ $detail->poli->nama_poli }}</td>
                        <td>{{ $detail->dokter->user->nama_lengkap }}</td>
                        <td>{{ $detail->keluhan }}</td>
                        <td>{{ $detail->diagnosa }}</td>
                        <td>{{ $detail->obat }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Belum ada riwayat pemeriksaan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <a href="{{ route('dokter.dashboard') }}">Kembali ke Dashboard</a>
</body>
</html>
