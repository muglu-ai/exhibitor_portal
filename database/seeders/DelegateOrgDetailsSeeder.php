<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DelegateOrgDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('delegate_org_details')->insert([
            [
                // 'exhibitor_id' => 'gVF3dpYtOB',
                'delegate_id' => Str::random(30),
                'sector' => 'Technology',
                'org_type' => 'Private',
                'delegates_count' => '10',
                'nationality' => 'Indian',
                'student' => 'No',
                'studentid' => null,
                'organization_name' => 'Tech Innovators Pvt Ltd',
                'address1' => '123 Tech Street',
                'address2' => 'Suite 4',
                'city' => 'Bangalore',
                'state' => 'Karnataka',
                'country' => 'India',
                'zip_code' => '560001',
                'cp_title' => 'Mr.',
                'cp_fname' => 'Raj',
                'cp_lname' => 'Kumar',
                'cp_email' => 'raj.kumar@techinnovators.com',
                'cp_contact' => '9876543210',
                'gst_details' => 'Yes',
                'gst_number' => '29ABCDE1234F1Z5',
                'gst_invoice_add' => '123 Tech Street, Bangalore, Karnataka, 560001',
                'pan_number' => 'ABCDE1234F',
                'gst_state' => 'Karnataka',
                'group_type' => 'Corporate',
                'reg_id' => 'REG2024',
                'user_type' => 'Delegate',
                'reg_date' => '2024-05-27',
                'tin_no' => '1234567890',
                'currency' => 'INR',
                'amt_ext' => '5000',
                'paymode' => 'Online',
                'pay_status' => 'Paid',
                'payment_date' => '2024-05-20',
                'pin_no' => '123456',
                'selection_amount' => '5000',
                'promo_code' => 'PROMO2024',
                'discount' => '500',
                'tax_amount' => '450',
                'processing_charge' => '50',
                'total_amount' => '5000',
                'total_amt_received' => '4500',
                'pg_errorText' => null,
                'pg_paymentId' => 'PAY123456',
                'pg_trackId' => 'TRACK123456',
                'pg_result' => 'Success',
                'pg_tranid' => 'TRAN123456',
                'pg_auth' => 'AUTH123456',
                'pg_avr' => 'AVR123456',
                'pg_ref' => 'REF123456',
                'pg_amt' => '5000',
                'assoc_name' => 'Tech Association',
                'event_name' => 'Tech Expo 2024',
                'event_year' => '2024',
                // 'delegate_under' => 'CORP123',
                'created_At' => now(),
                'updated_At' => now(),
                'token' => Str::random(100),
            ],
            // Add more records as needed...
        ]);
    }
}
