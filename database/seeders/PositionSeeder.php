<?php


use Illuminate\Database\Seeder;
use App\Models\Position;

class PositionSeeder extends Seeder
{
    public function run()
    {
        factory(Position::class, 4)->create();
    }
}
