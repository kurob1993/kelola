<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'super_admin',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 18:32:37',
                'updated_at' => '2024-11-30 18:32:37',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'warga',
                'guard_name' => 'web',
                'created_at' => '2025-01-11 22:46:18',
                'updated_at' => '2025-01-11 22:47:08',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'kordinator',
                'guard_name' => 'web',
                'created_at' => '2025-03-12 04:18:00',
                'updated_at' => '2025-03-12 04:18:00',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'admin',
                'guard_name' => 'web',
                'created_at' => '2025-06-18 13:50:55',
                'updated_at' => '2025-06-18 13:50:55',
            ),
        ));
        
        
    }
}