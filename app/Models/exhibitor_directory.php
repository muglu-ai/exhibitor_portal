<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class exhibitor_directory extends Model
{
    use HasFactory;
    protected $table = 'exhibitor_directory_table';

    protected $fillable = [
        'exhibitor_id',
        'org_name',
        'fascia_name',
        'org_logo',
        'org_profile',
        'update_status',

    ];

    public function exhibitorReg()
    {
        return $this->belongsTo(exhibitor_reg_table::class, 'exhibitor_id', 'exhibitor_id');
    }
}
