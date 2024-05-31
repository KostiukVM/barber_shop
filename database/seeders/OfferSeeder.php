<?php


use Illuminate\Database\Seeder;
use App\Models\Offer;

class OfferSeeder extends Seeder
{
    public function run()
    {
        factory(Offer::class, 10)->create();
    }
}
