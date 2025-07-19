@extends('backend.layouts.master')

@section('title', 'Dashboard - Krishi Shathi Admin')
@section('page-title', 'Dashboard Overview')

@section('content')
<!-- Welcome Section -->
<div class="row mb-4">
    <div class="col-12">
        <div class="dashboard-card">
            <div class="card-header-custom">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h3 class="mb-1">
                            <i class="fas fa-leaf me-2"></i>
                            Welcome to Krishi Shathi Dashboard
                        </h3>
                        <p class="mb-0 opacity-75">
                            Monitor agricultural activities, disease reports, fertilizer usage, and system analytics
                        </p>
                    </div>
                    <div class="col-md-4 text-end">
                        <div class="text-white">
                            <i class="fas fa-calendar-alt me-2"></i>
                            {{ now()->format('l, F j, Y') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Statistics Cards -->
<div class="row mb-4">
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="stats-card h-100">
            <div class="card-body text-center">
                <div class="stats-icon users mx-auto">
                    <i class="fas fa-users"></i>
                </div>
                <h2 class="fw-bold text-primary mb-1">{{ $totalUsers ?? '5,247' }}</h2>
                <p class="text-muted mb-2">Total Users</p>
                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-success">
                        <i class="fas fa-arrow-up me-1"></i>
                        +12.5%
                    </small>
                    <a href="" class="btn btn-sm btn-outline-primary btn-custom">
                        <i class="fas fa-eye me-1"></i>
                        View
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-4">
        <div class="stats-card h-100">
            <div class="card-body text-center">
                <div class="stats-icon reports mx-auto">
                    <i class="fas fa-file-medical-alt"></i>
                </div>
                <h2 class="fw-bold text-success mb-1">{{ $totalReports ?? '1,423' }}</h2>
                <p class="text-muted mb-2">Disease Reports</p>
                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-warning">
                        <i class="fas fa-arrow-up me-1"></i>
                        +3.2%
                    </small>
                    <a href="" class="btn btn-sm btn-outline-success btn-custom">
                        <i class="fas fa-eye me-1"></i>
                        View
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-4">
        <div class="stats-card h-100">
            <div class="card-body text-center">
                <div class="stats-icon fertilizer mx-auto">
                    <i class="fas fa-seedling"></i>
                </div>
                <h2 class="fw-bold text-warning mb-1">{{ $fertilizerUsage ?? '8,756' }}</h2>
                <p class="text-muted mb-2">Fertilizer Usage</p>
                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-success">
                        <i class="fas fa-arrow-up me-1"></i>
                        +8.1%
                    </small>
                    <a href="" class="btn btn-sm btn-outline-warning btn-custom">
                        <i class="fas fa-eye me-1"></i>
                        View
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-4">
        <div class="stats-card h-100">
            <div class="card-body text-center">
                <div class="stats-icon queries mx-auto">
                    <i class="fas fa-question-circle"></i>
                </div>
                <h2 class="fw-bold text-info mb-1">{{ $systemQueries ?? '2,891' }}</h2>
                <p class="text-muted mb-2">System Queries</p>
                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-success">
                        <i class="fas fa-arrow-up me-1"></i>
                        +5.7%
                    </small>
                    <a href="" class="btn btn-sm btn-outline-info btn-custom">
                        <i class="fas fa-eye me-1"></i>
                        View
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Charts and Analytics -->
<div class="row mb-4">
    <div class="col-lg-8 mb-4">
        <div class="chart-container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="fw-bold mb-0">
                    <i class="fas fa-chart-line text-success me-2"></i>
                    Monthly Analytics Overview
                </h5>
                <div class="btn-group" role="group">
                    <button class="btn btn-sm btn-outline-success active">Month</button>
                    <button class="btn btn-sm btn-outline-success">Quarter</button>
                    <button class="btn btn-sm btn-outline-success">Year</button>
                </div>
            </div>
            <div class="bg-light rounded p-5 text-center" style="height: 300px;">
                <i class="fas fa-chart-bar fa-3x text-success mb-3"></i>
                <h6 class="text-muted">Analytics Chart</h6>
                <p class="text-muted small">Interactive charts will be displayed here</p>
                <button class="btn btn-primary-custom btn-custom">
                    <i class="fas fa-plus me-2"></i>
                    Generate Report
                </button>
            </div>
        </div>
    </div>

    <div class="col-lg-4 mb-4">
        <div class="dashboard-card h-100">
            <div class="card-header bg-success text-white">
                <h6 class="mb-0">
                    <i class="fas fa-clock me-2"></i>
                    Recent Activities
                </h6>
            </div>
            <div class="card-body p-0">
                @forelse($recentActivities ?? [] as $activity)
                <div class="activity-item">
                    <div class="d-flex align-items-center">
                        <div class="bg-{{ $activity['color'] ?? 'primary' }} rounded-circle p-2 me-3">
                            <i class="fas fa-{{ $activity['icon'] ?? 'user' }} text-white"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-1">{{ $activity['title'] ?? 'Activity' }}</h6>
                            <small class="text-muted">{{ $activity['time'] ?? '2 hours ago' }}</small>
                        </div>
                    </div>
                </div>
                @empty
                <div class="activity-item">
                    <div class="d-flex align-items-center">
                        <div class="bg-primary rounded-circle p-2 me-3">
                            <i class="fas fa-user-plus text-white"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-1">New User Registration</h6>
                            <small class="text-muted">2 hours ago</small>
                        </div>
                    </div>
                </div>

                <div class="activity-item">
                    <div class="d-flex align-items-center">
                        <div class="bg-success rounded-circle p-2 me-3">
                            <i class="fas fa-file-alt text-white"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-1">Disease Report Submitted</h6>
                            <small class="text-muted">4 hours ago</small>
                        </div>
                    </div>
                </div>

                <div class="activity-item">
                    <div class="d-flex align-items-center">
                        <div class="bg-warning rounded-circle p-2 me-3">
                            <i class="fas fa-seedling text-white"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-1">Fertilizer Data Updated</h6>
                            <small class="text-muted">6 hours ago</small>
                        </div>
                    </div>
                </div>

                <div class="activity-item">
                    <div class="d-flex align-items-center">
                        <div class="bg-info rounded-circle p-2 me-3">
                            <i class="fas fa-question-circle text-white"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-1">Query Resolved</h6>
                            <small class="text-muted">8 hours ago</small>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>
            <div class="card-footer bg-light">
                <a href="" class="btn btn-primary-custom btn-custom w-100">
                    <i class="fas fa-history me-2"></i>
                    View All Activities
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row mb-4">
    <div class="col-12">
        <div class="dashboard-card">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0">
                    <i class="fas fa-bolt me-2"></i>
                    Quick Actions
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 col-md-6 mb-3">
                        <a href="" class="btn btn-outline-primary btn-custom w-100 h-100 py-3 text-decoration-none">
                            <i class="fas fa-user-plus fa-2x mb-2 d-block"></i>
                            Add New User
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <a href="" class="btn btn-outline-success btn-custom w-100 h-100 py-3 text-decoration-none">
                            <i class="fas fa-file-medical fa-2x mb-2 d-block"></i>
                            Create Report
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <a href="" class="btn btn-outline-warning btn-custom w-100 h-100 py-3 text-decoration-none">
                            <i class="fas fa-seedling fa-2x mb-2 d-block"></i>
                            Update Fertilizer
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <a href="" class="btn btn-outline-info btn-custom w-100 h-100 py-3 text-decoration-none">
                            <i class="fas fa-cog fa-2x mb-2 d-block"></i>
                            System Settings
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Data Table -->
<div class="row">
    <div class="col-12">
        <div class="dashboard-card">
            <div class="card-header bg-dark text-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        <i class="fas fa-table me-2"></i>
                        Recent User Activities
                    </h5>
                    <a href="" class="btn btn-sm btn-outline-light">
                        <i class="fas fa-download me-1"></i>
                        Export
                    </a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-custom mb-0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User Name</th>
                                <th>Activity</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($userActivities ?? [] as $activity)
                            <tr>
                                <td>#{{ str_pad($activity['id'] ?? 1, 3, '0', STR_PAD_LEFT) }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-{{ $activity['color'] ?? 'primary' }} rounded-circle me-2 d-flex align-items-center justify-content-center"
                                            style="width: 30px; height: 30px;">
                                            <span class="text-white small">{{ strtoupper(substr($activity['name'] ?? 'RK', 0, 2)) }}</span>
                                        </div>
                                        {{ $activity['name'] ?? 'Raj Kumar' }}
                                    </div>
                                </td>
                                <td>{{ $activity['activity'] ?? 'Disease Report Submission' }}</td>
                                <td>
                                    <span class="badge bg-{{ $activity['status_color'] ?? 'success' }}">
                                        {{ $activity['status'] ?? 'Completed' }}
                                    </span>
                                </td>
                                <td>{{ $activity['date'] ?? '2024-01-15' }}</td>
                                <td>
                                    <a href="" class="btn btn-sm btn-outline-primary me-1">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="" class="btn btn-sm btn-outline-success">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td>#001</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-primary rounded-circle me-2 d-flex align-items-center justify-content-center"
                                            style="width: 30px; height: 30px;">
                                            <span class="text-white small">RK</span>
                                        </div>
                                        Raj Kumar
                                    </div>
                                </td>
                                <td>Disease Report Submission</td>
                                <td><span class="badge bg-success">Completed</span></td>
                                <td>2024-01-15</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary me-1">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-success">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>#002</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-success rounded-circle me-2 d-flex align-items-center justify-content-center"
                                            style="width: 30px; height: 30px;">
                                            <span class="text-white small">AS</span>
                                        </div>
                                        Amit Singh
                                    </div>
                                </td>
                                <td>Fertilizer Usage Update</td>
                                <td><span class="badge bg-warning">Pending</span></td>
                                <td>2024-01-14</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary me-1">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-success">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>#003</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-info rounded-circle me-2 d-flex align-items-center justify-content-center"
                                            style="width: 30px; height: 30px;">
                                            <span class="text-white small">PG</span>
                                        </div>
                                        Priya Gupta
                                    </div>
                                </td>
                                <td>System Query</td>
                                <td><span class="badge bg-info">In Progress</span></td>
                                <td>2024-01-13</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary me-1">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-success">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer bg-light">
                @foreach($userActivities as $activity)
                <p>{{ $activity->activity }} - {{ $activity->created_at->diffForHumans() }}</p>
                @endforeach
                <p>Total activities: {{ $totalActivities }}</p>

            </div>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Dashboard specific JavaScript
    document.addEventListener('DOMContentLoaded', function() {
        // Add any dashboard specific functionality here
        console.log('Dashboard loaded successfully');
    });
</script>
@endpush