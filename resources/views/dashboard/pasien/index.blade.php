<!DOCTYPE html>
<html>
<head>
    <title>Pasien Dashboard</title>
</head>
<body>
    <h1>Pasien Dashboard</h1>
    <p>Welcome, {{ auth()->user()->nama_lengkap }}</p>
    <h1>Pendaftaran Berobat</h1>
    
    <form method="POST" action="{{ route('pendaftaran.store') }}">
        @csrf
        
        <!-- Data Pasien yang tidak bisa diubah -->
        <div>
            <p>Nama: {{ auth()->user()->nama_lengkap }}</p>
            <p>NIK: {{ auth()->user()->nik }}</p>
            <p>Tanggal Lahir: {{ $pasien->tanggal_lahir }}</p>
        </div>

        <!-- Form fields -->
        <div>
            <label>Poli</label>
            <select name="poli_id" id="poli_id" required>
                <option value="">Pilih Poli</option>
                @foreach($polis as $poli)
                    <option value="{{ $poli->id }}">{{ $poli->nama_poli }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Tanggal Berobat</label>
            <input type="date" name="tanggal_berobat" id="tanggal_berobat" required>
        </div>

        <div>
            <label>Jadwal Dokter</label>
            <select name="jadwal_dokter_id" id="jadwal_dokter_id" required>
                <option value="">Pilih Tanggal & Poli dahulu</option>
            </select>
        </div>

        <div>
            <label>Keluhan</label>
            <textarea name="keluhan" required></textarea>
        </div>

        <button type="submit">Daftar</button>
    </form>

    <script>
        document.getElementById('poli_id').addEventListener('change', updateJadwalDokter);
        document.getElementById('tanggal_berobat').addEventListener('change', updateJadwalDokter);

        function updateJadwalDokter() {
            const poli_id = document.getElementById('poli_id').value;
            const tanggal = document.getElementById('tanggal_berobat').value;
            
            if (poli_id && tanggal) {
                fetch(`/pendaftaran/jadwal-dokter?poli_id=${poli_id}&tanggal=${tanggal}`)
                    .then(response => response.json())
                    .then(data => {
                        const select = document.getElementById('jadwal_dokter_id');
                        select.innerHTML = '<option value="">Pilih Jadwal Dokter</option>';
                        
                        data.forEach(jadwal => {
                            select.innerHTML += `<option value="${jadwal.id}">
                                ${jadwal.dokter.user.nama_lengkap} - ${jadwal.sesi} 
                                (${jadwal.jam_mulai}-${jadwal.jam_selesai})
                            </option>`;
                        });
                    });
            }
        }
    </script>

    <h1>Status Pendaftaran</h1>
        
        @if($pendaftaran)
            <p>Status: {{ $pendaftaran->status_validasi }}</p>
            @if($pendaftaran->status_validasi === 'menunggu')
                <p>Posisi Antrian Validasi: {{ $waitingPosition }}</p>
            @elseif($pendaftaran->status_validasi === 'disetujui')
                <p>Nomor Antrian: {{ $pendaftaran->antrian->kode_antrian }}</p>
                <p>Status Antrian: {{ $pendaftaran->antrian->status }}</p>
            @else
                <p>Pendaftaran ditolak</p>
            @endif
            <p>Poli: {{ $pendaftaran->poli->nama_poli }}</p>
            <p>Tanggal Berobat: {{ $pendaftaran->tanggal_berobat }}</p>
            <p>Dokter: {{ $pendaftaran->jadwalDokter->dokter->user->nama_lengkap }}</p>
        @else
            <p>Tidak ada pendaftaran yang sedang menunggu validasi</p>
        @endif

    <h2>Riwayat Pemeriksaan</h2>
    <table border="1">
        <tbody>
            <!-- @forelse($selesaiAntrians as $antrian)
                <tr>
                    <td>{{ $antrian->kode_antrian }}</td>
                    <td>{{ $antrian->pendaftaran->pasien->user->nama_lengkap }}</td>
                    <td>{{ $antrian->pendaftaran->keluhan }}</td>
                    <td>{{ $antrian->pendaftaran->poli->nama_poli }}</td>
                    <td>{{ ucfirst($antrian->status) }}</td>
                    <td>
                        <a href="{{ route('dokter.medical-record', $antrian->pendaftaran->pasien) }}">Lihat Rekam Medis</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Tidak ada pasien yang selesai diperiksa</td>
                </tr>
            @endforelse -->
        </tbody>
    </table>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
