<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_login_details extends Model implements AuthenticatableContract
{
//    use HasFactory;
    use Authenticatable;

    protected $table = 'user_login_details'; // Explicitly specify the table name

    protected $fillable = ['exhibitor_id', 'email', 'password','password_actual','captcha','status','created_At','updated_At'];

    public function exhibitor()
    {
        return $this->belongsTo(exhibitor_reg_details::class, 'exhibitor_id', 'exhibitor_id');
    }
}
