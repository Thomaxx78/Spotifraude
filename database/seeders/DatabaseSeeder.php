<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Track;
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

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Track::factory(10)->create();

        User::create(['name' => 'Admin', 'email' => 'admin@example.com', 'password' => bcrypt('password'), 'admin' => 1]);
    }
}
