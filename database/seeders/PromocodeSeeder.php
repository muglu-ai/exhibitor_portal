<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\promocode_table;

class PromocodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed data for promocode_table
        promocode_table::create([
            'promocode_organization' => 'Organization 1',
            'promo_code' => 'CODE123',
            'discount' => '10%',
            'total_count' => 100,
            'total_used' => 0,
            'remaining' => 100,
        ]);
    }
}
