<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardCon extends Controller
{
    public function index(){
        return view('dashboard');
    }
}
