<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exhibitor extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'delegate_org_details';
    protected $fillable = [
        'exhibitor_id',
        'exhibitor_name',
        'cp_title',
        'cp_fname',
        'cp_lname',
        'cp_desig',
        'cntry_code_mobile',
        'mob',
        'email',
        'website',
        'address_line_1',
        'address_line_2',
        'city',
        'state',
        'country',
        'zip',
        'profile',
        'reg_date',
        'reg_time',
        'reg_id',
        'booth_no',
        'booth_area',
        'fascia_name',
        'hall_no',
        'total_exhibitors',
        'category',
        'booth_space',
        'exhi_profile',
        'keywords',
        'logo',
        'assoc_nm',
        'reg_complete',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'reg_complete' => 'boolean',
    ];
}
