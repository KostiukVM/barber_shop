<?php

use Illuminate\Database\Seeder;
use App\Models\Position;
use App\Models\Offer;
use App\Models\Company;
use App\Models\Order;
use App\Models\Employee;
use App\Models\Client;
use App\Models\Working_schedule;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            PositionSeeder::class,
            OfferSeeder::class,
            CompanySeeder::class,
            OrderSeeder::class,
            EmployeeSeeder::class,
            ClientSeeder::class,
            WorkingScheduleSeeder::class,
        ]);
    }
}
