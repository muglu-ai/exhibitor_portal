<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exhibitors extends Model
{
    protected $fillable = [
        'exhibitor_id', 'exhibitor_name', 'fas_name', 'cp_title', 'first_name', 
        'last_name', 'cp_design', 'org_add', 'city', 'state', 
        'country', 'zip', 'email', 'con_number', 'profile'
      ];
}
