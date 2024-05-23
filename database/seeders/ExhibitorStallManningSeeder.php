<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExhibitorStallManningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Example seed data
        DB::table('exhibitor_stall_manning')->insert([
            'exhibitor_id' => 'EXH1234',
            'org_name' => 'ABC Corporation',
            'sm1_name' => 'Stall Manning 1',
            'sm1_email' => 'sm1@example.com',
            'sm1_designation' => 'Dev',
            'sm1_mobile' => '1234567890',
            'sm2_name' => 'Stall Manning 2',
            'sm2_email' => 'sm2@example.com',
            'sm2_designation' => 'Dev',
            'sm2_mobile' => '1234567890',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            // Add more data as needed
        ]);
    }
}
