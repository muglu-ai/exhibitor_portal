<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ExhibitorStallManningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('exhibitor_stall_manning')->insert([
            [
                'exhibitor_id' => 'gVF3dpYtOB',
                'org_name' => 'Example Org 1',
                'sm_title' => 'Mr.',
                'sm_fname' => 'John',
                'sm_lname' => 'Doe',
                'sm_email' => 'john.doe@example.com',
                'sm_designation' => 'Manager',
                'sm_mobile' => '1234567890',
                'sm_govt_id_type' => 'Passport',
                'sm_govt_id_number' => 'A1234567',
                'created_At' => now(),
                'updated_At' => now(),
            ],
        ]);
    }
}
