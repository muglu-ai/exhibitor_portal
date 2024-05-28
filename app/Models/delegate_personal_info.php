<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class delegate_personal_info extends Model
{
    use HasFactory;
    protected $table = 'delegate_personal_info';

    protected $fillable = [
        'exhibitor_id',
        'delegate_id',
        'tin_no',
        'del_title',
        'del_fname',
        'del_mname',
        'del_lname',
        'del_email',
        'del_designation',
        'del_contact',
        'del_govt_id_type',
        'del_govt_id_number',
        'del_category',
    ];
}
