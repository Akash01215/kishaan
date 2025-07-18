<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        // Only authenticated users can access
        $this->middleware('auth');
    }

    public function index()
    {
       
        return view('backend.dashboard'); // Your admin dashboard view
    }
}
