<!DOCTYPE html>
<html>
<head>
    <title>Tambah Jadwal Dokter</title>
</head>
<body>
    <h1>Tambah Jadwal Dokter</h1>

    <form method="POST" action="{{ route('jadwal.store') }}">
        @csrf
        
        <div>
            <label>Dokter</label>
            <select name="dokter_id" required>
                @foreach($dokters as $dokter)
                    <option value="{{ $dokter->id }}">
                        {{ $dokter->user->nama_lengkap }} - {{ $dokter->spesialisasi }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Poli</label>
            <select name="poli_id" required>
                @foreach($polis as $poli)
                    <option value="{{ $poli->id }}">{{ $poli->nama_poli }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Hari</label>
            <select name="hari" required>
                @foreach($haris as $hari)
                    <option value="{{ $hari }}">{{ ucfirst($hari) }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Sesi</label>
            <select name="sesi" required>
                @foreach($sesis as $sesi)
                    <option value="{{ $sesi }}">{{ ucfirst($sesi) }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Jam Mulai</label>
            <input type="time" name="jam_mulai" required>
        </div>

        <div>
            <label>Jam Selesai</label>
            <input type="time" name="jam_selesai" required>
        </div>

        <div>
            <label>Kuota</label>
            <input type="number" name="kuota" min="1" required>
        </div>

        <button type="submit">Simpan</button>
        <a href="{{ route('jadwal.index') }}">Batal</a>
    </form>
</body>
</html>
