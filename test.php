use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
       //code utama seeder, biasanya ketika saya run saya harus un comment dulu fungnsi dibawah
        $this->call([
            JadwalDokterSeeder::class,
        ]);
    }
}
