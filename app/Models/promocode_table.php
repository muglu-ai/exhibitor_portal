<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class promocode_table extends Model
{
    use HasFactory;
    protected $table = 'promocode_table';
    protected $fillable = [
        'promocode_organization',
        'promo_code',
        'exhibitor_count',
        'delegate_count',
        'discount',
        'total_count',
        'total_used',
        'remaining',
    ];
}
