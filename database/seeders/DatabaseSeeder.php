<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Poli;
use App\Models\Dokter;
use App\Models\Pasien;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            JadwalDokterSeeder::class,
        ]);
        // Create Admin User
        $adminUser = User::create([
            'username' => 'admin',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'nama_lengkap' => 'Administrator',
            'no_telp' => '081234567890',
            'nik' => '1234567890123456',
            'email' => 'admin@example.com',
        ]);

        // Create Resepsionis User
        $resepsionisUser = User::create([
            'username' => 'resepsionis',
            'password' => Hash::make('password'),
            'role' => 'resepsionis',
            'nama_lengkap' => 'Resepsionis RS',
            'no_telp' => '081234567891',
            'nik' => '1234567890123457',
            'email' => 'resepsionis@example.com',
        ]);

        // Create Manajemen User
        $manajemenUser = User::create([
            'username' => 'manajemen',
            'password' => Hash::make('password'),
            'role' => 'manajemen',
            'nama_lengkap' => 'Manajemen RS',
            'no_telp' => '081234567892',
            'nik' => '1234567890123458',
            'email' => 'manajemen@example.com',
        ]);

        // Create Poli
        $poliGigi = Poli::create([
            'nama_poli' => 'Poli Gigi',
            'kode_poli' => 'A',
            'deskripsi' => 'Poli untuk perawatan gigi dan mulut',
        ]);

        $poliUmum = Poli::create([
            'nama_poli' => 'Poli Umum',
            'kode_poli' => 'B',
            'deskripsi' => 'Poli untuk pemeriksaan kesehatan umum',
        ]);

        $poliAnak = Poli::create([
            'nama_poli' => 'Poli Anak',
            'kode_poli' => 'C',
            'deskripsi' => 'Poli untuk kesehatan anak',
        ]);

        // Create Dokter Users
        $dokterGigiUser = User::create([
            'username' => 'dokter_gigi',
            'password' => Hash::make('password'),
            'role' => 'dokter',
            'nama_lengkap' => 'Dr. Gigi Sehat',
            'no_telp' => '081234567893',
            'nik' => '1234567890123459',
            'email' => 'dokter.gigi@example.com',
        ]);

        $dokterUmumUser = User::create([
            'username' => 'dokter_umum',
            'password' => Hash::make('password'),
            'role' => 'dokter',
            'nama_lengkap' => 'Dr. Umum Sehat',
            'no_telp' => '081234567894',
            'nik' => '1234567890123460',
            'email' => 'dokter.umum@example.com',
        ]);

        $dokterAnakUser = User::create([
            'username' => 'dokter_anak',
            'password' => Hash::make('password'),
            'role' => 'dokter',
            'nama_lengkap' => 'Dr. Anak Sehat',
            'no_telp' => '081234567895',
            'nik' => '1234567890123461',
            'email' => 'dokter.anak@example.com',
        ]);

        // Create Dokter Profiles
        $dokterGigi = Dokter::create([
            'user_id' => $dokterGigiUser->id,
            'spesialisasi' => 'Gigi',
        ]);

        $dokterUmum = Dokter::create([
            'user_id' => $dokterUmumUser->id,
            'spesialisasi' => 'Umum',
        ]);

        $dokterAnak = Dokter::create([
            'user_id' => $dokterAnakUser->id,
            'spesialisasi' => 'Anak',
        ]);

        // Create Pasien User
        $pasienUser = User::create([
            'username' => 'pasien',
            'password' => Hash::make('password'),
            'role' => 'pasien',
            'nama_lengkap' => 'Pasien Satu',
            'no_telp' => '081234567896',
            'nik' => '1234567890123462',
            'email' => 'pasien@example.com',
        ]);

        // Create Pasien Profile
        $pasien = Pasien::create([
            'user_id' => $pasienUser->id,
            'tanggal_lahir' => '1990-01-01',
            'alamat' => 'Jl. Contoh No. 123, Kota Contoh',
            'jenis_kelamin' => 'laki-laki',
            'golongan_darah' => 'O',
            'alergi' => 'Tidak ada',
        ]);
    }
}
