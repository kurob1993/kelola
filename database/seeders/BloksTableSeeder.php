<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BloksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('bloks')->delete();
        
        \DB::table('bloks')->insert(array (
            0 => 
            array (
                'id' => 2,
                'perumahan_id' => 1,
                'nama_blok' => 'B',
                'created_at' => '2025-06-18 14:53:41',
                'updated_at' => '2025-06-18 14:53:41',
            ),
            1 => 
            array (
                'id' => 1,
                'perumahan_id' => 1,
                'nama_blok' => 'C - RT 15',
                'created_at' => '2024-11-30 20:07:05',
                'updated_at' => '2025-06-23 23:33:17',
            ),
        ));
        
        
    }
}