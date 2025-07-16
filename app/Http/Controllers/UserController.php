<?php

namespace App\Http\Controllers;

use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); // lowercase variable
        return view('backend.sidebar.table', compact('users'));
    }
}
