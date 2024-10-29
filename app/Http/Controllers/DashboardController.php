<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; // Make sure this is included

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }
}
