<?php


use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    public function run()
    {
        factory(Order::class, 3)->create();
    }
}
