<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ExhibitorRegDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('exhibitor_reg_details')->insert([
            [
                'exhibitor_id' => Str::random(10),
                'org_name' => 'Example Org 1',
                'org_type' => 'Type 1',
                'sector' => 'Sector 1',
                'org_reg_certificate' => 'Certificate 1',
                'booth_size' => '10x10',
                'booth_area' => '100',
                'booth_space' => 'Space 1',
                'address1' => '123 Main St',
                'address2' => 'Suite 100',
                'city' => 'City 1',
                'state' => 'State 1',
                'country' => 'Country 1',
                'zip_code' => '12345',
                'cp_title' => 'Mr.',
                'cp_fname' => 'John',
                'cp_lname' => 'Doe',
                'cp_email' => 'john.doe@example.com',
                'cp_designation' => 'Manager',
                'cp_mobile' => '1234567890',
                'website' => 'https://example.com',
                'gst_details' => 'GST Details 1',
                'gst_number' => 'GST123456',
                'gst_invoice_add' => 'Invoice Address 1',
                'pan_number' => 'PAN123456',
                'gst_state' => 'GST State 1',
                'sales_executive' => 'Sales Exec 1',
                'reg_id' => 'REG123456',
                'user_type' => 'User Type 1',
                'exhibiting_under' => 'Org1',
                'reg_date' => '2024-05-01',
                'tin_no' => 'TIN123456',
                'currency' => 'USD',
                'amt_ext' => '1000',
                'paymode' => 'Credit Card',
                'pay_status' => 'Paid',
                'payment_date' => '2024-05-02',
                'pin_no' => 'PIN123456',
                'selection_amount' => '500',
                'promo_code' => 'PROMO1',
                'discount' => '10%',
                'tax_amount' => '100',
                'processing_charge' => '50',
                'total_amount' => '1150',
                'total_amt_received' => '1150',
                'delegate_type' => 'Type 1',
                'pg_errorText' => 'None',
                'pg_paymentId' => 'PAY123456',
                'pg_trackId' => 'TRACK123456',
                'pg_result' => 'Success',
                'pg_tranid' => 'TRAN123456',
                'pg_auth' => 'AUTH123456',
                'pg_avr' => 'AVR123456',
                'pg_ref' => 'REF123456',
                'pg_amt' => '1150',
                'event_name' => 'Event 1',
                'event_year' => '2024',
                'sm_count' => '5',
                'delegate_alloted' => '10',
                'service_req' => 'Service 1',
                'can_invite' => 'Yes',
            ],
            // Add more records as needed...
        ]);
    }
}
