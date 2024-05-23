<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Country::create(['name' => 'Denmark', 'code' => 'dk']);
        Country::create(['name' => 'Liechtenstein', 'code' => 'li']);
        Country::create(['name' => 'Hungary', 'code' => 'hu']);
    }
}
