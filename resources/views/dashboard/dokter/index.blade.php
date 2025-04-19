<!DOCTYPE html>
<html>
<head>
    <title>Dokter Dashboard</title>
</head>
<body>
    <h1>Dokter Dashboard</h1>
    <p>Welcome, {{ auth()->user()->nama_lengkap }}</p>

    @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <h2>Daftar Antrian Hari Ini</h2>
    <table border="1">
        <thead>
            <tr>
                <th>No Antrian</th>
                <th>Nama Pasien</th>
                <th>Keluhan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($antrians as $antrian)
                <tr>
                    <td>{{ $antrian->kode_antrian }}</td>
                    <td>{{ $antrian->pendaftaran->pasien->user->nama_lengkap }}</td>
                    <td>{{ $antrian->pendaftaran->keluhan }}</td>
                    <td>{{ ucfirst($antrian->status) }}</td>
                    <td>
                        @if($antrian->status === 'menunggu')
                            <form action="{{ route('dokter.next', $antrian) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit">Selesai</button>
                            </form>
                            <form action="{{ route('dokter.skip', $antrian) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit">Lewati</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
