<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        $userActivities = [
            [
                'id' => 1,
                'name' => 'Raj Kumar',
                'activity' => 'Disease Report Submission',
                'status' => 'Completed',
                'status_color' => 'success',
                'color' => 'primary',
                'date' => '2024-01-15',
            ],
            [
                'id' => 2,
                'name' => 'Amit Singh',
                'activity' => 'Fertilizer Usage Update',
                'status' => 'Pending',
                'status_color' => 'warning',
                'color' => 'success',
                'date' => '2024-01-14',
            ],
            [
                'id' => 3,
                'name' => 'Priya Gupta',
                'activity' => 'System Query',
                'status' => 'In Progress',
                'status_color' => 'info',
                'color' => 'info',
                'date' => '2024-01-13',
            ],
        ];

        return view('backend.activities.index', compact('userActivities'));
    }
}
