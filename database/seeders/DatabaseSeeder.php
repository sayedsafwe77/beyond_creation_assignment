<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(ShowTimeSeeder::class);

        $user = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
        ]);
        $user->assignRole('super-admin');
    }
}
