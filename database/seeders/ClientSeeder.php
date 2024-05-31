<?php


use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    public function run()
    {
        factory(Client::class, 10)->create();
    }
}
