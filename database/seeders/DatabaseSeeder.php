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

        $poliTHT = Poli::create([
            'nama_poli' => 'Poli THT',
            'kode_poli' => 'D',
            'deskripsi' => 'Poli untuk Pemeriksaan THT',
        ]);

        // Create Dokter Gigi Users
        $dokterGigi1 = User::create([
            'username' => 'dokter_sarah',
            'password' => Hash::make('password'),
            'role' => 'dokter',
            'nama_lengkap' => 'drg. Sarah',
            'no_telp' => '081234567893',
            'nik' => '1234567890123459',
            'email' => 'dokter.gigi1@example.com',
        ]);
        $dokterGigi2 = User::create([
            'username' => 'dokter_arya',
            'password' => Hash::make('password'),
            'role' => 'dokter',
            'nama_lengkap' => 'drg. Arya',
            'no_telp' => '081234567893',
            'nik' => '12345678901234591',
            'email' => 'dokter.gigi2@example.com',
        ]);
        $dokterGigi3 = User::create([
            'username' => 'dokter_faradilla',
            'password' => Hash::make('password'),
            'role' => 'dokter',
            'nama_lengkap' => 'drg. Faradilla',
            'no_telp' => '081234567893',
            'nik' => '12345678901234529',
            'email' => 'dokter.gigi3@example.com',
        ]);

        #Create dokter Anak User
        $dokterAnak1 = User::create([
            'username' => 'dokter_daffa',
            'password' => Hash::make('password'),
            'role' => 'dokter',
            'nama_lengkap' => 'dr. Daffa S.An',
            'no_telp' => '081234567893',
            'nik' => '12345678901234593',
            'email' => 'dokter.anak1@example.com',
        ]);
        $dokterAnak2 = User::create([
            'username' => 'dokter_khalid',
            'password' => Hash::make('password'),
            'role' => 'dokter',
            'nama_lengkap' => 'dr. Khalid S.An',
            'no_telp' => '081234567893',
            'nik' => '12345678901234594',
            'email' => 'dokter.anak2@example.com',
        ]);

        #Create dokter Umum User
        $dokterUmum1 = User::create([
            'username' => 'dokter_ahmad',
            'password' => Hash::make('password'),
            'role' => 'dokter',
            'nama_lengkap' => 'Dr. Ahmad',
            'no_telp' => '081234567894',
            'nik' => '1234567890123460',
            'email' => 'dokter.umum1@example.com',
        ]);
        $dokterUmum2 = User::create([
            'username' => 'dokter_Tirta',
            'password' => Hash::make('password'),
            'role' => 'dokter',
            'nama_lengkap' => 'Dr. Tirta',
            'no_telp' => '081234567894',
            'nik' => '12345678901234601',
            'email' => 'dokter.umum2@example.com',
        ]);
        $dokterUmum3 = User::create([
            'username' => 'dokter_safira',
            'password' => Hash::make('password'),
            'role' => 'dokter',
            'nama_lengkap' => 'Dr. Safira',
            'no_telp' => '081234567894',
            'nik' => '12345678901234602',
            'email' => 'dokter.umum3@example.com',
        ]);

        $dokterTHT1= User::create([
            'username' => 'dokter_alfian',
            'password' => Hash::make('password'),
            'role' => 'dokter',
            'nama_lengkap' => 'Dr. Alfian Firdaus Sp.THT-KL',
            'no_telp' => '081234567895',
            'nik' => '12345678901234631',
            'email' => 'dokter.THT1@example.com',
        ]);

        // Create Dokter Profiles
        $dokterGigi1 = Dokter::create([
            'user_id' => $dokterGigi1->id,
            'spesialisasi' => 'Gigi',
        ]);
        $dokterGigi2 = Dokter::create([
            'user_id' => $dokterGigi2->id,
            'spesialisasi' => 'Gigi',
        ]);
        $dokterGigi3 = Dokter::create([
            'user_id' => $dokterGigi3->id,
            'spesialisasi' => 'Gigi',
        ]);

        $dokterAnak1 = Dokter::create([
            'user_id' => $dokterAnak1->id,
            'spesialisasi' => 'Anak',
        ]);
        $dokterAnak2 = Dokter::create([
            'user_id' => $dokterAnak2->id,
            'spesialisasi' => 'Anak',
        ]);
   

        $dokterUmum1 = Dokter::create([
            'user_id' => $dokterUmum1->id,
            'spesialisasi' => 'Umum',
        ]);
        $dokterUmum2 = Dokter::create([
            'user_id' => $dokterUmum2->id,
            'spesialisasi' => 'Umum',
        ]);
        $dokterUmum3 = Dokter::create([
            'user_id' => $dokterUmum3->id,
            'spesialisasi' => 'Umum',
        ]);


        $dokterTHT1 = Dokter::Create([
            'user_id' => $dokterTHT1->id,
            'spesialisasi' => 'THT',
        ]);

        // Create Pasien User
        $pasienUser1 = User::create([
            'username' => 'pasien1',
            'password' => Hash::make('password'),
            'role' => 'pasien',
            'nama_lengkap' => 'Ny Dhiya Syifa',
            'no_telp' => '081234567896',
            'nik' => '12345678901234621',
            'email' => 'pasien1@example.com',
        ]);
        $pasienUser2 = User::create([
            'username' => 'pasien2',
            'password' => Hash::make('password'),
            'role' => 'pasien',
            'nama_lengkap' => 'Tn. Ferdy Rizkiawan',
            'no_telp' => '081234567896',
            'nik' => '12345678901234622',
            'email' => 'pasien2@example.com',
        ]);
        $pasienUser3 = User::create([
            'username' => 'pasien3',
            'password' => Hash::make('password'),
            'role' => 'pasien',
            'nama_lengkap' => 'Tn Whilyan Pratama',
            'no_telp' => '081234567896',
            'nik' => '12345678901234623',
            'email' => 'pasien3@example.com',
        ]);
        $pasienUser4 = User::create([
            'username' => 'pasien4',
            'password' => Hash::make('password'),
            'role' => 'pasien',
            'nama_lengkap' => 'Tn. HaidarDzaky',
            'no_telp' => '081234567896',
            'nik' => '12345678901234632',
            'email' => 'pasien4@example.com',
        ]);

        // Create Pasien Profile
        $pasienUser1 = Pasien::create([
            'user_id' => $pasienUser1->id,
            'tanggal_lahir' => '1990-01-01',
            'alamat' => 'Jl. Contoh No. 123, Kota Contoh',
            'jenis_kelamin' => 'Perempuan',
            'golongan_darah' => 'O',
            'alergi' => 'Tidak ada',
        ]);
        $pasienUser2 = Pasien::create([
            'user_id' => $pasienUser2->id,
            'tanggal_lahir' => '1990-01-01',
            'alamat' => 'Jl. Contoh No. 123, Kota Contoh',
            'jenis_kelamin' => 'Laki-laki',
            'golongan_darah' => 'O',
            'alergi' => 'Tidak ada',
        ]);
        $pasienUser3 = Pasien::create([
            'user_id' => $pasienUser3->id,
            'tanggal_lahir' => '1990-01-01',
            'alamat' => 'Jl. Contoh No. 123, Kota Contoh',
            'jenis_kelamin' => 'Laki-laki',
            'golongan_darah' => 'O',
            'alergi' => 'Tidak ada',
        ]);
        $pasienUser4 = Pasien::create([
            'user_id' => $pasienUser4->id,
            'tanggal_lahir' => '1990-01-01',
            'alamat' => 'Jl. Contoh No. 123, Kota Contoh',
            'jenis_kelamin' => 'Laki-laki',
            'golongan_darah' => 'O',
            'alergi' => 'Tidak ada',
        ]);

        // $this->call([
        //     JadwalDokterSeeder::class,
        // ]);
    } 
}
