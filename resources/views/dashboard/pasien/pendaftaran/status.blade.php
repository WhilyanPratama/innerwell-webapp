<!DOCTYPE html>
<html>
<head>
    <title>Status Pendaftaran</title>
</head>
<body>
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
</body>
</html>
