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
        'sm1_name',
        'sm1_email',
        'sm1_designation',
        'sm1_mobile',
        'sm1_govt_id_type',
        'sm1_govt_id_number',
        'sm2_name',
        'sm2_email',
        'sm2_designation',
        'sm2_mobile',
        'sm2_govt_id_type',
        'sm2_govt_id_number',
        'sm3_name',
        'sm3_email',
        'sm3_designation',
        'sm3_mobile',
        'sm3_govt_id_type',
        'sm3_govt_id_number',
        'sm4_name',
        'sm4_email',
        'sm4_designation',
        'sm4_mobile',
        'sm4_govt_id_type',
        'sm4_govt_id_number',
        'sm5_name',
        'sm5_email',
        'sm5_designation',
        'sm5_mobile',
        'sm5_govt_id_type',
        'sm5_govt_id_number',

    ];
    public function exhibitor()
    {
        return $this->belongsTo(exhibitor_reg_table::class, 'exhibitor_id', 'exhibitor_id');
    }
}
