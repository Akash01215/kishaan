<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Only authenticated users allowed
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Redirect to index page with user role and name
     */
    public function index()
    {
        $user = Auth::user();

        // Redirect to index page with user data
        return view('home', [
            'name' => $user->name,
            'role' => $user->role,
        ])->with('message', 'Welcome to the application! Your role is: ' . $user->role);
    }

    /**
     * Show the application dashboard.
     */
    public function dashboard()
    {
        $user = Auth::admin();

        // Show the dashboard view with user data
        return view('backend.dashboard', [
            'name' => $user->name,
            'role' => $user->role,
        ]);
    }
}
