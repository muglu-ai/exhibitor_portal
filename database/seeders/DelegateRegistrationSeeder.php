<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\delegate_registration;

class DelegateRegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
        // Generate and insert dummy data for delegates
        delegate_registration::create([
            'exhibitor_id' => 'EXH1234',
            'sector' => 'Technology',
            'org_type' => 'Company',
            'delegates_count' => 5,
            'nationality' => 'Indian',
            'student' => 'No',
            'organization_name' => 'ABC Company',
            'address1' => '123 Main Street',
            'city' => 'City',
            'state' => 'State',
            'country' => 'Country',
            'zip_code' => '12345',
            'gst_details' => 'Yes',
            'gst_number' => 'GST123',
            'gst_invoice_add' => 'GST Address',
            'pan_number' => 'PAN123',
            'del1_name' => 'John Doe',
            'del1_email' => 'john@example.com',
            'del1_designation' => 'Manager',
            'del1_contact' => '1234567890',
            'del1_type' => 'Primary',
            'reg_id' => 'REG123',
            'user_type' => 'Delegate',
            'reg_date' => now(),
            'tin_no' => 'TIN123',
            'currency' => 'USD',
            'amt_ext' => '500',
            'paymode' => 'Card',
            'pay_status' => 'Paid',
            'payment_date' => now(),
            'pin_no' => 'PIN123',
            'selection_amount' => '250',
            'promo_code' => 'PROMO123',
            'discount' => '50',
            'tax_amount' => '25',
            'processing_charge' => '10',
            'total_amount' => '275',
            'total_amt_received' => '275',
            'pg_errorText' => 'Error',
            'pg_paymentId' => 'PAY123',
            'pg_trackId' => 'TRACK123',
            'pg_result' => 'Success',
            'pg_tranid' => 'TRAN123',
            'pg_auth' => 'AUTH123',
            'pg_avr' => 'AVR123',
            'pg_ref' => 'REF123',
            'pg_amt' => '275',
        ]);
    }
}
