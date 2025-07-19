@extends('backend.layouts.master')

@section('title', 'User Activities')

@section('content')
    <div class="container">
        <h3>User Activities</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>User</th>
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
                    <td colspan="6">No activity found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
