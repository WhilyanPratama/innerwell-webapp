<?php

public function run(): void
{
    // Create Poli first
    $poliGigi = Poli::create([
        'nama_poli' => 'Poli Gigi',
        'kode_poli' => 'A',
        'deskripsi' => 'Poli untuk perawatan gigi dan mulut',
    ]);

    $poliAnak = Poli::create([
        'nama_poli' => 'Poli Anak',
        'kode_poli' => 'B',
        'deskripsi' => 'Poli untuk kesehatan anak',
    ]);

    $poliUmum = Poli::create([
        'nama_poli' => 'Poli Umum',
        'kode_poli' => 'C',
        'deskripsi' => 'Poli untuk pemeriksaan kesehatan umum',
    ]);

    $poliTHT = Poli::create([
        'nama_poli' => 'Poli THT',
        'kode_poli' => 'D',
        'deskripsi' => 'Poli untuk Pemeriksaan THT',
    ]);

    // Create all doctor users first
    $dokterUsers = [
        ['username' => 'dr.sarah', 'nama_lengkap' => 'drg. Sarah', 'spesialisasi' => 'Gigi'],
        ['username' => 'dr.arya', 'nama_lengkap' => 'drg. Arya', 'spesialisasi' => 'Gigi'],
        ['username' => 'dr.faradilla', 'nama_lengkap' => 'drg. Faradilla', 'spesialisasi' => 'Gigi'],
        ['username' => 'dr.daffa', 'nama_lengkap' => 'dr. Daffa S.An', 'spesialisasi' => 'Anak'],
        ['username' => 'dr.khalid', 'nama_lengkap' => 'dr. Khalid S.An', 'spesialisasi' => 'Anak'],
        ['username' => 'dr.ahmad', 'nama_lengkap' => 'dr. Ahmad', 'spesialisasi' => 'Umum'],
        ['username' => 'dr.tirta', 'nama_lengkap' => 'dr. Tirta', 'spesialisasi' => 'Umum'],
        ['username' => 'dr.safira', 'nama_lengkap' => 'dr. Safira', 'spesialisasi' => 'Umum'],
        ['username' => 'dr.alfian', 'nama_lengkap' => 'dr. Alfian Firdaus Sp.THT-KL', 'spesialisasi' => 'THT'],
    ];

    foreach ($dokterUsers as $dokterData) {
        $user = User::create([
            'username' => $dokterData['username'],
            'password' => Hash::make('password'),
            'role' => 'dokter',
            'nama_lengkap' => $dokterData['nama_lengkap'],
            'no_telp' => '08123456789',
            'nik' => fake()->unique()->numerify('################'),
            'email' => $dokterData['username'] . '@example.com',
        ]);

        Dokter::create([
            'user_id' => $user->id,
            'spesialisasi' => $dokterData['spesialisasi'],
        ]);
    }

    // Run JadwalDokterSeeder after all doctors are created
    $this->call([
        JadwalDokterSeeder::class,
    ]);

    // Create other users (admin, resepsionis, etc.)
    // ... rest of your seeder code
}
