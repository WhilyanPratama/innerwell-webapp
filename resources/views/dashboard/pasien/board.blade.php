<!DOCTYPE html>
<html>
<head>
    <title>Status Antrian</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    <div class="container">
        <h1>Status Antrian Poli {{ $poli->nama_poli }}</h1>
        <div class="current-status">
            <h2>Antrian Saat Ini</h2>
            <div id="current-antrian" class="antrian-number">{{ $currentAntrian ?? '-' }}</div>
        </div>
        
        <div class="next-status">
            <h2>Antrian Berikutnya</h2>
            <div id="next-antrian" class="antrian-number">{{ $nextAntrian ?? '-' }}</div>
        </div>
        
        <div class="your-status">
            <h2>Antrian Anda</h2>
            <div id="your-antrian" class="antrian-number">{{ $yourAntrian ?? '-' }}</div>
            <div id="estimated-time">
                Estimasi waktu tunggu: <span id="wait-time">{{ $estimatedWait ?? '-' }}</span> menit
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const poliId = '{{ $poli->id }}';
            const yourAntrian = '{{ $yourAntrian }}';
            
            window.Echo.channel(`antrian-poli-${poliId}`)
                .listen('AntrianUpdated', (e) => {
                    document.getElementById('current-antrian').textContent = e.currentAntrian || '-';
                    document.getElementById('next-antrian').textContent = e.nextAntrian || '-';
                    
                    // Calculate estimated wait time
                    if (yourAntrian && e.nextAntrian) {
                        const yourNum = parseInt(yourAntrian.replace(/\D/g, ''));
                        const nextNum = parseInt(e.nextAntrian.replace(/\D/g, ''));
                        
                        if (yourNum > nextNum) {
                            const waitingCount = yourNum - nextNum;
                            const estimatedWait = waitingCount * 10; 
                            document.getElementById('wait-time').textContent = estimatedWait;
                        } else if (yourNum === nextNum) {
                            document.getElementById('wait-time').textContent = 'Anda Sekarang!';
                        }
                    }
                });
        });
    </script>
</body>
</html>
