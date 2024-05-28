<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class delegate_registration extends Model
{
    use HasFactory;

    protected $table = 'delegate_org_details';

    protected $fillable = [
        'exhibitor_id',
        'delegate_id',
        'sector',
        'org_type',
        'delegates_count',
        'nationality',
        'student',
        'studentid',
        'organization_name',
        'address1',
        'address2',
        'city',
        'state',
        'country',
        'zip_code',
        'cp_title',
        'cp_fname',
        'cp_lname',
        'cp_email',
        'cp_contact',
        'gst_details',
        'gst_number',
        'gst_invoice_add',
        'pan_number',
        'reg_id',
        'user_type',
        'reg_date',
        'tin_no',
        'currency',
        'amt_ext',
        'paymode',
        'pay_status',
        'payment_date',
        'pin_no',
        'selection_amount',
        'promo_code',
        'discount',
        'tax_amount',
        'processing_charge',
        'total_amount',
        'total_amt_received',
        'pg_errorText',
        'pg_paymentId',
        'pg_trackId',
        'pg_result',
        'pg_tranid',
        'pg_auth',
        'pg_avr',
        'pg_ref',
        'pg_amt',
        'gst_state',
        'group_type',
        'user_type',
        'assoc_name',
        'event_name',
        'event_year',
        'delegate_under',
        'token',
    ];

}
