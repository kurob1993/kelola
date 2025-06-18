<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GangsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('gangs')->delete();
        
        \DB::table('gangs')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama' => 'SOEKARNO 1',
                'perumahan_id' => 1,
                'created_at' => '2025-01-11 20:56:29',
                'updated_at' => '2025-01-11 20:56:29',
            ),
            1 => 
            array (
                'id' => 2,
                'nama' => 'SOEKARNO 2',
                'perumahan_id' => 1,
                'created_at' => '2025-01-11 20:58:19',
                'updated_at' => '2025-01-11 20:58:19',
            ),
            2 => 
            array (
                'id' => 3,
                'nama' => 'SOEKARNO 3',
                'perumahan_id' => 1,
                'created_at' => '2025-01-11 20:58:35',
                'updated_at' => '2025-01-11 20:58:35',
            ),
            3 => 
            array (
                'id' => 4,
                'nama' => 'SOEKARNO 4',
                'perumahan_id' => 1,
                'created_at' => '2025-01-11 20:58:39',
                'updated_at' => '2025-01-11 20:58:39',
            ),
            4 => 
            array (
                'id' => 5,
                'nama' => 'SOEKARNO 5',
                'perumahan_id' => 1,
                'created_at' => '2025-01-11 20:58:44',
                'updated_at' => '2025-01-11 20:58:44',
            ),
            5 => 
            array (
                'id' => 6,
                'nama' => 'SOEKARNO 6',
                'perumahan_id' => 1,
                'created_at' => '2025-01-11 20:58:48',
                'updated_at' => '2025-01-11 20:58:48',
            ),
            6 => 
            array (
                'id' => 7,
                'nama' => 'SOEKARNO 7',
                'perumahan_id' => 1,
                'created_at' => '2025-01-11 20:58:52',
                'updated_at' => '2025-01-11 20:58:52',
            ),
            7 => 
            array (
                'id' => 8,
                'nama' => 'SOEKARNO 8',
                'perumahan_id' => 1,
                'created_at' => '2025-01-11 20:58:58',
                'updated_at' => '2025-01-11 20:58:58',
            ),
            8 => 
            array (
                'id' => 9,
                'nama' => 'SOEKARNO 9',
                'perumahan_id' => 1,
                'created_at' => '2025-01-11 20:59:03',
                'updated_at' => '2025-01-11 20:59:03',
            ),
            9 => 
            array (
                'id' => 10,
                'nama' => 'SOEKARNO 10',
                'perumahan_id' => 1,
                'created_at' => '2025-01-11 20:59:09',
                'updated_at' => '2025-01-11 20:59:09',
            ),
            10 => 
            array (
                'id' => 11,
                'nama' => 'SOEKARNO 11',
                'perumahan_id' => 1,
                'created_at' => '2025-01-11 20:59:13',
                'updated_at' => '2025-01-11 20:59:13',
            ),
            11 => 
            array (
                'id' => 12,
                'nama' => 'SOEKARNO 12',
                'perumahan_id' => 1,
                'created_at' => '2025-01-11 20:59:17',
                'updated_at' => '2025-01-11 20:59:17',
            ),
            12 => 
            array (
                'id' => 13,
                'nama' => 'SOEKARNO 13',
                'perumahan_id' => 1,
                'created_at' => '2025-01-11 20:59:22',
                'updated_at' => '2025-01-11 20:59:22',
            ),
            13 => 
            array (
                'id' => 14,
                'nama' => 'SOEKARNO 14',
                'perumahan_id' => 1,
                'created_at' => '2025-01-11 20:59:26',
                'updated_at' => '2025-01-11 20:59:26',
            ),
            14 => 
            array (
                'id' => 15,
                'nama' => 'SOEKARNO 15',
                'perumahan_id' => 1,
                'created_at' => '2025-01-11 20:59:30',
                'updated_at' => '2025-01-11 20:59:30',
            ),
        ));
        
        
    }
}