<!DOCTYPE html>
<html>
<head>
    <title>Edit Jadwal Dokter</title>
</head>
<body>
    <h1>Edit Jadwal Dokter</h1>

    <form method="POST" action="{{ route('jadwal.update', $jadwal) }}">
        @csrf
        @method('PUT')
        
        <div>
            <label>Dokter</label>
            <select name="dokter_id" required>
                @foreach($dokters as $dokter)
                    <option value="{{ $dokter->id }}" {{ $jadwal->dokter_id == $dokter->id ? 'selected' : '' }}>
                        {{ $dokter->user->nama_lengkap }} - {{ $dokter->spesialisasi }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Poli</label>
            <select name="poli_id" required>
                @foreach($polis as $poli)
                    <option value="{{ $poli->id }}" {{ $jadwal->poli_id == $poli->id ? 'selected' : '' }}>
                        {{ $poli->nama_poli }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Hari</label>
            <select name="hari" required>
                @foreach($haris as $hari)
                    <option value="{{ $hari }}" {{ $jadwal->hari == $hari ? 'selected' : '' }}>
                        {{ ucfirst($hari) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Sesi</label>
            <select name="sesi" required>
                @foreach($sesis as $sesi)
                    <option value="{{ $sesi }}" {{ $jadwal->sesi == $sesi ? 'selected' : '' }}>
                        {{ ucfirst($sesi) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Jam Mulai</label>
            <input type="time" name="jam_mulai" value="{{ $jadwal->jam_mulai }}" required>
        </div>

        <div>
            <label>Jam Selesai</label>
            <input type="time" name="jam_selesai" value="{{ $jadwal->jam_selesai }}" required>
        </div>

        <div>
            <label>Kuota</label>
            <input type="number" name="kuota" min="1" value="{{ $jadwal->kuota }}" required>
        </div>

        <button type="submit">Simpan</button>
        <a href="{{ route('jadwal.index') }}">Batal</a>
    </form>
</body>
</html>
