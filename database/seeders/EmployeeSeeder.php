<?php


use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        factory(Employee::class, 10)->create();
    }
}
