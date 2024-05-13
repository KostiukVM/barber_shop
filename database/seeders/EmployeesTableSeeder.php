<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeesTableSeeder extends Seeder
{
    public function run(): void
    {
        // Заповнення таблиці згенерованими даними
        for ($i = 0; $i < 100; $i++) {
            DB::table('employees')->insert([
                'name' => 'Employee ' . ($i + 1),
                'position' => rand(1, 3),
                'working_schedule' => rand(1, 3),
                ]);
        }
    }
}
