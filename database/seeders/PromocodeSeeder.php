<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PromocodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('promocode_details')->insert([
            [
                'promocode_organization' => 'Org1',
                'promo_code' => Str::random(10),
                'exhibitor_count' => '5',
                'delegate_count' => '10',
                'discount' => '15%',
                'total_count' => '15',
                'total_used' => '0',
                'remaining' => '15',
            ],
            [
                'promocode_organization' => 'Org2',
                'promo_code' => Str::random(10),
                'exhibitor_count' => '3',
                'delegate_count' => '8',
                'discount' => '10%',
                'total_count' => '11',
                'total_used' => '2',
                'remaining' => '9',
            ],
            // Add more sample records as needed
        ]);
    }
}
