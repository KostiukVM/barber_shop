<?php


use Illuminate\Database\Seeder;
use App\Models\Working_schedule;

class WorkingScheduleSeeder extends Seeder
{
    public function run()
    {
        factory(Working_schedule::class, 10)->create();
    }
}
