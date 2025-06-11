<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Medicine;
use Illuminate\Support\Str; // Import class untuk generate UUID

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Opsi: Kosongkan tabel terlebih dahulu untuk menghindari duplikasi data
        DB::table('medicine')->delete();

        // Data awal obat-obatan
        $medicines = [
            ['kode_poli' => 'A', 'nama_obat' => 'Kalsium Hidroksida Pasta (untuk gigi)', 'katagori' => 'Bahan Perawatan Saluran Akar Gigi', 'jenis' => 'Pasta', 'jumlah' => 100, 'harga' => 10000],
            ['kode_poli' => 'A', 'nama_obat' => 'Metronidazole Tablet 500mg', 'katagori' => 'Antibiotik/Antiprotozoa', 'jenis' => 'Tablet', 'jumlah' => 100, 'harga' => 500],
            ['kode_poli' => 'B', 'nama_obat' => 'Asam Mefenamat Kaplet 500mg', 'katagori' => 'Analgesik NSAID', 'jenis' => 'Kaplet', 'jumlah' => 100, 'harga' => 50000],
            ['kode_poli' => 'B', 'nama_obat' => 'Antasida Doen Tablet Kunyah', 'katagori' => 'Antasida', 'jenis' => 'Tablet', 'jumlah' => 100, 'harga' => 11000],
            ['kode_poli' => 'B', 'nama_obat' => 'Oralit Sachet', 'katagori' => 'Larutan Rehidrasi Oral', 'jenis' => 'Sachet', 'jumlah' => 100, 'harga' => 1000],
            ['kode_poli' => 'A', 'nama_obat' => 'Amoxicillin Kapsul/Kaplet 500mg', 'katagori' => 'Antibiotik Penisilin', 'jenis' => 'Kapsul/Kaplet', 'jumlah' => 11000, 'harga' => 500],
            ['kode_poli' => 'D', 'nama_obat' => 'Azithromycin Tablet 500mg', 'katagori' => 'Antibiotik Makrolida', 'jenis' => 'Tablet', 'jumlah' => 100, 'harga' => 13000],
            ['kode_poli' => 'B', 'nama_obat' => 'Alkohol 70% 100ml', 'katagori' => 'Antiseptik', 'jenis' => 'Cairan', 'jumlah' => 100, 'harga' => 50000],
            ['kode_poli' => 'C', 'nama_obat' => 'Amoxicillin Sirup Kering 125mg/5ml 60ml', 'katagori' => 'Antibiotik Penisilin', 'jenis' => 'Sirup', 'jumlah' => 11000, 'harga' => 6000],
            ['kode_poli' => 'B', 'nama_obat' => 'Diphenhydramine Injeksi 10mg/ml Ampul', 'katagori' => 'Antihistamin/Obat Darurat Alergi', 'jenis' => 'Injeksi', 'jumlah' => 100, 'harga' => 10000],
            ['kode_poli' => 'C', 'nama_obat' => 'Ambroxol Sirup 15mg/5ml 60ml', 'katagori' => 'Mukolitik', 'jenis' => 'Sirup', 'jumlah' => 100, 'harga' => 16000],
            ['kode_poli' => 'D', 'nama_obat' => 'Dekongestan Nasal Spray (contoh: Oxymetazoline)', 'katagori' => 'Dekongestan Nasal', 'jenis' => 'Spray', 'jumlah' => 100, 'harga' => 10000],
            ['kode_poli' => 'D', 'nama_obat' => 'Loratadine Tablet 10mg', 'katagori' => 'Antihistamin', 'jenis' => 'Tablet', 'jumlah' => 100, 'harga' => 400],
            ['kode_poli' => 'C', 'nama_obat' => 'Albendazol Tablet 400mg', 'katagori' => 'Antelmintik', 'jenis' => 'Tablet', 'jumlah' => 100, 'harga' => 200000],
            ['kode_poli' => 'C', 'nama_obat' => 'Zinc Sirup 20mg/5ml 60ml', 'katagori' => 'Suplemen Mineral/Antidiare', 'jenis' => 'Sirup', 'jumlah' => 100, 'harga' => 10000],
            ['kode_poli' => 'B', 'nama_obat' => 'Guaifenesin (GG) Tablet 100mg', 'katagori' => 'Ekspektoran', 'jenis' => 'Tablet', 'jumlah' => 100, 'harga' => 12000],
            ['kode_poli' => 'B', 'nama_obat' => 'Ibuprofen Tablet 200mg/400mg', 'katagori' => 'Analgesik NSAID', 'jenis' => 'Tablet', 'jumlah' => 100, 'harga' => 14000],
            ['kode_poli' => 'D', 'nama_obat' => 'Prednisone Tablet 5mg', 'katagori' => 'Kortikosteroid Sistemik', 'jenis' => 'Tablet', 'jumlah' => 100, 'harga' => 300],
            ['kode_poli' => 'C', 'nama_obat' => 'Salbutamol Sirup 2mg/5ml 60ml', 'katagori' => 'Bronkodilator', 'jenis' => 'Sirup', 'jumlah' => 100, 'harga' => 8000],
            ['kode_poli' => 'C', 'nama_obat' => 'Nystatin Drops (Oral) 100.000 IU/ml', 'katagori' => 'Antijamur', 'jenis' => 'Drops', 'jumlah' => 100, 'harga' => 0],
            ['kode_poli' => 'D', 'nama_obat' => 'Betahistine Mesylate Tablet 6mg', 'katagori' => 'Antivertigo/Obat THT', 'jenis' => 'Tablet', 'jumlah' => 100, 'harga' => 10700],
            ['kode_poli' => 'C', 'nama_obat' => 'Zinc Tablet Dispersible 20mg (untuk diare anak)', 'katagori' => 'Suplemen Mineral/Antidiare', 'jenis' => 'Tablet Dispersible', 'jumlah' => 100, 'harga' => 500],
            ['kode_poli' => 'C', 'nama_obat' => 'Paracetamol Drops 15ml', 'katagori' => 'Analgesik/Antipiretik', 'jenis' => 'Drops', 'jumlah' => 100, 'harga' => 10000],
            ['kode_poli' => 'B', 'nama_obat' => 'Metformin Tablet 500mg', 'katagori' => 'Antidiabetik Oral', 'jenis' => 'Tablet', 'jumlah' => 100, 'harga' => 300],
            ['kode_poli' => 'B', 'nama_obat' => 'Ranitidine Tablet 150mg', 'katagori' => 'Antagonis H2 (Obat Lambung)', 'jenis' => 'Tablet', 'jumlah' => 100, 'harga' => 400],
            ['kode_poli' => 'B', 'nama_obat' => 'Dexamethasone Tablet 0.5mg', 'katagori' => 'Kortikosteroid Sistemik', 'jenis' => 'Tablet', 'jumlah' => 100, 'harga' => 20000],
            ['kode_poli' => 'D', 'nama_obat' => 'Budesonide Nasal Spray', 'katagori' => 'Kortikosteroid Nasal', 'jenis' => 'Spray', 'jumlah' => 100, 'harga' => 10000],
            ['kode_poli' => 'B', 'nama_obat' => 'Hydrocortisone Krim 1% 5g', 'katagori' => 'Kortikosteroid Topikal', 'jenis' => 'Krim', 'jumlah' => 100, 'harga' => 30000],
            ['kode_poli' => 'A', 'nama_obat' => 'Ibuprofen Tablet 200mg/400mg', 'katagori' => 'Analgesik NSAID', 'jenis' => 'Tablet', 'jumlah' => 100, 'harga' => 40000],
            ['kode_poli' => 'D', 'nama_obat' => 'Fluticasone Nasal Spray', 'katagori' => 'Kortikosteroid Nasal', 'jenis' => 'Spray', 'jumlah' => 100, 'harga' => 12220],
            ['kode_poli' => 'C', 'nama_obat' => 'Domperidone Sirup 5mg/5ml 60ml', 'katagori' => 'Antiemetik', 'jenis' => 'Sirup', 'jumlah' => 100, 'harga' => 18000],
            ['kode_poli' => 'C', 'nama_obat' => 'Cetirizine Sirup 5mg/5ml 60ml', 'katagori' => 'Antihistamin', 'jenis' => 'Sirup', 'jumlah' => 100, 'harga' => 70000],
            ['kode_poli' => 'B', 'nama_obat' => 'Paracetamol Tablet 500mg', 'katagori' => 'Analgesik/Antipiretik', 'jenis' => 'Tablet', 'jumlah' => 100, 'harga' => 300],
            ['kode_poli' => 'B', 'nama_obat' => 'Salbutamol Tablet 2mg', 'katagori' => 'Bronkodilator', 'jenis' => 'Tablet', 'jumlah' => 100, 'harga' => 200],
            ['kode_poli' => 'A', 'nama_obat' => 'Lidocaine 2% Injeksi (Poli Gigi)', 'katagori' => 'Anestesi Lokal', 'jenis' => 'Injeksi', 'jumlah' => 100, 'harga' => 13000],
            ['kode_poli' => 'C', 'nama_obat' => 'Adrenalin (Epinephrine) Injeksi 1mg/ml Ampul', 'katagori' => 'Adrenergik/Obat Darurat Alergi', 'jenis' => 'Injeksi', 'jumlah' => 10000, 'harga' => 0],
            ['kode_poli' => 'B', 'nama_obat' => 'Loratadine Tablet 10mg', 'katagori' => 'Antihistamin', 'jenis' => 'Tablet', 'jumlah' => 100, 'harga' => 400],
            ['kode_poli' => 'A', 'nama_obat' => 'Clindamycin Kapsul 300mg', 'katagori' => 'Antibiotik Linkosamid', 'jenis' => 'Kapsul', 'jumlah' => 100, 'harga' => 10000],
            ['kode_poli' => 'B', 'nama_obat' => 'Methylprednisolone Tablet 4mg', 'katagori' => 'Kortikosteroid Sistemik', 'jenis' => 'Tablet', 'jumlah' => 100, 'harga' => 500],
            ['kode_poli' => 'D', 'nama_obat' => 'Erythromycin Kapsul/Kaplet 250mg', 'katagori' => 'Antibiotik Makrolida', 'jenis' => 'Kapsul/Kaplet', 'jumlah' => 100, 'harga' => 11500],
            ['kode_poli' => 'C', 'nama_obat' => 'Oralit Sachet', 'katagori' => 'Larutan Rehidrasi Oral', 'jenis' => 'Sachet', 'jumlah' => 100, 'harga' => 1000],
            ['kode_poli' => 'A', 'nama_obat' => 'Diclofenac Potassium Tablet 50mg', 'katagori' => 'Analgesik NSAID', 'jenis' => 'Tablet', 'jumlah' => 100, 'harga' => 10000],
            ['kode_poli' => 'A', 'nama_obat' => 'Azithromycin Tablet 500mg', 'katagori' => 'Antibiotik Makrolida', 'jenis' => 'Tablet', 'jumlah' => 100, 'harga' => 13000],
            ['kode_poli' => 'C', 'nama_obat' => 'Metronidazole Suspensi 125mg/5ml 60ml', 'katagori' => 'Antibiotik/Antiprotozoa', 'jenis' => 'Suspensi', 'jumlah' => 100, 'harga' => 8000],
            ['kode_poli' => 'C', 'nama_obat' => 'Diazepam Larutan Rektal 5mg', 'katagori' => 'Antikonvulsan/Ansiolitik', 'jenis' => 'Larutan Rektal', 'jumlah' => 100, 'harga' => 14000],
            ['kode_poli' => 'B', 'nama_obat' => 'Captopril Tablet 25mg', 'katagori' => 'Antihipertensi ACE Inhibitor', 'jenis' => 'Tablet', 'jumlah' => 100, 'harga' => 21000],
            ['kode_poli' => 'A', 'nama_obat' => 'Eugenol Cair (Minyak Cengkeh untuk gigi)', 'katagori' => 'Analgesik Topikal Gigi/Antiseptik', 'jenis' => 'Cairan', 'jumlah' => 12100, 'harga' => 0],
            ['kode_poli' => 'A', 'nama_obat' => 'Asam Mefenamat Kaplet 500mg', 'katagori' => 'Analgesik NSAID', 'jenis' => 'Kaplet', 'jumlah' => 100, 'harga' => 15000],
            ['kode_poli' => 'B', 'nama_obat' => 'Metronidazole Tablet 500mg', 'katagori' => 'Antibiotik/Antiprotozoa', 'jenis' => 'Tablet', 'jumlah' => 100, 'harga' => 500],
            ['kode_poli' => 'C', 'nama_obat' => 'Betamethasone Krim 0.1% 5g', 'katagori' => 'Kortikosteroid Topikal', 'jenis' => 'Krim', 'jumlah' => 100, 'harga' => 14000],
            ['kode_poli' => 'B', 'nama_obat' => 'Allopurinol Tablet 100mg', 'katagori' => 'Anti Gout', 'jenis' => 'Tablet', 'jumlah' => 100, 'harga' => 30000],
            ['kode_poli' => 'A', 'nama_obat' => 'Erythromycin Kapsul/Kaplet 250mg', 'katagori' => 'Antibiotik Makrolida', 'jenis' => 'Kapsul/Kaplet', 'jumlah' => 100, 'harga' => 11500],
            ['kode_poli' => 'C', 'nama_obat' => 'Cotrimoxazole Suspensi 60ml', 'katagori' => 'Antibiotik Sulfonamida', 'jenis' => 'Suspensi', 'jumlah' => 100, 'harga' => 17000],
            ['kode_poli' => 'D', 'nama_obat' => 'Cetirizine Tablet 10mg', 'katagori' => 'Antihistamin', 'jenis' => 'Tablet', 'jumlah' => 100, 'harga' => 30000],
            ['kode_poli' => 'A', 'nama_obat' => 'Paracetamol Tablet 500mg', 'katagori' => 'Analgesik/Antipiretik', 'jenis' => 'Tablet', 'jumlah' => 100, 'harga' => 300],
            ['kode_poli' => 'B', 'nama_obat' => 'Domperidone Tablet 10mg', 'katagori' => 'Antiemetik', 'jenis' => 'Tablet', 'jumlah' => 100, 'harga' => 400],
            ['kode_poli' => 'C', 'nama_obat' => 'Asam Folat Tablet 1mg', 'katagori' => 'Vitamin/Suplemen', 'jenis' => 'Tablet', 'jumlah' => 100, 'harga' => 22000],
            ['kode_poli' => 'C', 'nama_obat' => 'Prednisone Tablet 5mg', 'katagori' => 'Kortikosteroid Sistemik', 'jenis' => 'Tablet', 'jumlah' => 100, 'harga' => 300],
            ['kode_poli' => 'B', 'nama_obat' => 'Vitamin C Tablet 100mg', 'katagori' => 'Vitamin/Suplemen', 'jenis' => 'Tablet', 'jumlah' => 100, 'harga' => 200],
            ['kode_poli' => 'D', 'nama_obat' => 'Saline Nasal Spray/Drops', 'katagori' => 'Pembersih Hidung/Pelembab', 'jenis' => 'Spray/Drops', 'jumlah' => 100, 'harga' => 0],
            ['kode_poli' => 'B', 'nama_obat' => 'Povidone Iodine Solusi Antiseptik 30ml', 'katagori' => 'Antiseptik', 'jenis' => 'Solusi', 'jumlah' => 100, 'harga' => 5000],
            ['kode_poli' => 'B', 'nama_obat' => 'Dexamethasone Injeksi 5mg/ml Ampul', 'katagori' => 'Kortikosteroid Sistemik', 'jenis' => 'Injeksi', 'jumlah' => 100, 'harga' => 13000],
            ['kode_poli' => 'D', 'nama_obat' => 'Betamethasone Krim 0.1% 5g', 'katagori' => 'Kortikosteroid Topikal', 'jenis' => 'Krim', 'jumlah' => 100, 'harga' => 14000],
            ['kode_poli' => 'B', 'nama_obat' => 'Amoxicillin Kapsul/Kaplet 500mg', 'katagori' => 'Antibiotik Penisilin', 'jenis' => 'Kapsul/Kaplet', 'jumlah' => 11000, 'harga' => 500],
            ['kode_poli' => 'D', 'nama_obat' => 'Ambroxol Tablet 30mg', 'katagori' => 'Mukolitik', 'jenis' => 'Tablet', 'jumlah' => 100, 'harga' => 13000],
            ['kode_poli' => 'B', 'nama_obat' => 'Cotrimoxazole Tablet Dewasa (480mg)', 'katagori' => 'Antibiotik Sulfonamida', 'jenis' => 'Tablet', 'jumlah' => 100, 'harga' => 50000],
            ['kode_poli' => 'A', 'nama_obat' => 'Hidrogen Peroksida 3% Cairan 60ml', 'katagori' => 'Antiseptik Ringan', 'jenis' => 'Cairan', 'jumlah' => 100, 'harga' => 30000],
            ['kode_poli' => 'D', 'nama_obat' => 'Methylprednisolone Tablet 4mg', 'katagori' => 'Kortikosteroid Sistemik', 'jenis' => 'Tablet', 'jumlah' => 100, 'harga' => 500],
            ['kode_poli' => 'B', 'nama_obat' => 'Simvastatin Tablet 10mg', 'katagori' => 'Antikolesterol Statin', 'jenis' => 'Tablet', 'jumlah' => 100, 'harga' => 300],
            ['kode_poli' => 'B', 'nama_obat' => 'Cetirizine Tablet 10mg', 'katagori' => 'Antihistamin', 'jenis' => 'Tablet', 'jumlah' => 100, 'harga' => 30000],
            ['kode_poli' => 'B', 'nama_obat' => 'Vitamin B Complex Tablet', 'katagori' => 'Vitamin/Suplemen', 'jenis' => 'Tablet', 'jumlah' => 100, 'harga' => 200],
            ['kode_poli' => 'D', 'nama_obat' => 'Pseudoephedrine HCl + Triprolidine HCl Tablet', 'katagori' => 'Dekongestan/Antihistamin', 'jenis' => 'Tablet', 'jumlah' => 100, 'harga' => 2000],
            ['kode_poli' => 'B', 'nama_obat' => 'Antasida Doen Sirup 60ml', 'katagori' => 'Antasida', 'jenis' => 'Sirup', 'jumlah' => 100, 'harga' => 440000],
            ['kode_poli' => 'C', 'nama_obat' => 'Paracetamol Sirup 120mg/5ml 60ml', 'katagori' => 'Analgesik/Antipiretik', 'jenis' => 'Sirup', 'jumlah' => 100, 'harga' => 5000],
            ['kode_poli' => 'B', 'nama_obat' => 'Omeprazole Kapsul 20mg', 'katagori' => 'Proton Pump Inhibitor (PPI)', 'jenis' => 'Kapsul', 'jumlah' => 100, 'harga' => 500],
            ['kode_poli' => 'C', 'nama_obat' => 'Ibuprofen Sirup 100mg/5ml 60ml', 'katagori' => 'Analgesik NSAID/Antipiretik', 'jenis' => 'Sirup', 'jumlah' => 100, 'harga' => 17000],
            ['kode_poli' => 'B', 'nama_obat' => 'Salbutamol Inhaler (MDI)', 'katagori' => 'Bronkodilator', 'jenis' => 'Inhaler', 'jumlah' => 100, 'harga' => 0],
        ];

        // Siapkan data untuk dimasukkan dengan UUID, timestamp, dan harga yang disesuaikan
        $dataToInsert = [];
        $now = now(); // Waktu saat ini

        foreach ($medicines as $medicine) {
            // Sesuaikan harga berdasarkan aturan
            $harga = $medicine['harga'];
            if ($harga == 0) {
                $harga = 5000;
            } elseif ($harga > 40000) {
                $harga = 40000;
            }

            $dataToInsert[] = [
                'id' => Str::uuid()->toString(), // Generate UUID baru
                'kode_poli' => $medicine['kode_poli'],
                'nama_obat' => $medicine['nama_obat'],
                'katagori' => $medicine['katagori'],
                'jenis' => $medicine['jenis'],
                'jumlah' => $medicine['jumlah'],
                'harga' => $harga,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // Masukkan semua data yang sudah disiapkan ke dalam tabel 'medicine'
        foreach ($dataToInsert as $data) {
            Medicine::create($data);
        }
    }
}