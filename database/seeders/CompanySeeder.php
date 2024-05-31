<?php


use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    public function run()
    {
        factory(Company::class, 1)->create();
    }
}
