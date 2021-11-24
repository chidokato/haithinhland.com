<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\order;

class dashboardcontroller extends Controller
{
	public function dashboard()
    {
    	return view('admin.dashboard');
    }
}

