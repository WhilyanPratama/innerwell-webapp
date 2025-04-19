<!DOCTYPE html>
<html>
<head>
    <title>Validasi Pendaftaran</title>
</head>
<body>
    <h1>Daftar Pendaftaran Menunggu Validasi</h1>

    @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Waktu Daftar</th>
                <th>Nama Pasien</th>
                <th>NIK</th>
                <th>Poli</th>
                <th>Dokter</th>
                <th>Tanggal Berobat</th>
                <th>Keluhan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pendaftaranList as $index => $pendaftaran)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $pendaftaran->created_at }}</td>
                    <td>{{ $pendaftaran->pasien->user->nama_lengkap }}</td>
                    <td>{{ $pendaftaran->pasien->user->nik }}</td>
                    <td>{{ $pendaftaran->poli->nama_poli }}</td>
                    <td>{{ $pendaftaran->jadwalDokter->dokter->user->nama_lengkap }}</td>
                    <td>{{ $pendaftaran->tanggal_berobat }}</td>
                    <td>{{ $pendaftaran->keluhan }}</td>
                    <td>
                        <form action="{{ route('resepsionis.validate', $pendaftaran) }}" method="POST" style="display:inline;">
                            @csrf
                            <input type="hidden" name="status" value="disetujui">
                            <button type="submit">Setujui</button>
                        </form>
                        <form action="{{ route('resepsionis.validate', $pendaftaran) }}" method="POST" style="display:inline;">
                            @csrf
                            <input type="hidden" name="status" value="ditolak">
                            <button type="submit">Tolak</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
