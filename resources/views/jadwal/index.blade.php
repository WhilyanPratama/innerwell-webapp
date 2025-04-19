<!DOCTYPE html>
<html>
<head>
    <title>Manajemen Jadwal Dokter</title>
</head>
<body>
    <h1>Manajemen Jadwal Dokter</h1>

    @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('jadwal.create') }}">Tambah Jadwal Baru</a>

    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Dokter</th>
                <th>Poli</th>
                <th>Hari</th>
                <th>Sesi</th>
                <th>Jam</th>
                <th>Kuota</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jadwalDokter as $index => $jadwal)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $jadwal->dokter->user->nama_lengkap }}</td>
                    <td>{{ $jadwal->poli->nama_poli }}</td>
                    <td>{{ ucfirst($jadwal->hari) }}</td>
                    <td>{{ ucfirst($jadwal->sesi) }}</td>
                    <td>{{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}</td>
                    <td>{{ $jadwal->kuota }}</td>
                    <td>
                        <a href="{{ route('jadwal.edit', $jadwal) }}">Edit</a>
                        <form action="{{ route('jadwal.destroy', $jadwal) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin hapus jadwal ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
