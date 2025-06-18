<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BlokDetailsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('blok_details')->delete();
        
        \DB::table('blok_details')->insert(array (
            0 => 
            array (
                'id' => 1,
                'blok_id' => 1,
                'nama_blok' => 'CA',
                'created_at' => '2024-11-30 20:07:05',
                'updated_at' => '2024-11-30 20:07:26',
            ),
            1 => 
            array (
                'id' => 2,
                'blok_id' => 1,
                'nama_blok' => 'CB',
                'created_at' => '2024-12-01 09:45:15',
                'updated_at' => '2024-12-01 09:45:15',
            ),
            2 => 
            array (
                'id' => 3,
                'blok_id' => 1,
                'nama_blok' => 'CC',
                'created_at' => '2024-12-01 09:45:20',
                'updated_at' => '2024-12-01 09:45:20',
            ),
            3 => 
            array (
                'id' => 4,
                'blok_id' => 1,
                'nama_blok' => 'CD',
                'created_at' => '2024-12-01 09:45:24',
                'updated_at' => '2024-12-01 09:45:24',
            ),
            4 => 
            array (
                'id' => 5,
                'blok_id' => 1,
                'nama_blok' => 'CE',
                'created_at' => '2024-12-01 09:45:30',
                'updated_at' => '2024-12-01 09:45:30',
            ),
            5 => 
            array (
                'id' => 6,
                'blok_id' => 1,
                'nama_blok' => 'CF',
                'created_at' => '2024-12-01 09:45:38',
                'updated_at' => '2024-12-01 09:45:38',
            ),
            6 => 
            array (
                'id' => 7,
                'blok_id' => 1,
                'nama_blok' => 'CG',
                'created_at' => '2024-12-01 09:45:42',
                'updated_at' => '2024-12-01 09:45:42',
            ),
            7 => 
            array (
                'id' => 8,
                'blok_id' => 1,
                'nama_blok' => 'CH',
                'created_at' => '2024-12-01 09:45:49',
                'updated_at' => '2024-12-01 09:45:49',
            ),
            8 => 
            array (
                'id' => 9,
                'blok_id' => 1,
                'nama_blok' => 'CI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'blok_id' => 1,
                'nama_blok' => 'CJ',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'blok_id' => 1,
                'nama_blok' => 'CK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'blok_id' => 1,
                'nama_blok' => 'CL',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'blok_id' => 1,
                'nama_blok' => 'CM',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'blok_id' => 1,
                'nama_blok' => 'CN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'blok_id' => 1,
                'nama_blok' => 'CO',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'blok_id' => 1,
                'nama_blok' => 'CA1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'blok_id' => 1,
                'nama_blok' => 'CA2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'blok_id' => 1,
                'nama_blok' => 'CA2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'blok_id' => 2,
                'nama_blok' => 'BH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'blok_id' => 2,
                'nama_blok' => 'BA',
                'created_at' => '2025-06-18 14:59:16',
                'updated_at' => '2025-06-18 14:59:16',
            ),
        ));
        
        
    }
}