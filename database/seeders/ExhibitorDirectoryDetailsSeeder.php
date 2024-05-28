<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExhibitorDirectoryDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('exhibitor_directory_details')->insert([
            [
                'exhibitor_id' => 'gVF3dpYtOB',
                'org_name' => 'Example Org 1',
                'fascia_name' => 'Example Fascia 1',
                'org_logo' => 'logo1.png',
                'org_profile' => 'Profile of Example Organization 1',
                'update_status' => '1',
                'created_At' => now(),
                'updated_At' => now(),
            ],
        ]);
    }
}
