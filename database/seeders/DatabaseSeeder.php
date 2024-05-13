<?php

namespace Database\Seeders;

use App\Models\Emploee;
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

        Emploee::factory()->create([
            'name' => fake()->name(),
            'position' => rand(1, 3),
            'working_schedule' => rand(1, 3)
        ]);
    }
}
