<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PerumahansTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('perumahans')->delete();
        
        \DB::table('perumahans')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama_perumahan' => 'Bukit Cilegon Asri',
                'alamat' => 'Kel Bangendung',
                'kota' => 'Cilegon',
                'created_at' => '2024-11-30 20:06:49',
                'updated_at' => '2024-11-30 20:06:49',
            ),
            1 => 
            array (
                'id' => 2,
                'nama_perumahan' => 'GCI',
                'alamat' => 'Cilegon',
                'kota' => 'Cilegon',
                'created_at' => '2025-06-09 14:38:51',
                'updated_at' => '2025-06-09 14:38:51',
            ),
        ));
        
        
    }
}