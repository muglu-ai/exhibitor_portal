<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class exhibitor_stall_manning extends Model
{
    protected $table = 'exhibitor_stall_manning';

    public $fillable = [
        'exhibitor_id',
        'org_name',
        'sm_title',
        'sm_fname',
        'sm_lname',
        'sm_email',
        'sm_designation',
        'sm_mobile',
        'sm_govt_id_type',
        'sm_govt_id_number',

    ];
    public function exhibitor()
    {
        return $this->belongsTo(exhibitor_reg_details::class, 'exhibitor_id', 'exhibitor_id');
    }
}
