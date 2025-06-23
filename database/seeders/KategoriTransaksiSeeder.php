<?php

namespace Database\Seeders;

use App\Models\KategoriTransaksi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriTransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategori = [
            'Kebersihan',
            'Keamanan',
            'Acara Warga',
            'Fasilitas Umum',
            'Operasional',
        ];

        foreach ($kategori as $nama) {
            KategoriTransaksi::firstOrCreate(['nama' => $nama]);
        }
    }
}
