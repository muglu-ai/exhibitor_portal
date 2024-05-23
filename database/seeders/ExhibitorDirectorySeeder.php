<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExhibitorDirectorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(){
        // Generate dummy data and insert into exhibitor_directory_table
        DB::table('exhibitor_directory_table')->insert([
            [
                'exhibitor_id' => 'EXH1234',
                'org_name' => 'ABC Corporation',
                'fascia_name' => 'Example Fascia 1',
                'org_logo' => 'example_logo_1.png',
                'org_profile' => 'example_profile_1.pdf',
            ],
            // Add more dummy data as needed
        ]);
    }
}
