<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'view_role',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 18:32:37',
                'updated_at' => '2024-11-30 18:32:37',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'view_any_role',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 18:32:37',
                'updated_at' => '2024-11-30 18:32:37',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'create_role',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 18:32:37',
                'updated_at' => '2024-11-30 18:32:37',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'update_role',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 18:32:37',
                'updated_at' => '2024-11-30 18:32:37',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'delete_role',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 18:32:37',
                'updated_at' => '2024-11-30 18:32:37',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'delete_any_role',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 18:32:37',
                'updated_at' => '2024-11-30 18:32:37',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'view_user',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 18:32:37',
                'updated_at' => '2024-11-30 18:32:37',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'view_any_user',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 18:32:37',
                'updated_at' => '2024-11-30 18:32:37',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'create_user',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 18:32:37',
                'updated_at' => '2024-11-30 18:32:37',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'update_user',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 18:32:37',
                'updated_at' => '2024-11-30 18:32:37',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'restore_user',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 18:32:37',
                'updated_at' => '2024-11-30 18:32:37',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'restore_any_user',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 18:32:37',
                'updated_at' => '2024-11-30 18:32:37',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'replicate_user',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 18:32:37',
                'updated_at' => '2024-11-30 18:32:37',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'reorder_user',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 18:32:37',
                'updated_at' => '2024-11-30 18:32:37',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'delete_user',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 18:32:37',
                'updated_at' => '2024-11-30 18:32:37',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'delete_any_user',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 18:32:37',
                'updated_at' => '2024-11-30 18:32:37',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'force_delete_user',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 18:32:37',
                'updated_at' => '2024-11-30 18:32:37',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'force_delete_any_user',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 18:32:37',
                'updated_at' => '2024-11-30 18:32:37',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'view_blok',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:30:48',
                'updated_at' => '2024-11-30 19:30:48',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'view_any_blok',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:30:48',
                'updated_at' => '2024-11-30 19:30:48',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'create_blok',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:30:48',
                'updated_at' => '2024-11-30 19:30:48',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'update_blok',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:30:48',
                'updated_at' => '2024-11-30 19:30:48',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'restore_blok',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:30:48',
                'updated_at' => '2024-11-30 19:30:48',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'restore_any_blok',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:30:48',
                'updated_at' => '2024-11-30 19:30:48',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'replicate_blok',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:30:48',
                'updated_at' => '2024-11-30 19:30:48',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'reorder_blok',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:30:48',
                'updated_at' => '2024-11-30 19:30:48',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'delete_blok',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:30:48',
                'updated_at' => '2024-11-30 19:30:48',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'delete_any_blok',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:30:48',
                'updated_at' => '2024-11-30 19:30:48',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'force_delete_blok',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:30:48',
                'updated_at' => '2024-11-30 19:30:48',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'force_delete_any_blok',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:30:48',
                'updated_at' => '2024-11-30 19:30:48',
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'view_iuran',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:30:48',
                'updated_at' => '2024-11-30 19:30:48',
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'view_any_iuran',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:30:48',
                'updated_at' => '2024-11-30 19:30:48',
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'create_iuran',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:30:48',
                'updated_at' => '2024-11-30 19:30:48',
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'update_iuran',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:30:48',
                'updated_at' => '2024-11-30 19:30:48',
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'restore_iuran',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:30:48',
                'updated_at' => '2024-11-30 19:30:48',
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'restore_any_iuran',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:30:48',
                'updated_at' => '2024-11-30 19:30:48',
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'replicate_iuran',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:30:48',
                'updated_at' => '2024-11-30 19:30:48',
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'reorder_iuran',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:30:48',
                'updated_at' => '2024-11-30 19:30:48',
            ),
            38 => 
            array (
                'id' => 39,
                'name' => 'delete_iuran',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:30:48',
                'updated_at' => '2024-11-30 19:30:48',
            ),
            39 => 
            array (
                'id' => 40,
                'name' => 'delete_any_iuran',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:30:48',
                'updated_at' => '2024-11-30 19:30:48',
            ),
            40 => 
            array (
                'id' => 41,
                'name' => 'force_delete_iuran',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:30:48',
                'updated_at' => '2024-11-30 19:30:48',
            ),
            41 => 
            array (
                'id' => 42,
                'name' => 'force_delete_any_iuran',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:30:48',
                'updated_at' => '2024-11-30 19:30:48',
            ),
            42 => 
            array (
                'id' => 43,
                'name' => 'view_perumahan',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:30:48',
                'updated_at' => '2024-11-30 19:30:48',
            ),
            43 => 
            array (
                'id' => 44,
                'name' => 'view_any_perumahan',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:30:48',
                'updated_at' => '2024-11-30 19:30:48',
            ),
            44 => 
            array (
                'id' => 45,
                'name' => 'create_perumahan',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:30:48',
                'updated_at' => '2024-11-30 19:30:48',
            ),
            45 => 
            array (
                'id' => 46,
                'name' => 'update_perumahan',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:30:48',
                'updated_at' => '2024-11-30 19:30:48',
            ),
            46 => 
            array (
                'id' => 47,
                'name' => 'restore_perumahan',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:30:48',
                'updated_at' => '2024-11-30 19:30:48',
            ),
            47 => 
            array (
                'id' => 48,
                'name' => 'restore_any_perumahan',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:30:48',
                'updated_at' => '2024-11-30 19:30:48',
            ),
            48 => 
            array (
                'id' => 49,
                'name' => 'replicate_perumahan',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:30:48',
                'updated_at' => '2024-11-30 19:30:48',
            ),
            49 => 
            array (
                'id' => 50,
                'name' => 'reorder_perumahan',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:30:48',
                'updated_at' => '2024-11-30 19:30:48',
            ),
            50 => 
            array (
                'id' => 51,
                'name' => 'delete_perumahan',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:30:48',
                'updated_at' => '2024-11-30 19:30:48',
            ),
            51 => 
            array (
                'id' => 52,
                'name' => 'delete_any_perumahan',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:30:48',
                'updated_at' => '2024-11-30 19:30:48',
            ),
            52 => 
            array (
                'id' => 53,
                'name' => 'force_delete_perumahan',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:30:48',
                'updated_at' => '2024-11-30 19:30:48',
            ),
            53 => 
            array (
                'id' => 54,
                'name' => 'force_delete_any_perumahan',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:30:48',
                'updated_at' => '2024-11-30 19:30:48',
            ),
            54 => 
            array (
                'id' => 55,
                'name' => 'view_transaksi::iuran',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:30:48',
                'updated_at' => '2024-11-30 19:30:48',
            ),
            55 => 
            array (
                'id' => 56,
                'name' => 'view_any_transaksi::iuran',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:30:48',
                'updated_at' => '2024-11-30 19:30:48',
            ),
            56 => 
            array (
                'id' => 57,
                'name' => 'create_transaksi::iuran',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:30:48',
                'updated_at' => '2024-11-30 19:30:48',
            ),
            57 => 
            array (
                'id' => 58,
                'name' => 'update_transaksi::iuran',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:30:48',
                'updated_at' => '2024-11-30 19:30:48',
            ),
            58 => 
            array (
                'id' => 59,
                'name' => 'restore_transaksi::iuran',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:30:48',
                'updated_at' => '2024-11-30 19:30:48',
            ),
            59 => 
            array (
                'id' => 60,
                'name' => 'restore_any_transaksi::iuran',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:30:48',
                'updated_at' => '2024-11-30 19:30:48',
            ),
            60 => 
            array (
                'id' => 61,
                'name' => 'replicate_transaksi::iuran',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:30:48',
                'updated_at' => '2024-11-30 19:30:48',
            ),
            61 => 
            array (
                'id' => 62,
                'name' => 'reorder_transaksi::iuran',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:30:48',
                'updated_at' => '2024-11-30 19:30:48',
            ),
            62 => 
            array (
                'id' => 63,
                'name' => 'delete_transaksi::iuran',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:30:48',
                'updated_at' => '2024-11-30 19:30:48',
            ),
            63 => 
            array (
                'id' => 64,
                'name' => 'delete_any_transaksi::iuran',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:30:48',
                'updated_at' => '2024-11-30 19:30:48',
            ),
            64 => 
            array (
                'id' => 65,
                'name' => 'force_delete_transaksi::iuran',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:30:48',
                'updated_at' => '2024-11-30 19:30:48',
            ),
            65 => 
            array (
                'id' => 66,
                'name' => 'force_delete_any_transaksi::iuran',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:30:48',
                'updated_at' => '2024-11-30 19:30:48',
            ),
            66 => 
            array (
                'id' => 67,
                'name' => 'view_warga',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:32:49',
                'updated_at' => '2024-11-30 19:32:49',
            ),
            67 => 
            array (
                'id' => 68,
                'name' => 'view_any_warga',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:32:49',
                'updated_at' => '2024-11-30 19:32:49',
            ),
            68 => 
            array (
                'id' => 69,
                'name' => 'create_warga',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:32:49',
                'updated_at' => '2024-11-30 19:32:49',
            ),
            69 => 
            array (
                'id' => 70,
                'name' => 'update_warga',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:32:49',
                'updated_at' => '2024-11-30 19:32:49',
            ),
            70 => 
            array (
                'id' => 71,
                'name' => 'restore_warga',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:32:49',
                'updated_at' => '2024-11-30 19:32:49',
            ),
            71 => 
            array (
                'id' => 72,
                'name' => 'restore_any_warga',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:32:49',
                'updated_at' => '2024-11-30 19:32:49',
            ),
            72 => 
            array (
                'id' => 73,
                'name' => 'replicate_warga',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:32:49',
                'updated_at' => '2024-11-30 19:32:49',
            ),
            73 => 
            array (
                'id' => 74,
                'name' => 'reorder_warga',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:32:49',
                'updated_at' => '2024-11-30 19:32:49',
            ),
            74 => 
            array (
                'id' => 75,
                'name' => 'delete_warga',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:32:49',
                'updated_at' => '2024-11-30 19:32:49',
            ),
            75 => 
            array (
                'id' => 76,
                'name' => 'delete_any_warga',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:32:49',
                'updated_at' => '2024-11-30 19:32:49',
            ),
            76 => 
            array (
                'id' => 77,
                'name' => 'force_delete_warga',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:32:49',
                'updated_at' => '2024-11-30 19:32:49',
            ),
            77 => 
            array (
                'id' => 78,
                'name' => 'force_delete_any_warga',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 19:32:49',
                'updated_at' => '2024-11-30 19:32:49',
            ),
            78 => 
            array (
                'id' => 79,
                'name' => 'view_gang',
                'guard_name' => 'web',
                'created_at' => '2025-01-11 20:55:29',
                'updated_at' => '2025-01-11 20:55:29',
            ),
            79 => 
            array (
                'id' => 80,
                'name' => 'view_any_gang',
                'guard_name' => 'web',
                'created_at' => '2025-01-11 20:55:29',
                'updated_at' => '2025-01-11 20:55:29',
            ),
            80 => 
            array (
                'id' => 81,
                'name' => 'create_gang',
                'guard_name' => 'web',
                'created_at' => '2025-01-11 20:55:29',
                'updated_at' => '2025-01-11 20:55:29',
            ),
            81 => 
            array (
                'id' => 82,
                'name' => 'update_gang',
                'guard_name' => 'web',
                'created_at' => '2025-01-11 20:55:29',
                'updated_at' => '2025-01-11 20:55:29',
            ),
            82 => 
            array (
                'id' => 83,
                'name' => 'restore_gang',
                'guard_name' => 'web',
                'created_at' => '2025-01-11 20:55:29',
                'updated_at' => '2025-01-11 20:55:29',
            ),
            83 => 
            array (
                'id' => 84,
                'name' => 'restore_any_gang',
                'guard_name' => 'web',
                'created_at' => '2025-01-11 20:55:29',
                'updated_at' => '2025-01-11 20:55:29',
            ),
            84 => 
            array (
                'id' => 85,
                'name' => 'replicate_gang',
                'guard_name' => 'web',
                'created_at' => '2025-01-11 20:55:29',
                'updated_at' => '2025-01-11 20:55:29',
            ),
            85 => 
            array (
                'id' => 86,
                'name' => 'reorder_gang',
                'guard_name' => 'web',
                'created_at' => '2025-01-11 20:55:29',
                'updated_at' => '2025-01-11 20:55:29',
            ),
            86 => 
            array (
                'id' => 87,
                'name' => 'delete_gang',
                'guard_name' => 'web',
                'created_at' => '2025-01-11 20:55:29',
                'updated_at' => '2025-01-11 20:55:29',
            ),
            87 => 
            array (
                'id' => 88,
                'name' => 'delete_any_gang',
                'guard_name' => 'web',
                'created_at' => '2025-01-11 20:55:29',
                'updated_at' => '2025-01-11 20:55:29',
            ),
            88 => 
            array (
                'id' => 89,
                'name' => 'force_delete_gang',
                'guard_name' => 'web',
                'created_at' => '2025-01-11 20:55:29',
                'updated_at' => '2025-01-11 20:55:29',
            ),
            89 => 
            array (
                'id' => 90,
                'name' => 'force_delete_any_gang',
                'guard_name' => 'web',
                'created_at' => '2025-01-11 20:55:29',
                'updated_at' => '2025-01-11 20:55:29',
            ),
            90 => 
            array (
                'id' => 91,
                'name' => 'generate_transaksi::iuran',
                'guard_name' => 'web',
                'created_at' => '2025-03-17 06:16:21',
                'updated_at' => '2025-03-17 06:16:21',
            ),
        ));
        
        
    }
}