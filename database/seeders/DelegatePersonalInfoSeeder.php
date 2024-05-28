<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DelegatePersonalInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('delegate_personal_info')->insert([
            [
                // 'exhibitor_id' => 'gVF3dpYtOB',
                'delegate_id' => 'ZdTmmKi4UHsvmI9TraemZOYiKIT3Un',
                'tin_no' => '1234567890',
                'del_title' => 'Mr.',
                'del_fname' => 'John',
                'del_lname' => 'Doe',
                'del_email' => 'john.doe@example.com',
                'del_designation' => 'Manager',
                'del_contact' => '9876543210',
                'del_type' => 'Gold',
                'del_govtid_type' => 'Passport',
                'del_govtid_no' => 'A12345678',
                'del_org_category' => 'Delegate',
            ],
            // Add more records as needed...
        ]);
    }
}
