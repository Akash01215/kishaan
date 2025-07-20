<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Activity;
use App\UserActivity;
use App\FertilizerSuggestion;
use App\DiseaseReport;
use App\User;

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
        $totalUsers = User::count(); // dynamic user count
          $totalReports = DiseaseReport::count();
          $totalSuggestions = FertilizerSuggestion::count();
        

        // Optional: Log activity
        UserActivity::create([
            'user_id' => Auth::id(),
            'activity' => 'Visited Dashboard',
            'ip_address' => request()->ip(),
        ]);

        // Pass all dynamic data to view
        return view('backend.dashboard', compact('userActivities', 'totalActivities', 'totalUsers', 'totalReports', 'totalSuggestions'));
    }
}
    