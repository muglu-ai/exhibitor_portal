<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\exhibitor_reg_table;
class ExhibitorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $exhibitors = [
            [
                'exhibitor_id' => 'EXH1234',
                'org_name' => 'ABC Corporation',
                'org_type' => 'Technology',
                'org_reg_certificate' => 'Certificate of Registration',
                'booth_size' => '10x10',
                'booth_area' => '100 sqft',
                'booth_space' => 'Open',
                'address1' => '123 Main Street',
                'address2' => 'Suite 200',
                'city' => 'New York',
                'state' => 'NY',
                'country' => 'USA',
                'zip_code' => '10001',
                'cp_name' => 'John Doe',
                'cp_email' => 'john.doe@example.com',
                'cp_designation' => 'CEO',
                'cp_mobile' => '123-456-7890',
                'website' => 'https://www.example.com',
                'gst_details' => 'GSTIN: 1234567890',
                'gst_number' => 'GST123456',
                'gst_invoice_add' => '456 Business Avenue',
                'pan_number' => 'ABCDE1234F',
                'sales_executive' => 'Jane Smith',
                'reg_id' => 'REG987',
                'user_type' => 'Premium',
                'exhibiting_under' => 'Promo Company A',
                'reg_date' => '2024-05-14',
                'tin_no' => 'TIN98765',
                'currency' => 'USD',
                'amt_ext' => '1000',
                'paymode' => 'Credit Card',
                'pay_status' => 'Paid',
                'payment_date' => '2024-05-14',
                'pin_no' => 'PIN123',
                'selection_amount' => '800',
                'promo_code' => 'PROMO123',
                'discount' => '200',
                'tax_amount' => '50',
                'processing_charge' => '20',
                'total_amount' => '850',
                'total_amt_received' => '850',
                'delegate_type' => 'VIP',
                'pg_errorText' => null,
                'pg_paymentId' => null,
                'pg_trackId' => null,
                'pg_result' => null,
                'pg_tranid' => null,
                'pg_auth' => null,
                'pg_avr' => null,
                'pg_ref' => null,
                'pg_amt' => null,
            ],
            // Add more exhibitor data as needed
        ];

        // Loop through the data and insert into the database
        foreach ($exhibitors as $exhibitor) {
            exhibitor_reg_table::create($exhibitor);
        }
    }
}
