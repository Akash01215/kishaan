<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Activity;
use App\UserActivity;

class DashboardController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Fetch user activities for logged in user
        $userActivities = UserActivity::where('user_id', Auth::id())
                            ->latest()
                            ->paginate(5);

        $totalActivities = UserActivity::where('user_id', Auth::id())->count();

        // Pass data to view
        return view('backend.dashboard', compact('userActivities', 'totalActivities'));

        // Optional: record this visit as activity
        UserActivity::create([
            'user_id' => Auth::id(),
            'activity' => 'Visited Dashboard',
            'ip_address' => request()->ip(),
        ]);
    }

}
