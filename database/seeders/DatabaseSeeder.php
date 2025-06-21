<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RoleHasPermissionsTableSeeder::class);
        $this->call(PerumahansTableSeeder::class);
        $this->call(GangsTableSeeder::class);
        $this->call(BloksTableSeeder::class);
        $this->call(BlokDetailsTableSeeder::class);
        $this->call(IuransTableSeeder::class);
        $this->call(WargasTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ModelHasRolesTableSeeder::class);
        $this->call(TransaksiIuransTableSeeder::class);
        $this->call(TransaksiIuranDetailsTableSeeder::class);
    }
}
