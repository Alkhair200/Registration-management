<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAuth extends Controller
{
    public function login()
    {
        return view('dashboard.welcome');
    }// end of login
}// end of class
