<?php

namespace App\Http\Controllers;

use App\Models\exhibitor_reg_details;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Fetch the currently authenticated user

        return view('dashboard', ['user' => $user]);
    }

}
