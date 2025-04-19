<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Berobat</title>
</head>
<body>
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
</body>
</html>
