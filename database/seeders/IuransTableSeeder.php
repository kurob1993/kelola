<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class IuransTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('iurans')->delete();
        
        \DB::table('iurans')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama_iuran' => 'Keamanan',
                'nominal' => '23000.00',
                'deskripsi' => 'Keberisan',
                'periode' => 'bulanan',
                'created_at' => '2024-11-30 20:15:18',
                'updated_at' => '2025-01-11 21:38:47',
                'gang_id' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'nama_iuran' => 'Sampah',
                'nominal' => '30000.00',
                'deskripsi' => NULL,
                'periode' => 'bulanan',
                'created_at' => '2024-12-03 11:50:04',
                'updated_at' => '2025-01-11 21:17:38',
                'gang_id' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'nama_iuran' => 'Iuran Gang',
                'nominal' => '2000.00',
                'deskripsi' => NULL,
                'periode' => 'bulanan',
                'created_at' => '2025-01-11 21:19:39',
                'updated_at' => '2025-01-11 22:11:33',
                'gang_id' => 14,
            ),
        ));
        
        
    }
}