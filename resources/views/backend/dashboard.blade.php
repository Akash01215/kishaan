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
                <h2 class="fw-bold text-primary mb-1">{{ $totalUsers }}</h2>
                <p class="text-muted mb-2">Total Users</p>
                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-success">
                        <i class="fas fa-arrow-up me-1"></i>
                        +12.5%
                    </small>
                    <a href="{{ route('users.index') }}" class="btn btn-sm btn-outline-primary btn-custom">
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
                    <a href="{{ route('disease-reports.index') }}" class="btn btn-sm btn-outline-success btn-custom">
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
                <h2 class="fw-bold text-warning mb-1">{{ $totalSuggestions ?? '8,756' }}</h2>
                <p class="text-muted mb-2">Fertilizer Suggestions</p>
                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-success">
                        <i class="fas fa-arrow-up me-1"></i>
                        +8.1%
                    </small>
                    <a href="{{ route('fertilizer-suggestions.index') }}" class="btn btn-sm btn-outline-warning btn-custom">
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
                        <a href="{{ route('users.create') }}" class="btn btn-outline-primary btn-custom w-100 h-100 py-3 text-decoration-none">
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
                        <a href="{{ route('fertilizer-suggestions.index') }}" class="btn btn-outline-warning btn-custom w-100 h-100 py-3 text-decoration-none">
                            <i class="fas fa-seedling fa-2x mb-2 d-block"></i>
                            Update Fertilizer
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <a href="{{ route('site.setting') }}" class="btn btn-outline-info btn-custom w-100 h-100 py-3 text-decoration-none">
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
                            @forelse($userActivities as $activity)
                            <tr>
                                <td>#{{ str_pad($activity->id, 3, '0', STR_PAD_LEFT) }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        @php
                                        $name = $activity->user->name ?? 'User';
                                        $color = ['primary', 'success', 'info', 'warning', 'danger'][rand(0, 4)];
                                        @endphp
                                        <div class="bg-{{ $color }} rounded-circle me-2 d-flex align-items-center justify-content-center"
                                            style="width: 30px; height: 30px;">
                                            <span class="text-white small">{{ strtoupper(substr($name, 0, 2)) }}</span>
                                        </div>
                                        {{ $name }}
                                    </div>
                                </td>
                                <td>{{ $activity->activity }}</td>
                                <td>
                                    <span class="badge bg-success">Completed</span>
                                </td>
                                <td>{{ $activity->created_at->format('Y-m-d') }}</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-outline-primary me-1">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-outline-success">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">No activities found.</td>
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