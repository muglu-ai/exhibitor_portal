<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_login_table extends Model implements AuthenticatableContract
{
//    use HasFactory;
    use Authenticatable;

    protected $table = 'user_login_table'; // Explicitly specify the table name

    protected $fillable = ['exhibitor_id', 'email', 'password'];

    public function exhibitor()
    {
        return $this->belongsTo(exhibitor_reg_table::class, 'exhibitor_id', 'exhibitor_id');
    }
}
