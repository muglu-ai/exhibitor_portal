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
                'sm1_title' => 'Mr.',
                'sm1_fname' => 'John',
                'sm1_lname' => 'Doe',
                'sm1_email' => 'john.doe@example.com',
                'sm1_designation' => 'Manager',
                'sm1_mobile' => '1234567890',
                'sm1_govt_id_type' => 'Passport',
                'sm1_govt_id_number' => 'A1234567',

                'sm2_title' => 'Ms.',
                'sm2_fname' => 'Jane',
                'sm2_lname' => 'Doe',
                'sm2_email' => 'jane.doe@example.com',
                'sm2_designation' => 'Assistant Manager',
                'sm2_mobile' => '0987654321',
                'sm2_govt_id_type' => 'Driving License',
                'sm2_govt_id_number' => 'DL1234567',

                'sm3_title' => 'Dr.',
                'sm3_fname' => 'Sam',
                'sm3_lname' => 'Smith',
                'sm3_email' => 'sam.smith@example.com',
                'sm3_designation' => 'Engineer',
                'sm3_mobile' => '1122334455',
                'sm3_govt_id_type' => 'Passport',
                'sm3_govt_id_number' => 'B1234567',

                'sm4_title' => 'Mrs.',
                'sm4_fname' => 'Sara',
                'sm4_lname' => 'Johnson',
                'sm4_email' => 'sara.johnson@example.com',
                'sm4_designation' => 'Technician',
                'sm4_mobile' => '6677889900',
                'sm4_govt_id_type' => 'National ID',
                'sm4_govt_id_number' => 'NID1234567',

                'sm5_title' => 'Prof.',
                'sm5_fname' => 'Michael',
                'sm5_lname' => 'Brown',
                'sm5_email' => 'michael.brown@example.com',
                'sm5_designation' => 'Consultant',
                'sm5_mobile' => '2233445566',
                'sm5_govt_id_type' => 'Passport',
                'sm5_govt_id_number' => 'C1234567',

                'created_At' => now(),
                'updated_At' => now(),
            ],
        ]);
    }
}
