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
                'id' => 1,
                'perumahan_id' => 1,
                'nama_blok' => 'CA',
                'created_at' => '2024-11-30 20:07:05',
                'updated_at' => '2024-11-30 20:07:26',
                'rt_id' => NULL,
                'kordinator_id' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'perumahan_id' => 1,
                'nama_blok' => 'CB',
                'created_at' => '2024-12-01 09:45:15',
                'updated_at' => '2024-12-01 09:45:15',
                'rt_id' => NULL,
                'kordinator_id' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'perumahan_id' => 1,
                'nama_blok' => 'CC',
                'created_at' => '2024-12-01 09:45:20',
                'updated_at' => '2024-12-01 09:45:20',
                'rt_id' => NULL,
                'kordinator_id' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'perumahan_id' => 1,
                'nama_blok' => 'CD',
                'created_at' => '2024-12-01 09:45:24',
                'updated_at' => '2024-12-01 09:45:24',
                'rt_id' => NULL,
                'kordinator_id' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'perumahan_id' => 1,
                'nama_blok' => 'CE',
                'created_at' => '2024-12-01 09:45:30',
                'updated_at' => '2024-12-01 09:45:30',
                'rt_id' => NULL,
                'kordinator_id' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'perumahan_id' => 1,
                'nama_blok' => 'CF',
                'created_at' => '2024-12-01 09:45:38',
                'updated_at' => '2024-12-01 09:45:38',
                'rt_id' => NULL,
                'kordinator_id' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'perumahan_id' => 1,
                'nama_blok' => 'CG',
                'created_at' => '2024-12-01 09:45:42',
                'updated_at' => '2024-12-01 09:45:42',
                'rt_id' => NULL,
                'kordinator_id' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'perumahan_id' => 1,
                'nama_blok' => 'CH',
                'created_at' => '2024-12-01 09:45:49',
                'updated_at' => '2024-12-01 09:45:49',
                'rt_id' => NULL,
                'kordinator_id' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'perumahan_id' => 1,
                'nama_blok' => 'CI',
                'created_at' => NULL,
                'updated_at' => NULL,
                'rt_id' => NULL,
                'kordinator_id' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'perumahan_id' => 1,
                'nama_blok' => 'CJ',
                'created_at' => NULL,
                'updated_at' => NULL,
                'rt_id' => NULL,
                'kordinator_id' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'perumahan_id' => 1,
                'nama_blok' => 'CK',
                'created_at' => NULL,
                'updated_at' => NULL,
                'rt_id' => NULL,
                'kordinator_id' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'perumahan_id' => 1,
                'nama_blok' => 'CL',
                'created_at' => NULL,
                'updated_at' => NULL,
                'rt_id' => NULL,
                'kordinator_id' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'perumahan_id' => 1,
                'nama_blok' => 'CM',
                'created_at' => NULL,
                'updated_at' => NULL,
                'rt_id' => NULL,
                'kordinator_id' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'perumahan_id' => 1,
                'nama_blok' => 'CN',
                'created_at' => NULL,
                'updated_at' => NULL,
                'rt_id' => NULL,
                'kordinator_id' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'perumahan_id' => 1,
                'nama_blok' => 'CO',
                'created_at' => NULL,
                'updated_at' => NULL,
                'rt_id' => NULL,
                'kordinator_id' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'perumahan_id' => 1,
                'nama_blok' => 'CA1',
                'created_at' => NULL,
                'updated_at' => NULL,
                'rt_id' => NULL,
                'kordinator_id' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'perumahan_id' => 1,
                'nama_blok' => 'CA2',
                'created_at' => NULL,
                'updated_at' => NULL,
                'rt_id' => NULL,
                'kordinator_id' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'perumahan_id' => 1,
                'nama_blok' => 'CA2',
                'created_at' => NULL,
                'updated_at' => NULL,
                'rt_id' => NULL,
                'kordinator_id' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'perumahan_id' => 1,
                'nama_blok' => 'BH',
                'created_at' => NULL,
                'updated_at' => NULL,
                'rt_id' => NULL,
                'kordinator_id' => NULL,
            ),
        ));
        
        
    }
}