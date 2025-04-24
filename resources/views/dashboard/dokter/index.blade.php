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

    @if(session('error'))
        <div style="color: red;">
            {{ session('error') }}
        </div>
    @endif

    <!-- Date Navigation -->
    <div>
        <h3>Pilih Tanggal:</h3>
        <div>
            @foreach($weekDates as $date)
                <a href="{{ route('dokter.dashboard', ['date' => $date['date']]) }}" 
                   class="{{ $selectedDate->format('Y-m-d') == $date['date'] ? 'selected-date': '' }}">
                    {{ $date['day'] }} ({{ $date['formatted'] }})
                </a>
                @if(!$loop->last) | @endif
            @endforeach
        </div>
        <p>Tanggal yang dipilih: {{ $selectedDate->format('d F Y') }}</p>
    </div>

    <h2>Daftar Antrian Menunggu</h2>
    <table border="1">
        <thead>
            <tr>
                <th>No Antrian</th>
                <th>Nama Pasien</th>
                <th>Keluhan</th>
                <th>Poli</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($menungguAntrians as $antrian)
                <tr>
                    <td>{{ $antrian->kode_antrian }}</td>
                    <td>
                        {{ $antrian->pendaftaran->pasien->user->nama_lengkap }}
                        <a href="{{ route('dokter.medical-record', $antrian->pendaftaran->pasien) }}">(Lihat Rekam Medis)</a>
                    </td>
                    <td>{{ $antrian->pendaftaran->keluhan }}</td>
                    <td>{{ $antrian->pendaftaran->poli->nama_poli }}</td>
                    <td>{{ ucfirst($antrian->status) }}</td>
                    <td>
                        <form action="{{ route('dokter.next', $antrian) }}" method="POST">
                            @csrf
                            <div>
                                <label for="diagnosa">Diagnosa:</label>
                                <textarea name="diagnosa" required></textarea>
                            </div>
                            <div>
                                <label for="obat">Obat:</label>
                                <textarea name="obat" required></textarea>
                            </div>
                            <button type="submit">Selesai</button>
                        </form>
                        <form action="{{ route('dokter.skip', $antrian) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit">Lewati</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Tidak ada pasien yang menunggu</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <h2>Daftar Pasien yang Dilewati</h2>
    <table border="1">
        <thead>
            <tr>
                <th>No Antrian</th>
                <th>Nama Pasien</th>
                <th>Keluhan</th>
                <th>Poli</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($lewatiAntrians as $antrian)
                <tr>
                    <td>{{ $antrian->kode_antrian }}</td>
                    <td>
                        {{ $antrian->pendaftaran->pasien->user->nama_lengkap }}
                        <a href="{{ route('dokter.medical-record', $antrian->pendaftaran->pasien) }}">(Lihat Rekam Medis)</a>
                    </td>
                    <td>{{ $antrian->pendaftaran->keluhan }}</td>
                    <td>{{ $antrian->pendaftaran->poli->nama_poli }}</td>
                    <td>{{ ucfirst($antrian->status) }}</td>
                    <td>
                        <form action="{{ route('dokter.process-skipped', $antrian) }}" method="POST">
                            @csrf
                            <div>
                                <label for="diagnosa">Diagnosa:</label>
                                <textarea name="diagnosa" required></textarea>
                            </div>
                            <div>
                                <label for="obat">Obat:</label>
                                <textarea name="obat" required></textarea>
                            </div>
                            <button type="submit">Selesai</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Tidak ada pasien yang dilewati</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <h2>Daftar Pasien yang Selesai Diperiksa</h2>
    <table border="1">
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
            @endforelse
        </tbody>
    </table>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>

