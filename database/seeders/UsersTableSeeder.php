<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 2,
                'name' => 'kordinator 14',
                'email' => 'kordinator14@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$lor.jcoLsx4FCGfhF0oTeeCh92wpe5t0cOg/s8LOK8boDoBWlYb26',
                'remember_token' => NULL,
                'created_at' => '2025-03-12 04:19:03',
                'updated_at' => '2025-03-12 04:19:03',
                'warga_id' => 283,
            ),
            1 => 
            array (
                'id' => 4,
                'name' => 'kurob1993',
                'email' => 'kurob1993@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$pywTMzX5WjQ7THnTmS29mePa/YKAwEaUWZ6wUaFqcrTe2c4fpnNFC',
                'remember_token' => NULL,
                'created_at' => '2025-05-17 11:31:41',
                'updated_at' => '2025-05-17 11:31:41',
                'warga_id' => NULL,
            ),
            2 => 
            array (
                'id' => 1,
                'name' => 'kurob',
                'email' => 'kurob@mail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$JIsxcWwpBaJIIiGUxKCnL.OamjA3tt/3yKyej6GE/9VvHeGFMROXa',
                'remember_token' => '57eRDzhnC6kBPhs9SyCNJvejY4zOUORlqQQzz4aSWjpqDv0Hivst0Pa8H54B',
                'created_at' => '2024-11-30 18:10:35',
                'updated_at' => '2025-06-09 15:31:51',
                'warga_id' => 285,
            ),
            3 => 
            array (
                'id' => 8,
                'name' => 'Dira',
                'email' => 'dira201@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$Gm2mM91nxlU2dN5FuQ5Qnu4Y1BpJhNd2/b..iF5mvTpEY5M6kDbMS',
                'remember_token' => NULL,
                'created_at' => '2025-06-09 16:32:39',
                'updated_at' => '2025-06-15 12:47:42',
                'warga_id' => 350,
            ),
        ));
        
        
    }
}